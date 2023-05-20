<?php

namespace App;

class Property extends ActiveRecord
{
  protected static $dbColumns = [
    'id', 'title', 'prize', 'image', 'description', 'rooms', 'wc',
    'parking', 'created', 'landlords_id'
  ];
  protected static $table = 'properties';

  public $id;
  public $title;
  public $prize;
  public $image;
  public $description;
  public $rooms;
  public $wc;
  public $parking;
  public $created;
  public $landlords_id;

  public function __construct($arg = [])
  {
    $this->id = $arg['id'] ?? null;
    $this->title = $arg['title'] ?? '';
    $this->prize = $arg['prize'] ?? '';
    $this->image = $arg['image'] ?? '';
    $this->description = $arg['description'] ?? '';
    $this->rooms = $arg['rooms'] ?? '';
    $this->wc = $arg['wc'] ?? '';
    $this->parking = $arg['parking'] ?? '';
    $this->created = date('Y-m-d');
    $this->landlords_id = $arg['landlords_id'] ?? '';
  }

  public function validation()
  {
    if (!$this->title) {
      self::$validation[] = 'You must provide a title';
    }
    if (strlen($this->title) > 45) {
      self::$validation[] = 'The title cannot exceed 45 characters';
    }
    if (!$this->prize) {
      self::$validation[] = 'You must provide a prize';
    }
    if (!$this->description) {
      self::$validation[] = 'You must provide a description';
    }
    if (!$this->rooms) {
      self::$validation[] = 'You must provide a number of rooms availables';
    }
    if (!$this->wc) {
      self::$validation[] = 'You must provide a number of bathrooms availables';
    }
    if (!$this->parking === null || $this->parking === '') {
      self::$validation[] = 'You must provide a number of parking lots availables';
    }
    if (!$this->image) {
      self::$validation[] = 'You must provide at least 1 picture of the house';
    }
    return self::$validation;
  }
}
