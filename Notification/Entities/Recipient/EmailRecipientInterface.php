<?php

/**
 * Interface: recipient of notification by e-mail
 *
 * @author Dmitry Meliukh <d.meliukh@artox.com>
 */

declare(strict_types=1);

namespace ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Entities\Recipient;

interface EmailRecipientInterface extends RecipientInterface
{

    /**
     * E-mail
     *
     * @return string
     */
    public function getEmail(): string;

}
