<?php

/**
 * Recipient of notification by e-mail
 *
 * @author Dmitry Meliukh <d.meliukh@artox.com>
 */

declare(strict_types=1);

namespace ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Entities\Recipient;

class EmailRecipient implements EmailRecipientInterface
{

    /**
     * E-mail
     *
     * @var string
     */
    private $email;

    /**
     * EmailRecipient constructor.
     *
     * @param string $email E-mail
     */
    public function __construct(string $email)
    {
        $this->email = $email;
    }

    /**
     * E-mail
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

}
