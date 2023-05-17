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
    $this->id = $arg['id'] ?? null;
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
    if (!is_null($this->id)) {
      $this->saveUpdate();
    } else {
      $this->saveCreate();
    }
  }

  public function saveCreate()
  {
    $data = $this->dataSanitizer();

    $query = " INSERT INTO properties ( ";
    $query .= join(', ', array_keys($data));
    $query .= " ) VALUES ('";
    $query .= join("', '", array_values($data));
    $query .= "')";

    $result = self::$db->query($query);

    if ($result) {
      header('Location: /nihonstay_app/admin/index.php?result=1');
    }
  }

  public function saveUpdate()
  {
    $data = $this->dataSanitizer();

    $values = [];
    foreach ($data as $key => $value) {
      $values[] = "{$key} = '{$value}'";
    }

    $query = " UPDATE properties SET ";
    $query .= join(', ', $values);
    $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "'";
    $query .= " LIMIT 1 ";

    $result = self::$db->query($query);

    if ($result) {
      header('Location: /nihonstay_app/admin/index.php?result=2');
    }
  }

  public function delete()
  {
    $query = " DELETE FROM properties WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
    $result = self::$db->query($query);

    if ($result) {
      $this->deleteImage();
      header('Location: /nihonstay_app/admin/index.php?result=3');
    }
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

  public function setImage($image)
  {
    // Deletes the previous image 
    if (!is_null($this->id)) {
      $this->deleteImage();
    }

    // Set the new image on the Object
    if ($image) {
      $this->image = $image;
    }
  }

  public function deleteImage()
  {
    $file = file_exists(IMAGES_FOLDER . $this->image);
    if ($file) {
      unlink(IMAGES_FOLDER . $this->image);
    }
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

  public static function getAll()
  {
    $query = " SELECT * FROM properties ";

    $result = self::sqlQuery($query);
    return $result;
  }

  public static function getById($id)
  {
    $query = " SELECT * FROM properties WHERE id = {$id} ";
    $result = self::sqlQuery($query);
    return array_shift($result);
  }

  public static function sqlQuery($query)
  {
    $result = self::$db->query($query);

    $array = [];
    while ($register = $result->fetch_assoc()) {
      $array[] = self::createObject($register);
    }

    $result->free();
    return $array;
  }

  protected static function createObject($register)
  {
    $object = new self;

    foreach ($register as $key => $value) {
      if (property_exists($object, $key)) {
        $object->$key = $value;
      }
    }
    return $object;
  }

  /* Synchronizes the changes made by the user in the update page and the 
  object properties */
  public function sync($arr = [])
  {
    foreach ($arr as $key => $value) {
      if (property_exists($this, $key) && !is_null($value)) {
        $this->$key = $value;
      }
    }
  }
}
