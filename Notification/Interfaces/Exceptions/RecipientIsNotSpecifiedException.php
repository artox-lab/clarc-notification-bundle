<?php

/**
 * Exception: recipient is not specified
 *
 * @author Dmitry Meliukh <d.meliukh@artox.com>
 */

declare(strict_types=1);

namespace ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Interfaces\Exceptions;

use RuntimeException;

class RecipientIsNotSpecifiedException extends RuntimeException
{

    /**
     * RecipientIsNotSpecifiedException constructor.
     *
     * @param string $className Class name of recipient
     */
    public function __construct(string $className)
    {
        parent::__construct(
            sprintf(
                'Recipient is not specified. Expect: %s',
                $className
            ),
            500
        );
    }

}
