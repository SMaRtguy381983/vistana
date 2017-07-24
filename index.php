<?php
  //
  session_start();

  //
  require './functions.php';
?>

<script>
// alert("get rekt son");
// Get sign-in-button by id
document.getElementById("sign-in-button").addEventListener("click", function(event){
  alert("gg son");
  event.preventDefault();
});
// document.getElementById('sign-in-button')
//   // Listen for clicks on sign-in-button
//   .addEventListener('click', function(event) {
//     // Display sign-in modal
//     // document.getElementById('sign-in-modal').style.display = 'block';
//
//     // Prevent redirect to sign-in.php
//     // event.preventDefault();
//   });
</script>

<style>
#sign-in-modal {
  display: none;
  height: 50%;
  width: 50%;
  margin: auto;
  position: absolute;
  top: 0; left: 0; bottom: 0; right: 0;
}
</style>

<section id="sign-in-modal">
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
</section>

<section>
<?php
if (signed_in()) {
?>
  <h1>Welcome back, <?= $_SESSION['username']; ?>!</h1>
  <p><a href="./sign-out.php">Sign Out</a></p>
<?php
} else {
?>
  <h1>Welcome!</h1>
  <p><a href="./sign-in.php" id="sign-in-button">Sign In</a></p>
  <p><a href="./sign-up.php?step=1">Sign Up</a></p>
<?php
}
?>
</section>
