<?php
require '../includes/functions.php';
addTemplate('header');
?>


<main class='container section'>
  <h1>Contact</h1>

  <img src='../src/img/contact2.jpg' alt='Man looking at his garden' loading='lazy'>

  <h2>Fill the Contact form</h2>

  <form class='form' action=''>
    <fieldset>
      <legend>Personal Information</legend>

      <label for='name'>Name:</label>
      <input type='text' id='name' placeholder='Your name'>

      <label for='email'>Email:</label>
      <input type='email' id='email' placeholder='Your email'>

      <label for='phone'>Phone Number:</label>
      <input type='tel' id='phone' placeholder='Your phone number'>

      <label for='message'>Message:</label>
      <textarea name='' id='' cols='30' rows='10'></textarea>
    </fieldset>

    <fieldset>
      <legend>Information about the house</legend>

      <label for='options'>Do you want to rent a house or put your house for rent?</label>
      <select id='options'>
        <option value='' disabled selected>--Select--</option>
        <option value='putRent'>Rent a house</option>
        <option value='getRent'>Put a house for rent</option>
      </select>

      <label for='prize'>Prize per night</label>
      <input type='number' id='prize' placeholder='Your prize'>
    </fieldset>

    <fieldset>
      <legend>Contact Information</legend>

      <p>How do you want to be contacted?</p>
      <div class='contact-form'>
        <label for='phone-contact'>Phone</label>
        <input name='contact' type='radio' value='phone' id='phone-contact'>
        <label for='email-contact'>Email</label>
        <input name='contact' type='radio' value='email' id='email-contact'>
      </div>

      <p>If you selected phone, please indicate a preferred date and time for us to call you:</p>
      <label for='phone'>Date:</label>
      <input type='date' id='date'>
      <label for='time'>Time:</label>
      <input type='time' id='time' min='10:00' max='18:00'>
    </fieldset>

    <input type='submit' value='Send' class='green-button'>
  </form>
</main>


<?php
addTemplate('footer');
?>