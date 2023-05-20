<?php 
require '../../includes/app.php';

use App\Landlord;
isAuthenticated();

$id = $_GET['id'];
idVerifier($id);

$landlord = Landlord::getById($id);
$validation = Landlord::getValidation(); 

// Verify any changes in the ID of the Query String
if($id !== $landlord->id) {
  header('Location: /nihonstay_app/admin/index.php');
}
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $arr = $_POST['landlord'];
  $landlord->sync($arr);
 
  $validation = $landlord->validation();

  if(empty($validation)) {
    $landlord->save();
  }
}

addTemplate('header');
?>

<main class="container section">  
  <h1>Update Landlord</h1>
  <a href='/nihonstay_app/admin/index.php' class="button green-button">Back</a>

  <?php foreach ($validation as $validate) { ?>
    <div class="alert error">
      <?php echo $validate; ?>
    </div>
  <?php }; ?>

  <form class="form" method="POST">
    <?php include '../../views/templates/form_landlords.php'; ?>

    <input type="submit" value="Save Changes" class="button green-button"> 
  </form>

</main>

<?php
addTemplate('footer');
?>