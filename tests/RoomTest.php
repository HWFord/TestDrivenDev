<?php
use PHPUnit\Framework\TestCase;

class RoomTest extends TestCase {
  public function testConstructor() {
    $room = new Room('Transfiguration classroom');
    $this->assertEquals('Transfiguration classroom', $room->getName());
    $this->assertEquals('transfiguration_classroom', $room->getSlug());
  }

  public function testGetName() {
    $room = new Room('Transfiguration classroom');
    $this->assertEquals('Transfiguration classroom', $room->getName());
  }

  public function testSetName() {
    $room = new Room('Transfiguration classroom');
    $room->setName('Potions classroom');
    $this->assertEquals('Potions classroom', $room->getName());
    $this->assertEquals('potions_classroom', $room->getSlug());
  }

  public function testSetNameNonString() {
    $room = new Room('Transfiguration classroom');
    $this->expectException(Exception::class);
    $this->expectExceptionMessage('Room name must be a string');
    $room->setName(123);
  }

  public function testSetNameEmptyString() {
    $room = new Room('Transfiguration classroom');
    $this->expectException(Exception::class);
    $this->expectExceptionMessage('Room name must be a non-empty string');
    $room->setName('    ');
  }

  public function testGenerateSlug() {
    $this->assertEquals('transfiguration_classroom', Room::generateSlug('Transfiguration classroom'));
  }

  public function testGenerateSlugDiacritics() {
    $this->assertEquals('transfiguration_classroom', Room::generateSlug('Transfiguràtion classroom'));
  }

  public function testGenerateSlugSpaces() {
    $this->assertEquals('transfiguration_classroom', Room::generateSlug('Transfiguration classroom'));
  }

  public function testGenerateSlugInvalidCharacters() {
    $this->expectException(Exception::class);
    $this->expectExceptionMessage('Slug can only contain letters and underscores');
    Room::generateSlug('Transfiguration classroom 123');
  }
}
