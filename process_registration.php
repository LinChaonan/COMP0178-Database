
<?php

include_once("register.php");
require_once("config.php");
require_once("send_mail.php");
// TODO: Extract $_POST variables, check they're OK, and attempt to login.
// Notify user of success/failure and redirect/give navigation options.

// For now, I will just set session variables and redirect.


if($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $repeat_password = trim($_POST["repeat_password"]);
    $account_type = $_POST["accountType"];

    if (!isset($_POST['repeat_password'], $_POST['password'], $_POST['email'])) {
        exit('<script>alert("Please complete the registration form!")</script>');
    }

    if (empty($_POST['repeat_password']) || empty($_POST['password']) || empty($_POST['email'])) {
        exit('<script>alert("Please complete the registration form!")</script>');
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        exit('<script>alert("Invalid email format")</script>');
    }

    if(strlen($password) < 6){
        exit('<script>alert("Password must have at least 6 characters")</script>');
    }

    if ($password != $repeat_password){
        exit('<script>alert("Password did not match")</script>');
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO user (email, password, account_type) VALUES ('$email','$hashed_password','$account_type')";


    if (mysqli_query($link, $sql)) {
        echo ('<script>alert("Registration Successful")</script>');
        $subject = "Welcome to Simple Click!";
        $body = "Hi there, <br/> <br/> Your registration was successful. <br/> <br/> Enjoy you journey at Simple Click! <br/> <br/> Kind regards, <br/> Simple Click Marketing Team <br/> ";
        send_email($email, $subject, $body);
        header("refresh:0;url=browse.php");
    }

    header("refresh:0;url=browse.php");

}

?>