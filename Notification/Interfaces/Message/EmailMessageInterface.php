<?php

/**
 * Interface: e-mail message
 *
 * @author Dmitry Meliukh <d.meliukh@artox.com>
 */

declare(strict_types=1);

namespace ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Interfaces\Message;

interface EmailMessageInterface extends MessageInterface
{

    /**
     * Subject
     *
     * @return string
     */
    public function getSubject(): string;

}
