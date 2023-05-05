<?php

class User {
  private $username;

  public function __construct($username) {
    if (!$username) {
      throw new Exception('Username cannot be empty');
    }
    if (!is_string($username)) {
      throw new Exception('Username must be a string');
    }
    $this->username = $username;
  }

  public function getUsername() {
    return $this->username;
  }

  public function setUsername($username) {
    if (!$username) {
      throw new Exception('Username cannot be empty');
    }
    if (!is_string($username)) {
      throw new Exception('Username must be a string');
    }
    $this->username = $username;
  }
}