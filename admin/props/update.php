<?php
require '../../includes/app.php';

use App\Property;
use App\Landlord;
use Intervention\Image\ImageManagerStatic as Image;

isAuthenticated();

$id = $_GET['id'];
idVerifier($id);

$property = Property::getById($id);
$landlords = Landlord::getAll();
$validation = Property::getValidation();

// Verify any changes in the ID of the Query String
if($id !== $property->id) {
  header('Location: /nihonstay_app/admin/index.php');
}
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') { 

  $arr = $_POST['property'];
  $property->sync($arr);

  $validation = $property->validation();

  $imageName = md5( uniqid('')) . '.jpg';

  if($_FILES['property']['tmp_name']['image']) {
    $img = Image::make($_FILES['property']['tmp_name']['image'])->fit(800, 600);
    $property->setImage($imageName);
  } else {
    $imageName = $property->image;
  }

  if (empty($validation)) {
    if($_FILES['property']['tmp_name']['image']) {
      $img->save(IMAGES_FOLDER . $imageName);
    }
    $property->save();
  }
}

addTemplate('header');
?>

<main class='container section'>
  <h1>Edit your property</h1>

  <a href='/nihonstay_app/admin/index.php' class="button green-button">Back</a>

  <?php foreach ($validation as $validate) { ?>
    <div class="alert error">
      <?php echo $validate; ?>
    </div>
  <?php }; ?>

  <form class="form" method="POST" enctype="multipart/form-data">
    <?php include '../../views/templates/form_props.php' ?>

    <input type="submit" value="Save Changes" class="button green-button">
  </form>

</main>

<?php
addTemplate('footer');
?>