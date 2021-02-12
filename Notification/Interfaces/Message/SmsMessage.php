<?php

/**
 * Sms message
 *
 * @author Dmitry Meliukh <d.meliukh@artox.com>
 */

declare(strict_types=1);

namespace ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Interfaces\Message;

final class SmsMessage implements SmsMessageInterface
{

    /**
     * Phone number
     *
     * @var string
     */
    private $phone;

    /**
     * Message
     *
     * @var string
     */
    private $message;

    /**
     * SmsMessage constructor.
     *
     * @param string $phone   Phone number
     * @param string $message Message
     */
    public function __construct(string $phone, string $message)
    {
        $this->phone   = $phone;
        $this->message = $message;
    }

    /**
     * Recipient
     *
     * @return string
     */
    public function getRecipient(): string
    {
        return  $this->phone;
    }

    /**
     * Message
     *
     * @return string
     */
    public function getContent(): string
    {
        return $this->message;
    }

}
