<?php
require '../includes/app.php';
addTemplate('header');
?>

<main class='container section'>
  <h1>Rentals</h1>

  <?php
    include 'templates/properties.php';    
  ?>
  
</main>

<?php

addTemplate('footer');
?>