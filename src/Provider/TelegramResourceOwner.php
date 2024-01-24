<?php

namespace Nodeloc\OAuth2\Client\Provider;

use JetBrains\PhpStorm\Pure;
use League\OAuth2\Client\Provider\ResourceOwnerInterface;
use League\OAuth2\Client\Tool\ArrayAccessorTrait;

class TelegramResourceOwner implements ResourceOwnerInterface
{
    protected array $response = [];

    public function __construct(array $response)
    {
        $this->response = $response;
    }

    public function getId()
    {
        return $this->response['id'];
    }

    public function getName()
    {
        return $this->response['username'];
    }

    public function getEmail()
    {
        return null;
    }
    public function getAvatar()
    {
        return $this->response['photo_url'];
    }
    public function toArray(): array
    {
        return $this->response;
    }

    private function getResponseValue($key)
    {
        return $this->response[$key] ?? null;
    }
}