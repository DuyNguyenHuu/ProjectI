<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sign Up | By Code Info</title>
    <link rel="stylesheet" href="Css/style.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <div class="signup-box">
      <h1>Sign Up</h1>
      <h4>It's free and only takes a minute</h4>
      <form action = "process-signup.php" method = "post">
        <label>Name</label>
        <input type="text" name = "name" placeholder="" />
        <label>Email</label>
        <input type="email" name = "email" placeholder="" />
        <label>Password</label>
        <input type="password"  name = "password" placeholder="" />
        <label>Confirm Password</label>
        <input type="password" name = "confirm_password"placeholder="" />
        <button><input type="button" value="Submit" /></button>
      <closeform></closeform></form>
      <p>
        By clicking the Sign Up button,you agree to our <br />
        <a href="#">Terms and Condition</a> and <a href="#">Policy Privacy</a>
      </p>
    </div>
    <p class="para-2">
      Already have an Account? <a href="login.php">Login here</a>
    </p>
  </body>
</html>
