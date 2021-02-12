<?php

/**
 * Interface: e-mail presenter
 *
 * Prepare data for sending via e-mail channel
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

    /**
     * Html message
     *
     * @param NotificationInterface $notification Notification
     *
     * @return string
     */
    public function getHtmlContent(NotificationInterface $notification): string;

}
