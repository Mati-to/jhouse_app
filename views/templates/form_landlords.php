<fieldset>
  <legend>General Information</legend>

  <label for="fname">First Name: </label>
  <input type="text" id="fname" name="landlord[firstname]" value="<?php echo sanitize($landlord->firstname); ?>" placeholder="First Name">

  <label for="lname">Last Name: </label>
  <input type="text" id="lname" name="landlord[lastname]" value="<?php echo sanitize($landlord->lastname); ?>" placeholder="Last Name">

</fieldset>

<fieldset>
  <legend>Contact Information</legend>

  <label for="phone">Phone Number: </label>
  <input type="number" id="phone" name="landlord[phone]" value="<?php echo sanitize($landlord->phone); ?>" placeholder="Phone Number">
</fieldset>