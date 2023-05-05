<?php

require_once 'User.php';

class Message
{
    private $content;
    private $sender;
    private $posted_on;

    public function __construct(string $content, User $sender)
    {
        if (empty($content)) {
            throw new InvalidArgumentException('Content cannot be empty');
        }

        $this->content = $this->escapeContent($content);
        $this->sender = $sender;
        $this->posted_on = $this->getTime();
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        if (empty($content)) {
            throw new InvalidArgumentException('Content cannot be empty');
        }

        $this->content = $this->escapeContent($content);
    }

    public function getSender(): User
    {
        return $this->sender;
    }

    public function setSender($sender): void
    {
        if (!($sender instanceof User)) {
            throw new TypeError('Argument 1 passed to Message::setSender() must be an instance of User');
        }

        $this->sender = $sender;
    }

    public function getTime(): string
    {
        $today = new DateTime();
        $dateTime = $today->format('Y/m/d H:i:s');

        return $dateTime;
    }

    private function escapeContent(string $content): string
    {
        $escapeMap = array(
            '&' => '&amp;',
            '<' => '&lt;',
            '>' => '&gt;',
            '"' => '&quot;',
            '\'' => '&#39;',
            '`' => '&#x60;',
            '=' => '&#x3D;'
        );

        $pattern = '/[' . preg_quote(implode('', array_keys($escapeMap))) . ']/';

        return preg_replace_callback($pattern, function ($match) use ($escapeMap) {
            return $escapeMap[$match[0]];
        }, $content);
    }
}
