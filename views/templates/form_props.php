<fieldset>
  <legend>General Information</legend>

  <label for="title">Title: </label>
  <input type="text" id="title" name="title" value="<?php echo sanitize($property->title); ?>" placeholder="House Title">

  <label for="prize">Prize per night: </label>
  <input type="number" id="prize" name="prize" value="<?php echo sanitize($property->prize); ?>" placeholder="House Prize">

  <label for="image">Image: </label>
  <input type="file" name="image" id="image" accept="image/jpeg, image/png">

  <label for="description">Description: </label>
  <textarea name="description" id="description" cols="30" rows="10"><?php echo sanitize($property->description); ?></textarea>
</fieldset>

<fieldset>
  <legend>House Information</legend>

  <label for="rooms">Rooms: </label>
  <input type="number" name="rooms" id="rooms" value="<?php echo sanitize($property->rooms); ?>" placeholder="For example: 1" min='1' max='8'>

  <label for="wc">Bathrooms: </label>
  <input type="number" name="wc" id="wc" value="<?php echo sanitize($property->wc); ?>" placeholder="For example: 1" min='1' max='8'>

  <label for="parking">Parking lots: </label>
  <input type="number" name="parking" id="parking" value="<?php echo sanitize($property->parking); ?>" placeholder="For example: 1" min='0' max='8'>
</fieldset>