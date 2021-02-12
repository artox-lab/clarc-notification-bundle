<?php

/**
 * Example transport
 *
 * @author Dmitry Meliukh <d.meliukh@artox.com>
 */

declare(strict_types=1);

namespace App\Interfaces\Notification\Transport;

use ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Interfaces\Message\EmailMessageInterface;
use ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Interfaces\Message\MessageInterface;
use ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Interfaces\Transport\TransportInterface;

class ExampleEmailTransport implements TransportInterface
{

    /**
     * Send message
     *
     * @param MessageInterface $message Message
     *
     * @return void
     */
    public function send(MessageInterface $message): void
    {
        // TODO: Implement send() method.
    }

    /**
     * Supports
     *
     * @param MessageInterface $message Message
     *
     * @return boolean
     */
    public function supports(MessageInterface $message): bool
    {
        return $message instanceof EmailMessageInterface;
    }

}
