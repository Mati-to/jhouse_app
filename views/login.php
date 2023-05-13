<?php
require '../includes/app.php';
$db = connectionDB();

$validation = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (!$email) {
    $validation[] = 'Email not valid';
  }
  if (!$password) {
    $validation[] = 'Password not valid';
  }

  if (empty($validation)) {
    $query = " SELECT * FROM users WHERE email = '$email' ";
    $result = mysqli_query($db, $query);

    if ($result->num_rows) {
      $user = mysqli_fetch_assoc($result);
      $auth = password_verify($password, $user['password']);

      if($auth) {
        session_start();
        $_SESSION['user'] = $user['email'];
        $_SESSION['login'] = true;

        header('Location: /nihonstay_app/admin/index.php');

      } else {  
        $validation[] = 'The email or the password is incorrect';
      }
      
    } else {
      $validation[] = 'User does not exist';
    }
  }
}

addTemplate('header');
?>

<main class='container section content-center'>
  <h1>Login into your account</h1>

  <?php foreach ($validation as $validate) { ?>
    <div class="alert error">
      <?php echo $validate; ?>
    </div>
  <?php }; ?>

  <form class="form" method="POST">
    <fieldset>
      <legend>Email and Password</legend>

      <label for='email'>Email:</label>
      <input type='email' name="email" id='email' placeholder='Your email' required>

      <label for='password'>Password:</label>
      <input type='password' name="password" id='password' placeholder='Your password' required>
    </fieldset>

    <input type="submit" value="Login" class="button green-button">
  </form>

</main>

<?php
addTemplate('footer');
?>