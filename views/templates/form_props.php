<fieldset>
  <legend>General Information</legend>

  <label for="title">Title: </label>
  <input type="text" id="title" name="property[title]" value="<?php echo sanitize($property->title); ?>" placeholder="House Title">

  <label for="prize">Prize per night: </label>
  <input type="number" id="prize" name="property[prize]" value="<?php echo sanitize($property->prize); ?>" placeholder="House Prize">

  <label for="image">Image: </label>
  <input type="file" name="property[image]" id="image" accept="image/jpeg, image/png">
  <?php if ($property->image) { ?>
    <img src="../../images/<?php echo $property->image ?>" class="small-image" alt="">
  <?php } ?>

  <label for="description">Description: </label>
  <textarea name="property[description]" id="description" cols="30" rows="10"><?php echo sanitize($property->description); ?></textarea>
</fieldset>

<fieldset>
  <legend>House Information</legend>

  <label for="rooms">Rooms: </label>
  <input type="number" name="property[rooms]" id="rooms" value="<?php echo sanitize($property->rooms); ?>" placeholder="For example: 1" min='1' max='8'>

  <label for="wc">Bathrooms: </label>
  <input type="number" name="property[wc]" id="wc" value="<?php echo sanitize($property->wc); ?>" placeholder="For example: 1" min='1' max='8'>

  <label for="parking">Parking lots: </label>
  <input type="number" name="property[parking]" id="parking" value="<?php echo sanitize($property->parking); ?>" placeholder="For example: 1" min='0' max='8'>
</fieldset>

<fieldset>
  <legend>Landlord</legend>

  <label for="landlord">Landlord:</label>
  <select name="property[landlords_id]" id="landlord">
    <option selected value="">-- Select --</option>
    <?php foreach ($landlords as $landlord) { ?>
      <option
        <?php echo $property->landlords_id === $landlord->id ? 'selected' : '';  ?>
        value="<?php echo sanitize($landlord->id); ?>">
        <?php echo sanitize($landlord->firstname) . " " . sanitize($landlord->lastname); ?>
      </option>
    <?php } ?>
  </select>
</fieldset>