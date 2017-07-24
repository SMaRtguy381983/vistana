<?php
function signed_in() {
  //
  if (!empty($_SESSION['signed_in']) && !empty($_SESSION['username'])) {
    return true;
  }

  //
  return false;
}

function do_destroy_session() {
  // Clear SESSION array
  $_SESSION = [];

  // Destroy SESSION
  session_destroy();
}

function do_redirect($uri, $exit = true) {
  // Redirect to uri
  header('Location: ' . $uri);

  // If exit, exit to prevent further process
  if ($exit) exit();
}

function do_leave_if_signed_in($uri) {
  // Check if signed in
  if (signed_in()) {
    // Redirect to uri
    do_redirect($uri);
  }
}

function do_leave_if_not_signed_in($uri) {
  // Check if not signed in
  if (!signed_in()) {
    // Redirect to uri
    do_redirect($uri);
  }
}

function do_print_errors($errors) {
  if (!empty($errors)) {
    echo '<ul>';

    foreach ($errors as $key => $value) {
      echo '<li>' . $value . '</li>';
    }

    echo '</ul>';
  }
}
?>
