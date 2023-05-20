<?php
require '../includes/app.php';
isAuthenticated();

use App\Property;
use App\Landlord;

// Method to bring the results of the DB using Active Record
$properties = Property::getAll();
$landlords = Landlord::getAll();

$getResult = $_GET['result'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $id = $_POST['deleteId'];
  $id = filter_var($id, FILTER_VALIDATE_INT);

  if ($id) {
    $type = $_POST['type'];

    if(checkClassType($type)) {
      if($type === 'landlord') {
        $landlord = Landlord::getById($id);
        $landlord->delete();
      } else if($type === 'property') {
        $property = Property::getById($id);
        $property->delete();
      }
    } 
  }
}

addTemplate('header');
?>

<main class='container section'>
  <h1>Admin - Houses and Landlords</h1>
  <?php 
  $message = showFeedback(intval($getResult));
  if($message) { ?>
    <p class="alert success"> <?php echo sanitize($message) ?> </p>
  <?php } ?>
  

  <a href='/nihonstay_app/admin/props/create.php' class="button green-button">New Property</a>
  <a href='/nihonstay_app/admin/landlords/create.php' class="button green-button">New Landlord</a>

  <h2>Properties</h2>
  <table class="properties">
    <thead>
      <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Image</th>
        <th>Prize per night</th>
        <th>Actions</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($properties as $property) : ?>
        <tr>
          <td> <?php echo $property->id; ?> </td>
          <td> <?php echo $property->title; ?> </td>
          <td><img src="../images/<?php echo $property->image; ?>" class="table-image"></td>
          <td> $ <?php echo $property->prize; ?> </td>
          <td>
            <a href="/nihonstay_app/admin/props/update.php?id=<?php echo $property->id; ?>" class="green-button-block">Update</a>
            <form method="POST" class="w-100">
              <input type="hidden" name="deleteId" value="<?php echo $property->id; ?>">
              <input type="hidden" name="type" value="property">  
              <input type="submit" class="red-button-block" value="Delete">
            </form>
          </td>
        </tr>
      <?php endforeach; ?>

    </tbody>
  </table>

  <h2>Landlords</h2>
  <table class="properties">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Actions</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($landlords as $landlord) : ?>
        <tr>
          <td> <?php echo $landlord->id; ?> </td>
          <td> <?php echo $landlord->firstname . " " . $landlord->lastname; ?> </td>
          <td> <?php echo $landlord->phone; ?> </td>
          <td>
            <a href="/nihonstay_app/admin/landlords/update.php?id=<?php echo $landlord->id; ?>" class="green-button-block">Update</a>
            <form method="POST" class="w-100">
              <input type="hidden" name="deleteId" value="<?php echo $landlord->id; ?>">
              <input type="hidden" name="type" value="landlord">
              <input type="submit" class="red-button-block" value="Delete">
            </form>
          </td>
        </tr>
      <?php endforeach; ?>

    </tbody>
  </table>
</main>

<?php
addTemplate('footer');
?>