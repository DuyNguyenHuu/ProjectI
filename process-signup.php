<?php

if (empty($_POST["name"])){
    die("Name is required");
}

if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
    die("Valid email is required");
}

if ( strlen($_POST["password"]) < 8){
    die("Password must be at least 8 characters");
}

// if ( ! preg_match("/[a_z]/", $_POST["password"])){
//     die("Password must contain at least on letter");
// }

// if ( ! preg_match("/[0_9]/", $_POST["password"])){
//     die("Password must contain at least on number");
// }

if ($_POST["password"] !== $_POST["confirm_password"]){
    die("Passwords must match");
}

$mysqli = require "database.php";

$sql = "INSERT INTO users (name, email, password)
        VALUES ('".$_POST["name"]."', '".$_POST["email"]."', '".$_POST["password"]."')";

$mysqli -> query($sql);

 header("Location: signup-success.php");