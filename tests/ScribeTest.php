<?php

namespace colbygarland\Tests;

use colbygarland\Mattermost\Logger\DefaultMessage;
use colbygarland\Mattermost\Logger\DefaultScribe;
use colbygarland\Mattermost\Logger\Interfaces\Message;
use colbygarland\Tests\Worlds\ScribeTestWorld;
use PHPUnit\Framework\TestCase;

class ScribeTest extends TestCase
{
    use ScribeTestWorld;

    /** @test */
    public function instantiating ()
    {
        $scribe = new DefaultScribe(
            new DefaultMessage(),
            $this->options(),
            []
        );

        $this->assertInstanceOf(DefaultScribe::class, $scribe);
    }

    /** @test */
    public function writing_a_message ()
    {
        $scribe = new DefaultScribe(
            new DefaultMessage(),
            $this->options(),
            $this->record()
        );

        $message = $scribe->message();

        $this->assertInstanceOf(Message::class, $message);
    }
}
