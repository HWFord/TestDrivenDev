<?php

class Room {
  private $name;
  private $slug;

  public function __construct($name) {
    $this->setName($name);
  }

  public function getName() {
    return $this->name;
  }

  public function setName($name) {
    if (!is_string($name)) {
      throw new Exception('Room name must be a string');
    }
    if (!trim($name)) {
      throw new Exception('Room name must be a non-empty string');
    }
    $this->name = trim($name);
    $this->slug = self::generateSlug($this->name);
  }

  public function getSlug() {
    return $this->slug;
  }

  public static function generateSlug($name) {
    $slug = strtolower(str_replace(' ', '_', $name));
    $slug = normalizer_normalize($slug, Normalizer::FORM_D);
    $slug = preg_replace('/[\p{Mn}]/u', '', $slug);
    if (!preg_match('/^[a-z_]*$/', $slug)) {
      throw new Exception('Slug can only contain letters and underscores');
    }
    return $slug;
  }
}
