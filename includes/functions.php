<?php

require 'app.php';

function addTemplate(string $name, bool $main = false) {
  include TEMPLATES_PATH . "/{$name}.php";
}

function isAuthenticated() : bool {
  session_start(); 
  $auth = $_SESSION['login'];
  
  if($auth) {
    return true;
  }
  return false;
}

