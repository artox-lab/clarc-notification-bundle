<?php

/**
 * Interface: Presenter provider
 *
 * @author Dmitry Meliukh <d.meliukh@artox.com>
 */

declare(strict_types=1);

namespace ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Interfaces\Presenter;

use ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Entities\Notification\NotificationInterface;

interface PresenterProviderInterface
{

    /**
     * Get presenter by notification
     *
     * @param NotificationInterface $notification Notification
     *
     * @return PresenterInterface|null
     */
    public function getPresenter(NotificationInterface $notification): ?PresenterInterface;

}
