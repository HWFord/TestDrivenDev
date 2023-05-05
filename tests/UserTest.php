<?php
use PHPUnit\Framework\TestCase;

require_once('src/User.php');

class UserTest extends TestCase {
  public function testConstructor() {
    $user = new User('HarryPotter');
    $this->assertEquals('HarryPotter', $user->getUsername());

    $this->expectException(Exception::class);
    $this->expectExceptionMessage('Username cannot be empty');
    $user = new User('');
  }

  public function testGetUsername() {
    $user = new User('HarryPotter');
    $this->assertEquals('HarryPotter', $user->getUsername());
  }

  public function testSetUsername() {
    $user = new User('HarryPotter');
    $user->setUsername('HarryP');
    $this->assertEquals('HarryP', $user->getUsername());

    $this->expectException(Exception::class);
    $this->expectExceptionMessage('Username cannot be empty');
    $user->setUsername('');
    
    $this->expectException(Exception::class);
    $this->expectExceptionMessage('Username must be a string');
    $user->setUsername(123);
  }
}