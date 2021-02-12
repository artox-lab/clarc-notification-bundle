<?php

/**
 * Interface: presenter of notification
 *
 * @author Dmitry Meliukh <d.meliukh@artox.com>
 */

declare(strict_types=1);

namespace ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Interfaces\Presenter;

use ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Entities\Notification\NotificationInterface;

interface PresenterInterface
{

    /**
     * Message
     *
     * @param NotificationInterface $notification Notification
     *
     * @return string
     */
    public function getContent(NotificationInterface $notification): string;

    /**
     * Supports
     *
     * @param NotificationInterface $notification Notification
     *
     * @return boolean
     */
    public function supports(NotificationInterface $notification): bool;

}
