<?php
require '../includes/app.php';
addTemplate('header');

$getId = $_GET['id'] ?? null;
$getId = filter_var($getId, FILTER_VALIDATE_INT);

if (!$getId) {
  header('Location: /nihonstay_app/views/rentals.php');
}

$db = connectionDB();

$query = " SELECT * FROM properties WHERE id = $getId ";
$result = mysqli_query($db, $query);

if (!$result->num_rows) {
  header('Location: /nihonstay_app/views/rentals.php');
}

$property = mysqli_fetch_assoc($result);

?>

<main class='container section content-center'>
  <h1><?php echo $property['title']; ?></h1>

  <img src='../images/<?php echo $property['image']; ?>' alt='House for vacational rent'>

  <div class='rental-text'>
    <p> <span class='prize'>$<?php echo $property['prize']; ?></span> /per night</p>
    <ul class='icons-rent'>
      <li>
        <img src='../src/img/icon_bedroom.svg' alt='bedroom icon' loading='lazy'>
        <p><?php echo $property['rooms']; ?></p>
      </li>
      <li>
        <img src='../src/img/icon_wc.svg' alt='wc icon' loading='lazy'>
        <p><?php echo $property['wc']; ?></p>
      </li>
      <li>
        <img src='../src/img/icon_parkinglot.svg' alt='parking lot icon' loading='lazy'>
        <p><?php echo $property['parking']; ?></p>
      </li>
    </ul>

    <p><?php echo $property['description'] ?></p>
  </div>

</main>


<?php
mysqli_close($db);

include './templates/footer.php';
?>