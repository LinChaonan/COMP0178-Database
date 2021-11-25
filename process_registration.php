
<?php

include_once("register.php");
require_once "config.php";
// TODO: Extract $_POST variables, check they're OK, and attempt to login.
// Notify user of success/failure and redirect/give navigation options.

// For now, I will just set session variables and redirect.


if($_SERVER["REQUEST_METHOD"] == "POST") {

    /*
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
    */

    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $repeat_password = trim($_POST["repeat_password"]);
    $account_type = $_POST["accountType"];
    $errors = array();

    if (!isset($_POST['repeat_password'], $_POST['password'], $_POST['email'])) {
        exit('Please complete the registration form!');
    }

    if (empty($_POST['repeat_password']) || empty($_POST['password']) || empty($_POST['email'])) {
        exit('Please complete the registration form!');
    }

    $sql = "INSERT INTO user (email, password, account_type)
VALUES ('$email','$password', '$account_type')";

    if (mysqli_query($link, $sql)) {
        echo "Registration Successful";
    }

}

?>