<?php

/**
 * Extension of an ArtoxLabClarcNotificationExtension
 *
 * @author Dmitry Meliukh <d.meliukh@artox.com>
 */

declare(strict_types=1);

namespace ArtoxLab\Bundle\ClarcNotificationBundle\DependencyInjection;

use ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Interfaces\Presenter\PresenterInterface;
use ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Interfaces\Transport\TransportInterface;
use InvalidArgumentException;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;

class ArtoxLabClarcNotificationExtension extends Extension
{

    /**
     * Loads a specific configuration.
     *
     * @param array            $configs   Configs
     * @param ContainerBuilder $container Container Builder
     *
     * @throws InvalidArgumentException When provided tag is not defined in this extension
     *
     * @return void
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $container
            ->registerForAutoconfiguration(PresenterInterface::class)
            ->addTag('artox_lab_clarc_notification.presenter');

        $container
            ->registerForAutoconfiguration(TransportInterface::class)
            ->addTag('artox_lab_clarc_notification.transport');
    }

}
