<?php

/**
 * Interface: e-mail presenter
 *
 * @author Dmitry Meliukh <d.meliukh@artox.com>
 */

declare(strict_types=1);

namespace ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Interfaces\Presenter;

use ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Entities\Notification\NotificationInterface;

interface EmailPresenterInterface extends PresenterInterface
{

    /**
     * Subject
     *
     * @param NotificationInterface $notification Notification
     *
     * @return mixed
     */
    public function getSubject(NotificationInterface $notification): string;

}
