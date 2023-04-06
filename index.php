<?php include 'header.php'; ?>
<?php
$name = $email = $feedback = '';
$nameErr = $emailErr = $feedbackErr = '';
//fORM SUBMIT
if (isset($_POST['name'])) {
  //Validate name email and feedback fields
  if (empty($_POST['name'])) {
    $nameErr = 'Your name is required';
  } else {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  }
  if (empty($_POST['email'])) {
    $emailErr = 'Your email is required';
  } else {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  }
  if (empty($_POST['feedback'])) {
    $feedbackErr = 'We need your feedback';
  } else {
    $feedback = filter_input(INPUT_POST, 'feedback', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  }
  if (empty($nameErr) && empty($emailErr) && empty($feedbackErr)) {
    //add to database
    $sql = "INSERT INTO feebac (name,email,feedback) VALUES ('$name','$email','$feedback')";
    if (mysqli_query($conn, $sql)) {
      //success
      header('Location: feedback.php');
    } else {
      //error
      echo 'Error: ' . mysqli_error($conn);
    }
  }
}


?>
<main class="content">
  <div class="container text-center">
    <div class="row">
      <div class>
        <img class="circle" alt="Spiral CEO" src="logo-no-background.png" height="200" width="350" />
        <h1>Feedback</h1>
        <p class="lead text-centre">Leave feedback for Spiral Media</p>

      </div>
    </div>
  </div>

  <form class="mt-4 w-75" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <div class="mb-3">
      <label for="name" class="form-label"> Name</label>
      <input type="text" name="name" placeholder="Enter your name" class="form-control <?php echo $nameErr ? 'is-invalid' : null; ?>" <div class="invalid-feedback">
      <?php echo $nameErr; ?>
    </div>
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email </label>
      <input type="email" name="email" placeholder="Enter your email" class="form-control <?php echo $emailErr ? 'is-invalid' : null; ?>">
      <div class="invalid-feedback">
        <?php echo $emailErr; ?>
      </div>
    </div>
    <div class="mb-3">
      <label for="feedback" class="form-label">Feedback</label>
      <textarea class="form-control <?php echo $feedbackErr ? 'is-invalid' : null; ?>" rows="5" id="feedback" name="feedback" placeholder="Enter your feedback"></textarea>
      <div class="invalid-feedback">
        <?php echo $feedbackErr; ?>
      </div>
    </div>
    <div>
      <button type="submit" value="Submit" name="send" class="btn btn-primary form-control">Submit</button>
    </div>
  </form>
</main>
<?php include 'footer.php'; ?>