<?php

/**
 * Interface: notification message
 *
 * @author Dmitry Meliukh <d.meliukh@artox.com>
 */

declare(strict_types=1);

namespace ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Interfaces\Message;

interface MessageInterface
{

    /**
     * Recipient
     *
     * @return string
     */
    public function getRecipient(): string;

    /**
     * Message
     *
     * @return string
     */
    public function getContent(): string;

}
