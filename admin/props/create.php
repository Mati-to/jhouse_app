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
  $property = new Property($_POST['property']);

  /* Creates a unique name for each image, then this reference
  is stored in the DB */
  $imageName = md5( uniqid('')) . '.jpg' ;

  /* Validates if the image exists, then I resize the image 
  given by the user, and then it sets the name 
  reference of the image to the atribute on the class */
  if($_FILES['property']['tmp_name']['image']) {
    $img = Image::make($_FILES['property']['tmp_name']['image'])->fit(800, 600);
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
    $property->saveCreate();
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
    <?php include '../../views/templates/form_props.php'; ?>

    <input type="submit" value="Add House" class="button green-button"> 
  </form>

</main>

<?php
addTemplate('footer');
?>