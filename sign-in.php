<?php
  //
  session_start();

  //
  require './functions.php';

  //
  do_leave_if_signed_in('./index.php');

  // Check if form was submitted
  if (!empty($_POST['username']) || !empty($_POST['password'])) {
    // Get values from POST
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Set SESSION variables
    $_SESSION['username'] = $username;
    $_SESSION['signed_in'] = true;
  }
?>

<section>
<?php
if (signed_in()) {
?>
  <h1>You've been signed in!</h1>
  <p><a href="./index.php">Go to Homepage</a></p>
<?php
} else {
?>
  <h1>Sign In</h1>

  <form action="./sign-in.php" method="post">
    <p>
      <label for="username">Username</label>
      <input id="username" name="username" type="text" />
    </p>

    <p>
      <label for="password">Password</label>
      <input id="password" name="password" type="password" />
    </p>

    <button type="submit">Sign In</button>
  </form>
<?php
}
?>
</section>
