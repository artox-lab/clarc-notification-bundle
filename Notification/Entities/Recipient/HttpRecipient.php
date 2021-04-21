<?php

/**
 * Recipient of notification by http
 *
 * @author Dmitry Meliukh <d.meliukh@artox.com>
 */

declare(strict_types=1);

namespace ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Entities\Recipient;

class HttpRecipient implements HttpRecipientInterface
{

    /**
     * Url
     *
     * @var string
     */
    private $url;

    /**
     * HttpRecipient constructor.
     *
     * @param string $url Url
     */
    public function __construct(string $url)
    {
        $this->url = $url;
    }

    /**
     * Url
     *
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

}
