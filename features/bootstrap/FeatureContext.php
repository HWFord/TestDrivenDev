<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\TableNode;

require_once './src/User.php';
require_once './src/Message.php';
require_once './src/Room.php';

class FeatureContext implements Context
{
    private $user;
    private $message;
    private $room;

    /**
     * @Given a user with username :username
     */
    public function aUserWithUsername($username)
    {
        $this->user = new User($username);
    }

    /**
     * @Given a message with content :content from the user
     */
    public function aMessageWithContentFromTheUser($content)
    {
        $this->message = new Message($content, $this->user);
    }

    /**
     * @Given a room with name :name
     */
    public function aRoomWithName($name)
    {
        $this->room = new Room($name);
    }

    /**
     * @Then the message content should be :content
     */
    public function theMessageContentShouldBe($content)
    {
        if ($this->message->getContent() !== $content) {
            throw new Exception('Message content does not match expected value');
        }
    }

    /**
     * @Then the message sender should be the user
     */
    public function theMessageSenderShouldBeTheUser()
    {
        if ($this->message->getSender() !== $this->user) {
            throw new Exception('Message sender does not match expected value');
        }
    }

    /**
     * @Then the room slug should be :slug
     */
    public function theRoomSlugShouldBe($slug)
    {
        if ($this->room->getSlug() !== $slug) {
            throw new Exception('Room slug does not match expected value');
        }
    }

    /**
     * @Then the user username should be :username
     */
    public function theUserUsernameShouldBe($username)
    {
        if ($this->user->getUsername() !== $username) {
            throw new Exception('User username does not match expected value');
        }
    }

    /**
     * @When I set the message content to :content
     */
    public function iSetTheMessageContentTo($content)
    {
        $this->message->setContent($content);
    }

    /**
     * @When I set the message sender to the user
     */
    public function iSetTheMessageSenderToTheUser()
    {
        $this->message->setSender($this->user);
    }

    /**
     * @When I set the room name to :name
     */
    public function iSetTheRoomNameTo($name)
    {
        $this->room->setName($name);
    }

    /**
     * @When I set the user username to :username
     */
    public function iSetTheUserUsernameTo($username)
    {
        $this->user->setUsername($username);
    }

    /**
     * @Then the room name should be :name
     */
    public function theRoomNameShouldBe($name)
    {
        if ($this->room->getName() !== $name) {
            throw new Exception('Room name does not match expected value');
        }
    }

    /**
     * @Then setting the room name to an empty string should throw an exception
     */
    public function settingTheRoomNameToAnEmptyStringShouldThrowAnException()
    {
        try {
            $this->room->setName('');

        }
        catch(Exception $e) {
            return;
        }
        throw new Exception('Expected exception was not thrown');
    }
      
}
          
          
          
          
          
          
          