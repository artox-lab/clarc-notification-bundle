<?php

/**
 * E-mail message
 *
 * @author Dmitry Meliukh <d.meliukh@artox.com>
 */

namespace ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Interfaces\Message;

final class EmailMessage implements EmailMessageInterface
{
    /**
     * Recipient e-mail
     *
     * @var string
     */
    private $email;

    /**
     * Subject
     *
     * @var string
     */
    private $subject;

    /**
     * Body
     *
     * @var string
     */
    private $body;

    /**
     * EmailMessage constructor.
     *
     * @param string $email   Recipient e-mail
     * @param string $subject Subject
     * @param string $body    Body
     */
    public function __construct(string $email, string $subject, string $body)
    {

        $this->email   = $email;
        $this->subject = $subject;
        $this->body    = $body;
    }

    /**
     * Recipient e-mail
     *
     * @return string
     */
    public function getRecipient(): string
    {
        return $this->email;
    }

    /**
     * Subject
     *
     * @return string
     */
    public function getSubject(): string
    {
        return $this->subject;
    }

    /**
     * Body
     *
     * @return string
     */
    public function getContent(): string
    {
        return $this->body;
    }

}
