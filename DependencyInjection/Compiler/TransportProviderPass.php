<?php

/**
 * Compiler pass: transport provider registration
 *
 * @author Dmitry Meliukh <d.meliukh@artox.com>
 */

declare(strict_types=1);

namespace ArtoxLab\Bundle\ClarcNotificationBundle\DependencyInjection\Compiler;

use ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Interfaces\Transport\TransportProviderInterface;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class TransportProviderPass implements CompilerPassInterface
{

    /**
     * Code execution at compile time
     *
     * @param ContainerBuilder $container Container Builder
     *
     * @return void
     */
    public function process(ContainerBuilder $container)
    {
        if (false === $container->has(TransportProviderInterface::class)) {
            return;
        }

        $transportProviderDefinition = $container->findDefinition(TransportProviderInterface::class);

        $taggedServices = $container->findTaggedServiceIds('artox_lab_clarc_notification.transport');

        $transportReferences = [];
        foreach ($taggedServices as $id => $tags) {
            $transportReferences[] = new Reference($id);
        }

        $transportProviderDefinition->setArguments(['$transports' => $transportReferences]);
    }

}
