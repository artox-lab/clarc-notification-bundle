<?php

/**
 * Http message
 *
 * @author Dmitry Meliukh <d.meliukh@artox.com>
 */

declare(strict_types=1);

namespace ArtoxLab\Bundle\ClarcNotificationBundle\Notification\Interfaces\Message;

final class HttpMessage implements HttpMessageInterface
{

    /**
     * Request method
     *
     * @var string
     */
    private $method;

    /**
     * Request url
     *
     * @var string
     */
    private $url;

    /**
     * Request options
     *
     * @var array
     */
    private $options;

    /**
     * HttpMessage constructor.
     *
     * @param string $method  Request method
     * @param string $url     Request url
     * @param array  $options Request options
     */
    public function __construct(string $method, string $url, array $options)
    {
        $this->method  = $method;
        $this->url     = $url;
        $this->options = $options;
    }

    /**
     * Request method
     *
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * Recipient
     *
     * @return string
     */
    public function getRecipient(): string
    {
        return $this->url;
    }

    /**
     * Message
     *
     * @return array
     */
    public function getContent(): array
    {
        return $this->options;
    }

}
