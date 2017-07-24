<?php
  //
  session_start();

  //
  require './functions.php';

  //
  do_leave_if_not_signed_in('./index.php');

  //
  do_destroy_session();
?>

<section>
  <h1>You've been signed out!</h1>
  <p><a href="./index.php">Back to Homepage</a></p>
  <p><a href="./sign-in.php">Sign In Again</a></p>
</section>
