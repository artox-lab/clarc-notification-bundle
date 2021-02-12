<?php

/**
 * ArtoxLab Clean Architecture notification bundle
 *
 * @author Dmitry Meliukh <d.meliukh@artox.com>
 */

declare(strict_types=1);

namespace ArtoxLab\Bundle\ClarcNotificationBundle;

use ArtoxLab\Bundle\ClarcNotificationBundle\DependencyInjection\Compiler\PresenterProviderPass;
use ArtoxLab\Bundle\ClarcNotificationBundle\DependencyInjection\Compiler\TransportProviderPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class ArtoxLabClarcNotificationBundle extends Bundle
{

    /**
     * Builds the bundle
     *
     * @param ContainerBuilder $container Container Builder
     *
     * @return void
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new PresenterProviderPass());
        $container->addCompilerPass(new TransportProviderPass());
    }

}
