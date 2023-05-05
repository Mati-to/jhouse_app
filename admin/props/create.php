<?php

require '../../includes/config/database.php';
$db = connectionDB();

$validation = [];

$title = '';
$prize = '';
$description = '';
$rooms = '';
$wc = '';
$parking = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $title = mysqli_real_escape_string( $db, $_POST['title']);
  $prize = mysqli_real_escape_string( $db, $_POST['prize']);
  $description = mysqli_real_escape_string( $db, $_POST['description']);
  $rooms = mysqli_real_escape_string( $db, $_POST['rooms']);
  $wc = mysqli_real_escape_string( $db, $_POST['wc']);
  $parking = mysqli_real_escape_string( $db, $_POST['parking']);
  $created = date('Y-m-d');

  $image = $_FILES['image'];

  if (!$title) {
    $validation[] = 'You must provide a title';
  }
  if (!$prize) {
    $validation[] = 'You must provide a prize';
  }
  if (!$description) {
    $validation[] = 'You must provide a description';
  }
  if (!$rooms) {
    $validation[] = 'You must provide a number of rooms availables';
  }
  if (!$wc) {
    $validation[] = 'You must provide a number of bathrooms availables';
  }
  if (!$parking) {
    $validation[] = 'You must provide a number of parking lots availables';
  }
  if (!$image['name'] || $image['error']) {
    $validation[] = 'You must provide at least 1 picture of the house';
  }

  // File maximum size: 1MB
  $kbSize = 1000 * 1000;
  if ($image['size'] > $kbSize) {
    $validation[] = 'The maximum weight of the image is 100 Kb';
  }

  if (empty($validation)) {

    $imagesFolder = '../../images/';
    if(!is_dir($imagesFolder)) {
      mkdir($imagesFolder);
    }

    $imageName = md5( uniqid(''));
    move_uploaded_file($image['tmp_name'], $imagesFolder . $imageName . '.jpg');

    $query = " INSERT INTO properties (title, prize, image, description, rooms, wc, parking, created) 
    VALUES ( '$title', '$prize', '$imageName', '$description', '$rooms', '$wc', '$parking', '$created');";

    $result = mysqli_query($db, $query);

    if ($result) {
       header('Location: /nihonstay_app/admin/index.php');
    }
  }
}

require '../../includes/functions.php';
addTemplate('header');
?>

<main class='container section'>
  <h1>Create</h1>

  <a href='/nihonstay_app/admin/index.php' class="button green-button">Back</a>

  <?php foreach ($validation as $validate) { ?>
    <div class="alert error">
      <?php echo $validate; ?>
    </div>
  <?php }; ?>

  <form class="form" method="POST" enctype="multipart/form-data" action="/nihonstay_app/admin/props/create.php">
    <fieldset>
      <legend>General Information</legend>

      <label for="title">Title: </label>
      <input type="text" id="title" name="title" value="<?php echo $title; ?>" placeholder="House Title">

      <label for="prize">Prize per night: </label>
      <input type="number" id="prize" name="prize" value="<?php echo $prize; ?>" placeholder="House Prize">

      <label for="image">Image: </label>
      <input type="file" name="image" id="image" accept="image/jpeg, image/png">

      <label for="description">Description: </label>
      <textarea name="description" id="description" cols="30" rows="10"><?php echo $description; ?></textarea>
    </fieldset>

    <fieldset>
      <legend>House Information</legend>

      <label for="rooms">Rooms: </label>
      <input type="number" name="rooms" id="rooms" value="<?php echo $rooms; ?>" placeholder="For example: 1" min='1' max='8'>

      <label for="wc">Bathrooms: </label>
      <input type="number" name="wc" id="wc" value="<?php echo $wc; ?>" placeholder="For example: 1" min='1' max='8'>

      <label for="parking">Parking lots: </label>
      <input type="number" name="parking" id="parking" value="<?php echo $parking; ?>" placeholder="For example: 1" min='0' max='8'>
    </fieldset>

    <input type="submit" value="Add House" class="button green-button">

  </form>

</main>

<?php
addTemplate('footer');
?>