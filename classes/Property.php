<?php

namespace App;

class Property
{
  protected static $db;
  protected static $dbColumns = [
    'id', 'title', 'prize', 'image', 'description', 'rooms', 'wc',
    'parking', 'created'
  ];

  // Validation 
  protected static $validation = [];


  public $id;
  public $title;
  public $prize;
  public $image;
  public $description;
  public $rooms;
  public $wc;
  public $parking;
  public $created;

  public static function setDB($database)
  {
    self::$db = $database;
  }

  public function __construct($arg = [])
  {
    $this->id = $arg['id'] ?? '';
    $this->title = $arg['title'] ?? '';
    $this->prize = $arg['prize'] ?? '';
    $this->image = $arg['image'] ?? '';
    $this->description = $arg['description'] ?? '';
    $this->rooms = $arg['rooms'] ?? '';
    $this->wc = $arg['wc'] ?? '';
    $this->parking = $arg['parking'] ?? '';
    $this->created = date('Y-m-d');
  }

  public function save()
  {
    $data = $this->dataSanitizer();

    $query = " INSERT INTO properties ( ";
    $query .= join(', ', array_keys($data));
    $query .= " ) VALUES ('";
    $query .= join("', '", array_values($data));
    $query .= "')";

    $result = self::$db->query($query);
    return $result;
  }

  public function data()
  {
    $data = [];
    foreach (self::$dbColumns as $column) {
      if ($column === 'id') continue;
      $data[$column] = $this->$column;
    }
    return $data;
  }

  public function dataSanitizer()
  {
    $data = $this->data();
    $sanitized = [];

    foreach ($data as $key => $value) {
      $sanitized[$key] = self::$db->escape_string($value);
    }
    return $sanitized;
  }

  public function setImage($image)
  {
    if ($image) {
      $this->image = $image;
    }
  }

  // Validation Method
  public static function getValidation()
  {
    return self::$validation;
  }

  public function validation()
  {
    if (!$this->title) {
      self::$validation[] = 'You must provide a title';
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
    if (!$this->parking) {
      self::$validation[] = 'You must provide a number of parking lots availables';
    }
    if (!$this->image) {
      self::$validation[] = 'You must provide at least 1 picture of the house';
    }
    return self::$validation;
  }
}
