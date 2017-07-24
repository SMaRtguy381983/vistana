<?php
  //
  session_start();

  //
  require './functions.php';

  //
  do_leave_if_signed_in('./index.php');

  //
  $errors = [];

  // Set default step in GET if no step is found
  if (empty($_GET)) $_GET = ['step' => '1'];

  $username = '';
  $dob = '';
  // $question_1 = $_POST['question-1'];
  $answer_1 = '';
  // $question_2 = $_POST['question-2'];
  $answer_2 = '';
  // $question_3 = $_POST['question-3'];
  $answer_3 = '';

  // Check if POST is not empty
  if (!empty($_POST)) {
    // Handle when POST is not empty
    switch($_GET['step']) {
      // Handle POST for step 1
      case '1':
        //
        if (empty($_POST['username'])) {
          array_push($errors, 'A username is required!');
        } else {
          $username = $_POST['username'];
        }

        //
        if (empty($_POST['dob'])) {
          array_push($errors, 'Your date of birth is required!');
        } else {
          $dob = $_POST['dob'];
        }

        //
        if (empty($errors)) {
          // Set SESSION variables
          $_SESSION['username'] = $username;
          $_SESSION['dob'] = $dob;

          //
          do_redirect('./sign-up.php?step=2');
        }
      break;

      // Handle POST for step 2
      case '2':
        //
        if (empty($_POST['question-1'])) {
          array_push($errors, 'Question 1 is required!');
        } else {
          $question_1 = $_POST['question-1'];
        }

        //
        if (empty($_POST['answer-1'])) {
          array_push($errors, 'Answer 1 is required!');
        } else {
          $answer_1 = $_POST['answer-1'];
        }

        //
        if (empty($_POST['question-2'])) {
          array_push($errors, 'Question 2 is required!');
        } else {
          $question_2 = $_POST['question-2'];
        }

        //
        if (empty($_POST['answer-2'])) {
          array_push($errors, 'Answer 2 is required!');
        } else {
          $answer_2 = $_POST['answer-2'];
        }

        //
        if (empty($_POST['question-3'])) {
          array_push($errors, 'Question 3 is required!');
        } else {
          $question_3 = $_POST['question-3'];
        }

        //
        if (empty($_POST['answer-3'])) {
          array_push($errors, 'Answer 3 is required!');
        } else {
          $answer_3 = $_POST['answer-3'];
        }

        //
        if (empty($errors)) {
          // Set SESSION variables
          $_SESSION['question-1'] = $question_1;
          $_SESSION['answer-1'] = $answer_1;
          $_SESSION['question-2'] = $question_2;
          $_SESSION['answer-2'] = $answer_2;
          $_SESSION['question-3'] = $question_3;
          $_SESSION['answer-3'] = $answer_3;

          //
          do_redirect('./index.php');
        }
      break;
    }
  }
?>

<section>
<?php
if ($_GET['step'] === '1') {
?>
  <h1>Sign Up - Step 1</h1>

  <p><a href="./index.php">Go Back</a></p>

  <?= do_print_errors($errors); ?>

  <form action="./sign-up.php?step=1" method="post">
    <p>
      <label for="username">Username</label>
      <input id="username" name="username" type="text" value="<?= $username; ?>" />
    </p>

    <p><!-- TODO Should be a date picker -->
      <label for="dob">Date of Birth</label>
      <input id="dob" name="dob" type="text" value="<?= $dob; ?>" />
    </p>

    <button type="submit">Continue to Step 2</button>
  </form>
<?php
} else if ($_GET['step'] === '2') {
?>
  <h1>Sign Up - Step 2</h1>

  <p><a href="./sign-up.php?step=1">Go Back</a></p>

  <?= do_print_errors($errors); ?>

  <form action="./sign-up.php?step=2" method="post">
    <p><!-- TODO Should be a drop down -->
      <label for="question-1">Choose Question 1</label>
      <input id="question-1" name="question-1" type="text" value="<?= $question_1; ?>" />
    </p>

    <p>
      <label for="answer-1">Answer Question 1</label>
      <input id="answer-1" name="answer-1" type="text" value="<?= $answer_1; ?>" />
    </p>

    <p><!-- TODO Should be a drop down -->
      <label for="question-2">Choose Question 2</label>
      <input id="question-2" name="question-2" type="text" value="<?= $question_2; ?>" />
    </p>

    <p>
      <label for="answer-2">Answer Question 2</label>
      <input id="answer-2" name="answer-2" type="text" value="<?= $answer_2; ?>" />
    </p>

    <p><!-- TODO Should be a drop down -->
      <label for="question-3">Choose Question 3</label>
      <input id="question-3" name="question-3" type="text" value="<?= $question_3; ?>" />
    </p>

    <p>
      <label for="answer-3">Answer Question 3</label>
      <input id="answer-3" name="answer-3" type="text" value="<?= $answer_3; ?>" />
    </p>

    <button type="submit">Complete Sign Up</button>
  </form>
<?php
}
?>
</section>
