<?php

/**
 * Interface: Presenter provider
 *
 * @author Dmitry Meliukh <d.meliukh@artox.com>
 */

declare(strict_types=1);

namespace ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Interfaces\Presenter;

use ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Entities\Notification\NotificationInterface;

class PresenterProvider implements PresenterProviderInterface
{

    /**
     * Notification presenters
     *
     * @var iterable
     */
    private $presenters;

    /**
     * PresenterProvider constructor.
     *
     * @param PresenterInterface[]|iterable $presenters Notification presenters
     */
    public function __construct(iterable $presenters)
    {
        $this->presenters = $presenters;
    }

    /**
     * Get presenter by notification
     *
     * @param NotificationInterface $notification Notification
     *
     * @return PresenterInterface|null
     */
    public function getPresenter(NotificationInterface $notification): ?PresenterInterface
    {
        foreach ($this->presenters as $presenter) {
            if (true === $presenter->supports($notification)) {
                return $presenter;
            }
        }

        return null;
    }

}
