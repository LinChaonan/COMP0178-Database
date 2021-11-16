
<?php
session_start();


if($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "test";
    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql = "INSERT INTO users (email, password) 
  			  VALUES('$email', '$password')";


    $_SESSION['email'] = $email;
    $_SESSION['success'] = "You are now logged in";
    header('location: browse.php');
}