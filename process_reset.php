<?php

require_once("config.php");
require_once("send_mail.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {

    session_start();
    $id = $_SESSION['userID'];
    $password = $_SESSION['password'];
    //echo $id, '-', $password;

    $pwd = $_POST["password"];
    $npwd = $_POST["new_password"];
    $rpwd = $_POST["password_confirmation"];

    if (empty($_POST['password']) || empty($_POST['new_password']) || empty($_POST['password_confirmation'])) {
        echo('<script>alert("Please fill in all required information")</script>');
        header("refresh:0;url=reset_password.php");
        die();
    }

    if (password_verify($pwd, $password)) {

    }
    else {
        echo('<script>alert("Incorrect Password")</script>');
        header("refresh:0;url=reset_password.php");
        die();
    }

    if ($pwd == $npwd){
        echo('<script>alert("New password cannot the same with current password")</script>');
        header("refresh:0;url=reset_password.php");
        die();

    }

    if(strlen($npwd) < 6){
        echo('<script>alert("Password must have at least 6 characters")</script>');
        header("refresh:0;url=reset_password.php");
        die();
    }

    if ($npwd != $rpwd) {
        echo('<script>alert("New passwords do not match")</script>');
        header("refresh:0;url=reset_password.php");
        die();
    }

    $hashed_password = password_hash($npwd, PASSWORD_DEFAULT);

    $sql = "UPDATE user SET password = '$hashed_password' WHERE user_id='$id'";

    if (mysqli_query($link, $sql)) {

        echo ('<script>alert("The password is changed successfully.")</script>');
        $emails = "SELECT email FROM user WHERE user_id = '$id'";
        $email_result = $link->query($emails);
        while ($row = mysqli_fetch_array($email_result)) {
            $email = $row['email'];
            $subject = "Password Changed";
            $body = "Hi there, <br/> <br/> The password for your Simple Click account has changed. <br/> <br/> Enjoy you journey at Simple Click! <br/> <br/> Kind regards, <br/> Simple Click Marketing Team <br/> ";
            send_email($email, $subject, $body);
        }
    }
}
mysqli_close($link);
header("refresh:0;url=logout.php");
?>