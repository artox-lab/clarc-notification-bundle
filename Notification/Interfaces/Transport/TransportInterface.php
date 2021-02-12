<?php

/**
 * Interface: transport
 *
 * @author Dmitry Meliukh <d.meliukh@artox.com>
 */

declare(strict_types=1);

namespace ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Interfaces\Transport;

use ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Interfaces\Message\MessageInterface;

interface TransportInterface
{

    /**
     * Send message
     *
     * @param MessageInterface $message Message
     *
     * @return void
     */
    public function send(MessageInterface $message): void;

    /**
     * Supports
     *
     * @param MessageInterface $message Message
     *
     * @return boolean
     */
    public function supports(MessageInterface $message): bool;

}
