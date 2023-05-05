<?php
use PHPUnit\Framework\TestCase;

require_once 'src/Message.php';
require_once 'src/User.php';

class MessageTest extends TestCase
{
    public function testConstructor()
    {
        $sender = new User('HarryPotter');
        $message = new Message('Hello', $sender);
        $this->assertSame('Hello', $message->getContent());
        $this->assertSame($sender, $message->getSender());

        $messageWithScript = new Message('<script>alert("XSS attack!")</script>', $sender);
        $this->assertSame('&lt;script&gt;alert(&quot;XSS attack!&quot;)&lt;/script&gt;', $messageWithScript->getContent());

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Content cannot be empty');
        new Message('', $sender);
    }

    public function testSetContent()
    {
        $sender = new User('HarryPotter');
        $message = new Message('Hello', $sender);
        $message->setContent('Hi');
        $this->assertSame('Hi', $message->getContent());

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Content cannot be empty');
        $message->setContent('');
    }

    public function testSetSender()
    {
        $sender = new User('HarryPotter');
        $message = new Message('Hello', $sender);

        $newSender = new User('HermioneGranger');
        $message->setSender($newSender);
        $this->assertSame($newSender, $message->getSender());

        $this->expectException(TypeError::class);
        $this->expectExceptionMessage('Argument 1 passed to Message::setSender() must be an instance of User');
        $message->setSender('HermioneGranger');
    }

    public function testGetTime()
    {
        $sender = new User('HarryPotter');
        $message = new Message('Hello', $sender);
        $this->assertMatchesRegularExpression('/^\d{4}\/\d{2}\/\d{2} \d{2}:\d{2}:\d{2}$/', $message->getTime());
    }
}
