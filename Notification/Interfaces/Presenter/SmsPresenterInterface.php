<?php

/**
 * Interface: sms presenter
 *
 * Prepare data for sending via sms channel
 *
 * @author Dmitry Meliukh <d.meliukh@artox.com>
 */

declare(strict_types=1);

namespace ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Interfaces\Presenter;

use ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Entities\Notification\NotificationInterface;

interface SmsPresenterInterface extends PresenterInterface
{

    /**
     * Message
     *
     * @param NotificationInterface $notification Notification
     *
     * @return string
     */
    public function getContent(NotificationInterface $notification): string;

}
