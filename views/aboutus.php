<?php
require '../includes/app.php';
addTemplate('header');
?>

<main class='container section'>
  <h1>Who are we?</h1>

  <div class='aboutUs-container'>
    <div class='aboutUs-text'>
      <h4>Welcome to NihonStay!</h4>
      <p> We are a team of travel enthusiasts who are passionate about providing the best vacation rental experiences
        for visitors to Japan. Our goal is to help you find the perfect home away from home during your stay in this
        beautiful country.</p>
      <p>We believe that a comfortable and well-appointed vacation rental is essential to a great travel experience.
        That's why we carefully curate a selection of homes that meet our high standards for cleanliness, comfort, and
        style. From cozy apartments in the heart of Tokyo to luxurious villas in the countryside, we have something
        for every traveler.</p>
      <p>Our team is dedicated to providing exceptional customer service and making your vacation rental experience as
        smooth and stress-free as possible. Whether you need help with booking or have questions about your stay, we
        are here to assist you every step of the way.</p>
      <p>Thank you for considering Japan Vacation Homes for your next trip to Japan. We look forward to helping you
        make unforgettable memories in this amazing country! </p>
    </div>
    <div class='image'>
      <img src='../src/img/aboutus1.jpg' alt='' loading='lazy'>
    </div>
  </div>
</main>

<section class='container section'>
  <h1>Why choose NihonStay?</h1>

  <div class='icons-aboutus'>
    <div class='icon'>
      <img src='../src/img/icon1.svg' alt='Security icon' loading='lazy'>
      <h3>Security</h3>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus vero nesciunt beatae odio veritatis harum eius
        veniam consequatur?</p>
    </div>
    <div class='icon'>
      <img src='../src/img/icon2.svg' alt='Prize icon' loading='lazy'>
      <h3>Prize</h3>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus vero nesciunt beatae odio veritatis harum eius
        veniam consequatur?</p>
    </div>
    <div class='icon'>
      <img src='../src/img/icon3.svg' alt='Location icon' loading='lazy'>
      <h3>Location</h3>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus vero nesciunt beatae odio veritatis harum eius
        veniam consequatur?</p>
    </div>
  </div>
</section>

<?php
addTemplate('footer');
?>