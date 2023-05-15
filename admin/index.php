<?php
require '../includes/app.php';
isAuthenticated();

use App\Property;

// Method to bring the results of the DB using Active Record
$properties = Property::getAll();

$query = "SELECT * FROM properties";
$dbQueryResult = mysqli_query($db, $query);

$getResult = $_GET['result'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
  $id = $_POST['deleteId'];
  $id = filter_var($id, FILTER_VALIDATE_INT);

  if ($id) {
    $deleteQuery = " SELECT image FROM properties WHERE id = $id ";
    $deleteQueryResult = mysqli_query($db, $deleteQuery);
    $property = mysqli_fetch_assoc($deleteQueryResult);
    unlink('../images/' . $property['image']);

    $deleteQuery = " DELETE FROM properties WHERE id = $id ";
    $deleteQueryResult = mysqli_query( $db, $deleteQuery);

    if ($deleteQueryResult) {
      header('Location: /nihonstay_app/admin/index.php?result=3');
    }
  }
}

addTemplate('header');
?>

<main class='container section'>
  <h1>Admin - Your Houses</h1>
  <?php if (intval($getResult) === 1) : ?>
    <p class="alert success">Publication Created Successfully</p>
  <?php elseif (intval($getResult) === 2) : ?>
    <p class="alert success">Publication Updated Successfully</p>
  <?php elseif (intval($getResult) === 3) : ?>
    <p class="alert success">Publication Deleted Successfully</p>
  <?php endif; ?>

  <a href='/nihonstay_app/admin/props/create.php' class="button green-button">New Property</a>

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
      <?php foreach( $properties as $property ) : ?>
        <tr>
          <td> <?php echo $property->id; ?> </td>
          <td> <?php echo $property->title; ?> </td>
          <td><img src="../images/<?php echo $property->image; ?>" class="table-image"></td>
          <td> $ <?php echo $property->prize; ?> </td>
          <td>
            <a href="/nihonstay_app/admin/props/update.php?id=<?php echo $property->id; ?>" class="green-button-block">Update</a>
            <form method="POST" class="w-100">
              <input type="hidden" name="deleteId" value="<?php echo $property->id; ?>">
              <input type="submit" class="red-button-block" value="Delete">
            </form>
          </td>
        </tr>
      <?php endforeach; ?>

    </tbody>
  </table>
</main>

<?php

mysqli_close($db);

addTemplate('footer');
?>