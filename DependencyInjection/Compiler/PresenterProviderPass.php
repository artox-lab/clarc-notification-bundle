<?php

/**
 * Compiler pass: presenter provider registration
 *
 * @author Dmitry Meliukh <d.meliukh@artox.com>
 */

declare(strict_types=1);

namespace ArtoxLab\Bundle\ClarcNotificationBundle\DependencyInjection\Compiler;

use ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Interfaces\Presenter\PresenterProviderInterface;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class PresenterProviderPass implements CompilerPassInterface
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
        if (false === $container->has(PresenterProviderInterface::class)) {
            return;
        }

        $presenterProviderDefinition = $container->findDefinition(PresenterProviderInterface::class);

        $taggedServices = $container->findTaggedServiceIds('artox_lab_clarc_notification.presenter');

        $presenterReferences = [];
        foreach ($taggedServices as $id => $tags) {
            $presenterReferences[] = new Reference($id);
        }

        $presenterProviderDefinition->setArguments(['$presenters' => $presenterReferences]);
    }

}
