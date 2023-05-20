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

function sanitize($html): string | int
{
  $s = htmlspecialchars($html);
  return $s;
}

function helper($variable)
{
  echo '<pre>';
  var_dump($variable);
  echo '</pre>';
  exit;
}

function checkClassType($type)
{
  $types = ['landlord', 'property'];
  return in_array($type, $types);
}

function idVerifier($id)
{
  $id = filter_var($id, FILTER_VALIDATE_INT);
  if (!$id) {
    header('Location: /nihonstay_app/admin/index.php');
  }
}

function showFeedback($code): string
{
  $message = '';
  switch ($code) {
    case 1:
      $message = 'Created Successfully';
      break;
    case 2:
      $message = 'Updated Successfully';
      break;
    case 3:
      $message = 'Deleted Successfully';
      break;
    default:
      $message = false;
      break;
  }
  return $message;
}
