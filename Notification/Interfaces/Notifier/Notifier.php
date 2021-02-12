<?php

/**
 * Notifier
 *
 * @author Dmitry Meliukh <d.meliukh@artox.com>
 *
 * phpcs:disable Generic.Files.LineLength.MaxExceeded
 */

declare(strict_types=1);

namespace ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Interfaces\Notifier;

use ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Entities\Notification\NotificationInterface;
use ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Entities\Notifier\NotifierInterface;
use ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Entities\Recipient\EmailRecipientInterface;
use ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Entities\Recipient\RecipientInterface;
use ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Entities\Recipient\SmsRecipientInterface;
use ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Interfaces\Exceptions\NoneAvailableTransportForMessageException;
use ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Interfaces\Exceptions\PresenterNotFoundException;
use ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Interfaces\Exceptions\RecipientIsNotSpecifiedException;
use ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Interfaces\Message\EmailMessage;
use ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Interfaces\Message\SmsMessage;
use ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Interfaces\Presenter\EmailPresenterInterface;
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
            throw new RecipientIsNotSpecifiedException(RecipientInterface::class);
        }

        if ($presenter instanceof SmsPresenterInterface) {
            $this->notifyViaSms($notification, $presenter, ...$recipients);
        }

        if ($presenter instanceof EmailPresenterInterface) {
            $this->notifyViaEmail($notification, $presenter, ...$recipients);
        }
    }

    /**
     * Send notification via sms
     *
     * @param NotificationInterface $notification  Notification
     * @param SmsPresenterInterface $presenter     Presenter of notification
     * @param RecipientInterface    ...$recipients Recipients
     *
     * @return void
     */
    private function notifyViaSms(
        NotificationInterface $notification,
        SmsPresenterInterface $presenter,
        RecipientInterface ...$recipients
    ): void {
        foreach ($recipients as $recipient) {
            if (false === ($recipient instanceof SmsRecipientInterface)) {
                continue;
            }

            $message = new SmsMessage(
                $recipient->getPhone(),
                $presenter->getContent($notification)
            );

            $transport = $this->transportProvider->getTransport($message);

            if (null === $transport) {
                throw new NoneAvailableTransportForMessageException(SmsMessage::class);
            }

            $transport->send($message);
        }
    }

    /**
     * Send notification via e-mail
     *
     * @param NotificationInterface   $notification  Notification
     * @param EmailPresenterInterface $presenter     Presenter of notification
     * @param RecipientInterface      ...$recipients Recipients
     *
     * @return void
     */
    private function notifyViaEmail(
        NotificationInterface $notification,
        EmailPresenterInterface $presenter,
        RecipientInterface ...$recipients
    ): void {
        foreach ($recipients as $recipient) {
            if (false === ($recipient instanceof EmailRecipientInterface)) {
                continue;
            }

            $message = new EmailMessage(
                $recipient->getEmail(),
                $presenter->getSubject($notification),
                $presenter->getHtmlContent($notification)
            );

            $transport = $this->transportProvider->getTransport($message);

            if (null === $transport) {
                throw new NoneAvailableTransportForMessageException(EmailMessage::class);
            }

            $transport->send($message);
        }
    }

}
