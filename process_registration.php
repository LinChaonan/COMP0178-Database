
<?php

include_once("register.php");
require_once "config.php";
// TODO: Extract $_POST variables, check they're OK, and attempt to login.
// Notify user of success/failure and redirect/give navigation options.

// For now, I will just set session variables and redirect.


if($_SERVER["REQUEST_METHOD"] == "POST") {

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

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        exit("Invalid email format");
    }

    if(strlen($password) < 6){
        exit("Password must have at least 6 characters");
    }

    if ($password != $repeat_password){
        exit("Password did not match");
    }

    $sql = "INSERT INTO user (email, password, account_type)
VALUES ('$email','$password', '$account_type')";

    if (mysqli_query($link, $sql)) {
        echo "Registration Successful";
    }

}

?>