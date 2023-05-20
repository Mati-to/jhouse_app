<?php 
require '../../includes/app.php';

use App\Landlord;
isAuthenticated();

$landlord = new Landlord;

$validation = Landlord::getValidation();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $landlord = new Landlord($_POST['landlord']);

  $validation = $landlord->validation();

  if(empty($validation)) {
    $landlord->save();

  }

}

addTemplate('header');
?>

<main class="container section">  
  <h1>Register Landlord</h1>
  <a href='/nihonstay_app/admin/index.php' class="button green-button">Back</a>

  <?php foreach ($validation as $validate) { ?>
    <div class="alert error">
      <?php echo $validate; ?>
    </div>
  <?php }; ?>

  <form class="form" method="POST" action="/nihonstay_app/admin/landlords/create.php">
    <?php include '../../views/templates/form_landlords.php'; ?>

    <input type="submit" value="Add Landlord" class="button green-button"> 
  </form>

</main>

<?php
addTemplate('footer');
?>