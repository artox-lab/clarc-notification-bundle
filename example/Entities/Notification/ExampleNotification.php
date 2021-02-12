<?php

/**
 * Example notification
 *
 * @author Dmitry Meliukh <d.meliukh@artox.com>
 */

declare(strict_types=1);

namespace App\Entities\Notification;

use ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Entities\Notification\NotificationInterface;

class ExampleNotification implements NotificationInterface
{

    /**
     * Notification text
     *
     * @var string
     */
    private $text;

    /**
     * ExampleNotification constructor.
     *
     * @param string $text Notification text
     */
    public function __construct(string $text)
    {
        $this->text = $text;
    }

    /**
     * Returns notification text
     *
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

}
