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
     * Supports
     *
     * @param NotificationInterface $notification Notification
     *
     * @return boolean
     */
    public function supports(NotificationInterface $notification): bool;

}
