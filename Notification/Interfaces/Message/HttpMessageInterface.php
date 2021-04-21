<?php

/**
 * Interface: http message
 *
 * @author Dmitry Meliukh <d.meliukh@artox.com>
 */

declare(strict_types=1);

namespace ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Interfaces\Message;

interface HttpMessageInterface extends MessageInterface
{

    /**
     * Request method
     *
     * @return string
     */
    public function getMethod(): string;

}
