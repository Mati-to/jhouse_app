<?php
require '../../includes/app.php';

use App\Property;
use Intervention\Image\ImageManagerStatic as Image;

isAuthenticated();
 
$db = connectionDB();

$validation = Property::getValidation();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  /* Creates a new instance of Property when the request 
  method is POST */
  $property = new Property($_POST);

  /* Creates a unique name for each image, then this reference
  is stored in the DB */
  $imageName = md5( uniqid('')) . '.jpg' ;

  /* Validates if the image exists, then I resize the image 
  given by the user, and then it sets the name 
  reference of the image to the atribute on the class */
  if($_FILES['image']['tmp_name']) {
    $img = Image::make($_FILES['image']['tmp_name'])->fit(800, 600);
    $property->setImage($imageName);
  }

  $validation = $property->validation();

  if (empty($validation)) {

    if(!is_dir(IMAGES_FOLDER)) {
      mkdir(IMAGES_FOLDER);
    }

    // Stores the img file in the Server
    $img->save(IMAGES_FOLDER . $imageName);

    // Save the object into the DB
    $result = $property->save();

    if ($result) {
       header('Location: /nihonstay_app/admin/index.php?result=1');
    }
  }
}

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