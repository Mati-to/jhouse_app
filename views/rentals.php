<?php
require '../includes/app.php';
addTemplate('header');
?>

<main class='container section'>
  <h1>Rentals</h1>

  <?php
    $limit = 10;
    include 'templates/properties.php';    
  ?>
  
</main>

<?php

include './templates/footer.php';
?>