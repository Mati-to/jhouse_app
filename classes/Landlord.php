<?php

namespace App;

class Landlord extends ActiveRecord
{
  protected static $dbColumns = [
    'id', 'firstname', 'lastname', 'phone',
  ];
  protected static $table = 'landlords';

  public $id;
  public $firstname;
  public $lastname;
  public $phone;

  public function __construct($arg = [])
  {
    $this->id = $arg['id'] ?? null;
    $this->firstname = $arg['firstname'] ?? '';
    $this->lastname = $arg['lastname'] ?? '';
    $this->phone = $arg['phone'] ?? '';
  }

  public function validation()
  {
    if (!$this->firstname) {
      self::$validation[] = 'You must provide a First Name';
    }
    if (!$this->lastname) {
      self::$validation[] = 'You must provide a Last Name';
    }
    if (!$this->phone) {
      self::$validation[] = 'You must provide a Phone number';
    }
    if(!preg_match('/[0-9]{9}/', $this->phone)) {
      self::$validation[] = 'Number format not valid. Please provide a phone number with 9 digits'; 
    }
    
    return self::$validation;
  }
}
