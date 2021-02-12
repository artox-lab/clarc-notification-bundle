<?php

/**
 * Notifier
 *
 * @author Dmitry Meliukh <d.meliukh@artox.com>
 */

declare(strict_types=1);

namespace ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Interfaces\Notifier;

use ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Entities\Notification\NotificationInterface;
use ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Entities\Notifier\NotifierInterface;
use ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Entities\Recipient\EmailRecipient;
use ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Entities\Recipient\RecipientInterface;
use ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Entities\Recipient\SmsRecipient;
use ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Interfaces\Exceptions\NoneAvailableTransportForMessage;
use ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Interfaces\Exceptions\PresenterNotFoundException;
use ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Interfaces\Exceptions\RecipientIsNotSpecified;
use ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Interfaces\Message\EmailMessage;
use ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Interfaces\Message\SmsMessage;
use ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Interfaces\Presenter\EmailPresenterInterface;
use ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Interfaces\Presenter\PresenterInterface;
use ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Interfaces\Presenter\PresenterProviderInterface;
use ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Interfaces\Presenter\SmsPresenterInterface;
use ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Interfaces\Transport\TransportProviderInterface;

class Notifier implements NotifierInterface
{

    /**
     * Presenter provider
     *
     * @var PresenterProviderInterface
     */
    private $presenterProvider;

    /**
     * Transport provider
     *
     * @var TransportProviderInterface
     */
    private $transportProvider;

    /**
     * Notifier constructor.
     *
     * @param PresenterProviderInterface $presenterProvider Presenter provider
     * @param TransportProviderInterface $transportProvider Transport provider
     */
    public function __construct(
        PresenterProviderInterface $presenterProvider,
        TransportProviderInterface $transportProvider
    ) {
        $this->presenterProvider = $presenterProvider;
        $this->transportProvider = $transportProvider;
    }

    /**
     * Send notification
     *
     * @param NotificationInterface $notification  Notification
     * @param RecipientInterface    ...$recipients Recipients
     *
     * @return void
     */
    public function notify(NotificationInterface $notification, RecipientInterface ...$recipients): void
    {
        $presenter = $this->presenterProvider->getPresenter($notification);

        if (null === $presenter) {
            throw new PresenterNotFoundException(get_class($notification));
        }

        if (false === $recipients) {
            throw new RecipientIsNotSpecified(RecipientInterface::class);
        }

        if ($presenter instanceof SmsPresenterInterface
            && false === empty($phoneRecipients = $this->getPhoneRecipients(...$recipients))
        ) {
            $this->notifyViaSms($presenter, $notification, $phoneRecipients);
        }

        if ($presenter instanceof EmailPresenterInterface
            && false === empty($emailRecipients = $this->getEmailRecipients(...$recipients))
        ) {
            $this->notifyViaEmail($presenter, $notification, $emailRecipients);
        }
    }

    /**
     * Send notification via sms
     *
     * @param PresenterInterface    $presenter    Presenter of notification
     * @param NotificationInterface $notification Notification
     * @param array                 $recipients   Recipients
     *
     * @return void
     */
    private function notifyViaSms(
        PresenterInterface $presenter,
        NotificationInterface $notification,
        array $recipients
    ): void {
        foreach ($recipients as $recipient) {
            $message = new SmsMessage(
                $recipient->getPhone(),
                $presenter->getContent($notification)
            );

            $transport = $this->transportProvider->getTransport($message);

            if (null === $transport) {
                throw new NoneAvailableTransportForMessage(SmsMessage::class);
            }

            $transport->send($message);
        }
    }

    /**
     * Send notification via e-mail
     *
     * @param PresenterInterface    $presenter    Presenter of notification
     * @param NotificationInterface $notification Notification
     * @param array                 $recipients   Recipients
     *
     * @return void
     */
    private function notifyViaEmail(
        PresenterInterface $presenter,
        NotificationInterface $notification,
        array $recipients
    ): void {
        foreach ($recipients as $recipient) {
            $message = new EmailMessage(
                $recipient->getEmail(),
                $presenter->getSubject($notification),
                $presenter->getContent($notification)
            );

            $transport = $this->transportProvider->getTransport($message);

            if (null === $transport) {
                throw new NoneAvailableTransportForMessage(EmailMessage::class);
            }

            $transport->send($message);
        }
    }

    /**
     * Recipients of notification by phone number
     *
     * @param RecipientInterface ...$recipients Recipients
     *
     * @return array
     */
    private function getPhoneRecipients(RecipientInterface ...$recipients): array
    {
        $result = [];

        foreach ($recipients as $recipient) {
            if (false === ($recipient instanceof SmsRecipient)) {
                continue;
            }

            $result[] = $recipient;
        }

        return $result;
    }

    /**
     * E-mail recipients
     *
     * @param RecipientInterface ...$recipients Recipients
     *
     * @return array
     */
    private function getEmailRecipients(RecipientInterface ...$recipients): array
    {
        $result = [];

        foreach ($recipients as $recipient) {
            if (false === ($recipient instanceof EmailRecipient)) {
                continue;
            }

            $result[] = $recipient;
        }

        return $result;
    }

}
