<?php

/**
 * Transport provider
 *
 * @author Dmitry Meliukh <d.meliukh@artox.com>
 */

declare(strict_types=1);

namespace ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Interfaces\Transport;

use ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Interfaces\Message\MessageInterface;

class TransportProvider implements TransportProviderInterface
{

    /**
     * Transports
     *
     * @var iterable
     */
    private $transports;

    /**
     * TransportProvider constructor.
     *
     * @param TransportInterface[]|iterable $transports Transports
     */
    public function __construct(iterable $transports)
    {
        $this->transports = $transports;
    }

    /**
     * Get transport by message
     *
     * @param MessageInterface $message Message
     *
     * @return TransportInterface|null
     */
    public function getTransport(MessageInterface $message): ?TransportInterface
    {
        foreach ($this->transports as $transport) {
            if (true === $transport->supports($message)) {
                return $transport;
            }
        }

        return null;
    }

}
