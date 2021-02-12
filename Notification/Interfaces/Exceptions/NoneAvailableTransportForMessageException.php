<?php

/**
 * Exception: none of the available transports support the given message
 *
 * @author Dmitry Meliukh <d.meliukh@artox.com>
 */

declare(strict_types=1);

namespace ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Interfaces\Exceptions;

use LogicException;

class NoneAvailableTransportForMessageException extends LogicException
{

    /**
     * NoneAvailableTransportForMessageException constructor.
     *
     * @param string $messageClassName Name of message class
     */
    public function __construct(string $messageClassName)
    {
        parent::__construct(
            sprintf(
                'None of the available transports support the given message %s',
                $messageClassName
            ),
            500
        );
    }

}
