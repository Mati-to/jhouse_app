<?php

define('TEMPLATES_PATH', __DIR__ . '../../views/templates');
define('FUNCTIONS_PATH', __DIR__ . 'functions.php');
define('IMAGES_FOLDER', __DIR__ . '/../images/');

function addTemplate(string $name, bool $main = false)
{
  include TEMPLATES_PATH . "/{$name}.php";
}

function isAuthenticated(): bool
{
  session_start(); 
  if (!$_SESSION['login']) {
    header('Location: /nihonstay_app/views/login.php');
  }
  return true;
}

function helper($variable)
{
  echo '<pre>';
  var_dump($variable);
  echo '</pre>';
  exit;
}
