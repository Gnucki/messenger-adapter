<?php

namespace Enqueue\MessengerAdapter\Tests\Fixtures;

use Interop\Queue\PsrMessage;

class DecoratedPsrMessage implements PsrMessage
{
    /**
     * @var string
     */
    private $body;

    /**
     * @var array
     */
    private $properties;

    /**
     * @var array
     */
    private $headers;

    /**
     * @var string|null
     */
    private $deliveryTag;

    /**
     * @var string|null
     */
    private $consumerTag;

    /**
     * @var bool
     */
    private $redelivered;

    /**
     * @var int
     */
    private $flags;

    /**
     * @var string
     */
    private $routingKey;

    /**
     * @param string $body
     * @param array  $properties
     * @param array  $headers
     */
    public function __construct($body = '', array $properties = [], array $headers = [])
    {
        $this->body = $body;
        $this->properties = $properties;
        $this->headers = $headers;

        $this->redelivered = false;
        $this->flags = self::FLAG_NOPARAM;
    }

    /**
     * {@inheritdoc}
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * {@inheritdoc}
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * {@inheritdoc}
     */
    public function setProperties(array $properties)
    {
        $this->properties = $properties;
    }

    /**
     * {@inheritdoc}
     */
    public function getProperties()
    {
        return $this->properties;
    }

    /**
     * {@inheritdoc}
     */
    public function setProperty($name, $value)
    {
        $this->properties[$name] = $value;
    }

    /**
     * {@inheritdoc}
     */
    public function getProperty($name, $default = null)
    {
        return array_key_exists($name, $this->properties) ? $this->properties[$name] : $default;
    }

    /**
     * {@inheritdoc}
     */
    public function setHeaders(array $headers)
    {
        $this->headers = $headers;
    }

    /**
     * {@inheritdoc}
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * {@inheritdoc}
     */
    public function setHeader($name, $value)
    {
        $this->headers[$name] = $value;
    }

    /**
     * {@inheritdoc}
     */
    public function getHeader($name, $default = null)
    {
        return array_key_exists($name, $this->headers) ? $this->headers[$name] : $default;
    }

    /**
     * {@inheritdoc}
     */
    public function setRedelivered($redelivered)
    {
        $this->redelivered = (bool) $redelivered;
    }

    /**
     * {@inheritdoc}
     */
    public function isRedelivered()
    {
        return $this->redelivered;
    }

    /**
     * {@inheritdoc}
     */
    public function setCorrelationId($correlationId)
    {
        $this->setHeader('correlation_id', $correlationId);
    }

    /**
     * {@inheritdoc}
     */
    public function getCorrelationId()
    {
        return $this->getHeader('correlation_id');
    }

    /**
     * {@inheritdoc}
     */
    public function setMessageId($messageId)
    {
        $this->setHeader('message_id', $messageId);
    }

    /**
     * {@inheritdoc}
     */
    public function getMessageId()
    {
        return $this->getHeader('message_id');
    }

    /**
     * {@inheritdoc}
     */
    public function getTimestamp()
    {
        $value = $this->getHeader('timestamp');

        return $value === null ? null : (int) $value;
    }

    /**
     * {@inheritdoc}
     */
    public function setTimestamp($timestamp)
    {
        $this->setHeader('timestamp', $timestamp);
    }

    /**
     * {@inheritdoc}
     */
    public function setReplyTo($replyTo)
    {
        $this->setHeader('reply_to', $replyTo);
    }

    /**
     * {@inheritdoc}
     */
    public function getReplyTo()
    {
        return $this->getHeader('reply_to');
    }

    /**
     * {@inheritdoc}
     */
    public function getRoutingKey()
    {
        return $this->routingKey;
    }

    /**
     * {@inheritdoc}
     */
    public function setRoutingKey($routingKey)
    {
        $this->routingKey = $routingKey;
    }
}
