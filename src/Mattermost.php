<?php

namespace colbygarland\Mattermost\Logger;

use colbygarland\Mattermost\Logger\Interfaces\Message;
use colbygarland\Mattermost\Logger\Values\Webhook;
use GuzzleHttp\Client;

final class Mattermost
{
    /** @var \GuzzleHttp\Client */
    private $http;

    public function __construct(Client $http)
    {
        $this->http = $http;
    }

    public function send (Message $message, Webhook $webhook)
    {
        $this->http->post(
            $webhook->value(),
            [
                'json' => $message->toArray(),
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
            ]
        );
    }
}
