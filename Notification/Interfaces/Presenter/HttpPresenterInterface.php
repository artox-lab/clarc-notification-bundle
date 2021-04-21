<?php

/**
 * Interface: http presenter
 *
 * @author Dmitry Meliukh <d.meliukh@artox.com>
 */

declare(strict_types=1);

namespace ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Interfaces\Presenter;

use ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Entities\Notification\NotificationInterface;

interface HttpPresenterInterface extends PresenterInterface
{

    /**
     * Request method
     *
     * @param NotificationInterface $notification Notification
     *
     * @return string
     */
    public function getRequestMethod(NotificationInterface $notification): string;

    /**
     * Request options
     *
     * @param NotificationInterface $notification Notification
     *
     * @return array
     */
    public function getRequestOptions(NotificationInterface $notification): array;

}
