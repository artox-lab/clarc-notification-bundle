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
use Exception;
use InvalidArgumentException;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class ArtoxLabClarcNotificationExtension extends Extension
{

    /**
     * Loads a specific configuration.
     *
     * @param array            $configs   Configs
     * @param ContainerBuilder $container Container Builder
     *
     * @throws InvalidArgumentException When provided tag is not defined in this extension
     * @throws Exception
     *
     * @return void
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__ . '/../Resources/config')
        );
        $loader->load('services.yaml');

        $container
            ->registerForAutoconfiguration(PresenterInterface::class)
            ->addTag('artox_lab_clarc_notification.presenter');

        $container
            ->registerForAutoconfiguration(TransportInterface::class)
            ->addTag('artox_lab_clarc_notification.transport');
    }

}
