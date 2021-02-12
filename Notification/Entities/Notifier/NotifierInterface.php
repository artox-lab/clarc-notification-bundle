<?php

/**
 * Interface: notifier
 *
 * @author Dmitry Meliukh <d.meliukh@artox.com>
 */

declare(strict_types=1);

namespace ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Entities\Notifier;

use ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Entities\Notification\NotificationInterface;
use ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Entities\Recipient\RecipientInterface;

interface NotifierInterface
{

    /**
     * Send notification
     *
     * @param NotificationInterface $notification  Notification
     * @param RecipientInterface    ...$recipients Recipients
     *
     * @return void
     */
    public function notify(NotificationInterface $notification, RecipientInterface ...$recipients): void;

}
