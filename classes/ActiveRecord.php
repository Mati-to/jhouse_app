<?php

namespace App;

class ActiveRecord {
  protected static $db;
  protected static $dbColumns = [];
  protected static $table = '';


  // Validation 
  protected static $validation = [];


  public static function setDB($database)
  {
    self::$db = $database;
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

    $query = " INSERT INTO " . static::$table . " ( ";
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

    $query = " UPDATE " . static::$table . " SET ";
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
    $query = " DELETE FROM " . static::$table . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
    $result = self::$db->query($query);

    if ($result) {
      $this->deleteImage();
      header('Location: /nihonstay_app/admin/index.php?result=3');
    }
  }

  public function data()
  {
    $data = [];
    foreach (static::$dbColumns as $column) {
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
    return static::$validation;
  }

  public function validation()
  {
    static::$validation = [];
    return static::$validation;
  }

  public static function getAll()
  {
    $query = " SELECT * FROM " . static::$table ;

    $result = self::sqlQuery($query);
    return $result;
  }

  public static function getN($n)
  {
    $query = " SELECT * FROM " . static::$table . " LIMIT " . $n;

    $result = self::sqlQuery($query);
    return $result;
  }

  public static function getById($id)
  {
    $query = " SELECT * FROM " . static::$table . " WHERE id = {$id} ";
    $result = self::sqlQuery($query);
    return array_shift($result);
  }

  public static function sqlQuery($query)
  {
    $result = self::$db->query($query);

    $array = [];
    while ($register = $result->fetch_assoc()) {
      $array[] = static::createObject($register);
    }

    $result->free();
    return $array;
  }

  protected static function createObject($register)
  {
    $object = new static;

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