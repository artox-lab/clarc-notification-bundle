<?php

/**
 * Interface: recipient of notification by phone number
 *
 * @author Dmitry Meliukh <d.meliukh@artox.com>
 */

declare(strict_types=1);

namespace ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Entities\Recipient;

interface SmsRecipientInterface extends RecipientInterface
{

    /**
     * Phone number
     *
     * @return string
     */
    public function getPhone(): string;

}
