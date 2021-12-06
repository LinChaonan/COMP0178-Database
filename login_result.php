<?php

require_once "config.php";
require_once "send_mail.php";
// TODO: Extract $_POST variables, check they're OK, and attempt to login.
// Notify user of success/failure and redirect/give navigation options.

// For now, I will just set session variables and redirect.

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $email = $_POST["email"];
    $pwd = $_POST["password"];


    $sql = "SELECT * FROM user WHERE (email='$email') AND (password='$pwd')";
    $result = $link->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $accountType = $row["account_type"];
        $_SESSION['logged_in'] = true;
        $_SESSION['userID'] = $row["user_id"];
        $_SESSION['account_type'] = $accountType;
        $_SESSION['email'] = $email;
        echo('<script>alert("You are now logged in! You will be redirected shortly.")</script>');

        // Redirect to browse
        header("refresh:0;url=browse.php");
        }
    else {
    echo('<script>alert("Log in failed! Email or password does not match.")</script>');
    header("refresh:0;url=logout.php");
    }

    if (!$link) {
        die("Connection failed: " . mysqli_connect_error());
    }

    mysqli_close($link);


}

?>