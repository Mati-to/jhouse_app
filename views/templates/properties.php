<?php
$db = connectionDB();

$query = " SELECT * FROM properties LIMIT $limit ";
$result = mysqli_query($db, $query);

?>

<div class='rent-container'>
  <?php
  while ($property = mysqli_fetch_assoc($result)) :
  ?>
    <div class='rent'>
      <img src='../images/<?php echo $property['image']; ?>' alt='House Rent' loading="lazy">
      <div class='rent-container'>
        <h4><?php echo $property['title']; ?></h4>
        <p><?php echo substr($property['description'], 0, 70) . '..'; ?></p>
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

        <a href='rental.php?id=<?php echo $property['id']; ?>' class='button brown-button'>More info</a>
      </div>
    </div> <!-- House 1 -->
  <?php endwhile; ?>
</div>

<?php
  mysqli_close($db);
?>