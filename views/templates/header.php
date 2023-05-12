<?php
  if (!isset($_SESSION)) {
    session_start();
  }

  $auth = $_SESSION['login'] ?? false;
?>


<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset='UTF-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <link rel='stylesheet' href='/nihonstay_app/build/css/app.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css' />
  <title>NihonStay - Proyect </title>
</head>

<body>
  <header class='header <?php echo $main ? 'main' : '' ?>'>
    <div class='container header-container'>
      <div class='bar'>
        <a href='/nihonstay_app/views/index.php'> <img class='logo' src='/nihonstay_app/src/img/nihonLogo.png' alt='Nihongo Logo'></a>

        <div class='mobile-menu'>
          <img src="/nihonstay_app/src/img/menu-mobile.svg" alt="responsive menu">
        </div>

        <nav class='navbar'>
          <a href='/nihonstay_app/views/aboutus.php'>About Us</a>
          <a href='/nihonstay_app/views/rentals.php'>Rentals</a>
          <a href='/nihonstay_app/views/blog.php'>Blog</a>
          <a href='/nihonstay_app/views/contact.php'>Contact</a>
          <?php if($auth) : ?>
            <a href='/nihonstay_app/views/logout.php'>Log out</a>
          <?php endif; ?>
        </nav>

      </div> <!-- Bar -->

      <?php if ($main) { ?>
        <h1 class='animate__animated animate__fadeInx'>Vacational House Rent in Japan</h1>

      <?php } ?>
    </div>
  </header>