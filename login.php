<?php
require_once "session.php";

if ($_SERVER["REQUEST_METHOD"] =="POST"){

    $mysqli = require "database.php";
    $sql = sprintf("SELECT * from users where email = '%s'", $mysqli -> real_escape_string($_POST["email"]));
    $result = $mysqli -> query($sql);
    $users = $result -> fetch_assoc();
        if ($users){
            if ($_POST["password"] == $users["PASSWORD"]){
              $_SESSION["email"] = $users["EMAIL"];
              header("Location: index.php");
            }
            else die("Incorrect email or password");
        }
        else die("Incorrect email or password");
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login | By Code Info</title>
    <link rel="stylesheet" href="Css/style.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <div class="login-box">
      <h1>Login</h1>
      <form method="POST">
        <label>Email</label>
        <input type="email" name = "email" placeholder="" />
        <label>Password</label>
        <input type="password"  name = "password" placeholder="" />
        <button><input type="button" value="Submit" /></button>
      <closeform></closeform></form>
    </div>
    <p class="para-2">
      Not have an account? <a href="signup.php">Sign Up Here</a>
    </p>
  </body>
</html>