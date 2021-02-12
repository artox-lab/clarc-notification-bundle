<?php

/**
 * Exception: presenter not found
 *
 * @author Dmitry Meliukh <d.meliukh@artox.com>
 */

declare(strict_types=1);

namespace ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Interfaces\Exceptions;

use RuntimeException;

class PresenterNotFoundException extends RuntimeException
{

    /**
     * PresenterNotFoundException constructor.
     *
     * @param string $notificationClassName Name of notification class
     */
    public function __construct(string $notificationClassName)
    {
        parent::__construct(
            sprintf(
                'Presenter for notification %s not found',
                $notificationClassName
            ),
            501
        );
    }

}
