<?php
require '../includes/functions.php';
addTemplate('header');
?>

<main class='container section content-center'>
  <h1>Big House in Kyoto with a Garden</h1>

  <img src='../src/img/highlight1.jpg' alt=''>

  <div class='rental-text'>
    <p> <span class='prize'>$300</span> /per night</p>
    <ul class='icons-rent'>
      <li>
        <img src='../src/img/icon_wc.svg' alt='wc icon' loading='lazy'>
        <p>2</p>
      </li>
      <li>
        <img src='../src/img/icon_parkinglot.svg' alt='parking lot icon' loading='lazy'>
        <p>2</p>
      </li>
      <li>
        <img src='../src/img/icon_bedroom.svg' alt='bedroom icon' loading='lazy'>
        <p>4</p>
      </li>
    </ul>

    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas repellat ex maiores! Voluptatibus iusto
      necessitatibus temporibus nulla quibusdam, enim accusantium sed aspernatur, non sapiente officia, ipsam
      dignissimos nisi? Veniam, vero?</p>
  </div>

</main>


<?php

include './templates/footer.php';
?>