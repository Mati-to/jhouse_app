<?php
require '../includes/functions.php';
addTemplate('header');
?>

<main class='container section'>
  <h1>Rentals</h1>

  <div class='rent-container'>
    <div class='rent'>
      <img src='../src/img/rent1.jpg' alt='Big house with a big and green garden'>
      <div class='rent-container'>
        <h4>House in Kyoto</h4>
        <p>House with a big and beautiful garden to relax and rest</p>
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

        <a href='rentals.html' class='button brown-button'>More info</a>
      </div>
    </div> <!-- House 1 -->

    <div class='rent'>
      <img src='../src/img/rent2.jpg' alt='Beautiful interior of the house'>
      <div class='rent-container'>
        <h4>House in Tokyo </h4>
        <p>House with a big and beautiful garden to relax and rest</p>
        <p> <span class='prize'>$120</span> /per night</p>
        <ul class='icons-rent'>
          <li>
            <img src='../src/img/icon_wc.svg' alt='wc icon' loading='lazy'>
            <p>1</p>
          </li>
          <li>
            <img src='../src/img/icon_parkinglot.svg' alt='parking lot icon' loading='lazy'>
            <p>1</p>
          </li>
          <li>
            <img src='../src/img/icon_bedroom.svg' alt='bedroom icon' loading='lazy'>
            <p>1</p>
          </li>
        </ul>

        <a href='rentals.html' class='button brown-button'>More info</a>
      </div>
    </div> <!-- House 2 -->

    <div class='rent'>
      <img src='../src/img/rent6.jpg' alt='House front with a beautiful garden'>
      <div class='rent-container'>
        <h4>House in Kyoto </h4>
        <p>House with a big and beautiful garden to relax and rest</p>
        <p> <span class='prize'>$200</span> /per night</p>
        <ul class='icons-rent'>
          <li>
            <img src='../src/img/icon_wc.svg' alt='wc icon' loading='lazy'>
            <p>1</p>
          </li>
          <li>
            <img src='../src/img/icon_parkinglot.svg' alt='parking lot icon' loading='lazy'>
            <p>1</p>
          </li>
          <li>
            <img src='../src/img/icon_bedroom.svg' alt='bedroom icon' loading='lazy'>
            <p>3</p>
          </li>
        </ul>

        <a href='rentals.html' class='button brown-button'>More info</a>
      </div>
    </div> <!-- House 3 -->

    <div class='rent'>
      <img src='../src/img/rent4.jpg' alt='Interior of the house with a table'>
      <div class='rent-container'>
        <h4>House in Tokyo</h4>
        <p>House with a big and beautiful garden to relax and rest</p>
        <p> <span class='prize'>$200</span> /per night</p>
        <ul class='icons-rent'>
          <li>
            <img src='../src/img/icon_wc.svg' alt='wc icon' loading='lazy'>
            <p>1</p>
          </li>
          <li>
            <img src='../src/img/icon_parkinglot.svg' alt='parking lot icon' loading='lazy'>
            <p>1</p>
          </li>
          <li>
            <img src='../src/img/icon_bedroom.svg' alt='bedroom icon' loading='lazy'>
            <p>2</p>
          </li>
        </ul>

        <a href='rentals.html' class='button brown-button'>More info</a>
      </div>
    </div> <!-- House 4 -->

    <div class='rent'>
      <img src='../src/img/rent3.jpg' alt='Big House with a big and beautiful garden'>
      <div class='rent-container'>
        <h4>House in Kyoto</h4>
        <p>House with a big and beautiful garden to relax and rest</p>
        <p> <span class='prize'>$270</span> /per night</p>
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
            <p>3</p>
          </li>
        </ul>
        <a href='rentals.html' class='button brown-button'>More info</a>
      </div>
    </div> <!-- House 5 -->

    <div class='rent'>
      <img src='../src/img/rent5.jpg' alt='House Rent 1'>
      <div class='rent-container'>
        <h4>House in Kyoto</h4>
        <p>House with a big and beautiful garden to relax and rest</p>
        <p> <span class='prize'>$150</span> /per night</p>
        <ul class='icons-rent'>
          <li>
            <img src='../src/img/icon_wc.svg' alt='wc icon' loading='lazy'>
            <p>1</p>
          </li>
          <li>
            <img src='../src/img/icon_parkinglot.svg' alt='parking lot icon' loading='lazy'>
            <p>0</p>
          </li>
          <li>
            <img src='../src/img/icon_bedroom.svg' alt='bedroom icon' loading='lazy'>
            <p>2</p>
          </li>
        </ul>

        <a href='rentals.html' class='button brown-button'>More info</a>
      </div>
    </div> <!-- House 6 -->
  </div>
</main>

<?php

include './templates/footer.php';
?>