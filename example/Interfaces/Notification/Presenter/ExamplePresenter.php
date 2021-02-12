<?php

/**
 * Example presenter
 *
 * @author Dmitry Meliukh <d.meliukh@artox.com>
 */

declare(strict_types=1);

namespace App\Interfaces\Notification\Presenter;

use App\Entities\Notification\ExampleNotification;
use ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Entities\Notification\NotificationInterface;
use ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Interfaces\Presenter\EmailPresenterInterface;
use ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Interfaces\Presenter\SmsPresenterInterface;

class ExamplePresenter implements SmsPresenterInterface, EmailPresenterInterface
{

    /**
     * Message
     *
     * @param NotificationInterface $notification Notification
     *
     * @return string
     */
    public function getContent(NotificationInterface $notification): string
    {
        return $notification->getText();
    }

    /**
     * Subject
     *
     * @param NotificationInterface $notification Notification
     *
     * @return mixed
     */
    public function getSubject(NotificationInterface $notification): string
    {
        return $notification->getText();
    }

    /**
     * Html message
     *
     * @param NotificationInterface $notification Notification
     *
     * @return string
     */
    public function getHtmlContent(NotificationInterface $notification): string
    {
        return <<<HTML
        <div>{$notification->getText()}</div>
HTML;

    }

    /**
     * Supports
     *
     * @param NotificationInterface $notification Notification
     *
     * @return boolean
     */
    public function supports(NotificationInterface $notification): bool
    {
        return $notification instanceof ExampleNotification;
    }

}
