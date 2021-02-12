<?php

/**
 * Interface: transport provider
 *
 * @author Dmitry Meliukh <d.meliukh@artox.com>
 */

declare(strict_types=1);

namespace ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Interfaces\Transport;

use ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Interfaces\Message\MessageInterface;

interface TransportProviderInterface
{

    /**
     * Get transport by message
     *
     * @param MessageInterface $message Message
     *
     * @return TransportInterface|null
     */
    public function getTransport(MessageInterface $message): ?TransportInterface;

}
