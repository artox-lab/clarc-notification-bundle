<?php

/**
 * Interface: recipient of notification by http
 *
 * @author Dmitry Meliukh <d.meliukh@artox.com>
 */

declare(strict_types=1);

namespace ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Entities\Recipient;

interface HttpRecipientInterface extends RecipientInterface
{

    /**
     * Url
     *
     * @return string
     */
    public function getUrl(): string;

}
