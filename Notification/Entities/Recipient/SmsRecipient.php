<?php

/**
 * Recipient of notification by phone number
 *
 * @author Dmitry Meliukh <d.meliukh@artox.com>
 */

declare(strict_types=1);

namespace ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Entities\Recipient;

class SmsRecipient implements SmsRecipientInterface
{

    /**
     * Phone number
     *
     * @var string
     */
    private $phone;

    /**
     * SmsRecipient constructor.
     *
     * @param string $phone Phone number
     */
    public function __construct(string $phone)
    {
        $this->phone = $phone;
    }

    /**
     * Phone number
     *
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

}
