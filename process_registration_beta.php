<?php

// TODO: Extract $_POST variables, check they're OK, and attempt to create
// an account. Notify user of success/failure and redirect/give navigation
// options.

/*
require_once "config.php";

$email= $password = $passwordConfirmation = "";
$email_err = $password_err = $passwordConfirmation_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if (empty($_POST["email"])) {
        $email_err = "Email is required";
    } else {
        $email = trim($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_err = "Invalid email format";
        }
    }

    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have at least 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }


    if(empty(trim($_POST["passwordConfirmation"]))){
        $passwordConfirmation_err = "Please confirm password.";
    } else {
        $passwordConfirmation = trim($_POST["repeat_password"]);
        if (empty($password_err) && ($password != $passwordConfirmation)) {
            $passwordConfirmation_err = "Password did not match.";
        }
    }

    $sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";

    $accountType = $_POST['accountType'];

    if(empty($email_err) && empty($password_err) && empty($passwordConfirmation_err)){
        $query = "INSERT INTO users (email, password) VALUES('$email', '$password')";
        mysqli_query($conn, $query);
        $_SESSION['success'] = "You are now logged in";
        header('location: browse.php');

    }
}

?>


/*
require_once "config.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {


    $email= $password = $passwordConfirmation = "";
    $email_err = $password_err = $passwordConfirmation_err = "";

    if (empty($_POST["email"])) {
        $email_err = "Email is required";
    } else {
        $email = trim($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_err = "Invalid email format";
        }
    }

    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have at least 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }


    if(empty(trim($_POST["repeat_password"]))){
        $passwordConfirmation_err = "Please confirm password.";
    } else {
        $passwordConfirmation = trim($_POST["repeat_password"]);
        if (empty($password_err) && ($password != $passwordConfirmation)) {
            $passwordConfirmation_err = "Password did not match.";
        }
    }



    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    echo $email, $password;

    $sql = "INSERT INTO user (email, password)
  			  VALUES('$email', '$password')";

    $_SESSION['email'] = $email;
    $_SESSION['success'] = "You are now logged in";
    header('location: browse.php');

}

*/