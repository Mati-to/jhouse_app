<?php

require '../includes/config/database.php';
$db = connectionDB();

$query = "SELECT * FROM properties";
$dbQueryResult = mysqli_query($db, $query);

$getResult = $_GET['result'] ?? null;

require '../includes/functions.php';
addTemplate('header');
?>

<main class='container section'>
  <h1>Admin - Your Houses</h1>
  <?php if (intval($getResult) === 1) : ?>
    <p class="alert success">Publication created successfully</p>
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
      <?php while ($property = mysqli_fetch_assoc($dbQueryResult)) : ?>
        <tr>
          <td> <?php echo $property['id']; ?> </td>
          <td> <?php echo $property['title']; ?> </td>
          <td><img src="../images/<?php echo $property['image']; ?>" class="table-image"></td>
          <td> $ <?php echo $property['prize']; ?> </td>
          <td>
            <a href="#" class="green-button-block">Edit</a>
            <a href="#" class="red-button-block">Delete</a>
          </td>
        </tr>
      <?php endwhile; ?>

    </tbody>
  </table>
</main>

<?php

mysqli_close($db);

addTemplate('footer');
?>