<?php include_once("header.php")?>

    <div class="container">
        <h2 class="my-3">Change your password</h2>

        <form method="POST" action="reset_password.php">
            <br>

            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label text-right">Current Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Please enter your current password">
                    <small id="passwordHelp" class="form-text text-muted"><span class="text-danger">* Required</span></small>
                </div>
            </div>
            <div class="form-group row">
                <label for="new_password" class="col-sm-2 col-form-label text-right">New Password</label>
                <div class="col-sm-10">
                    <input type="new_password" class="form-control" name="new_password" id="new_password" placeholder="Please enter your new password">
                    <small id="new_passwordHelp" class="form-text text-muted"><span class="text-danger">* Required</span></small>
                </div>
            </div>
            <div class="form-group row">
                <label for="password_confirmation" class="col-sm-2 col-form-label text-right">Repeat Password</label>
                <div class="col-sm-10">
                    <input type="password_confirmation" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Please enter your new password again">
                    <small id="password_confirmationHelp" class="form-text text-muted"><span class="text-danger">* Required</span></small>
                </div>
            </div>

            <div class="form-group row">
                <button type="submit" class="btn btn-primary form-control">Register</button>
            </div>
        </form>


<?php

include_once("footer.php");

session_start();

$id = $_SESSION['userID'];
$password = $_SESSION['password'];
//echo $id;

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $pwd = $_POST["password"];
    $npwd = $_POST["new_password"];
    $rpwd = $_POST["password_confirmation"];

    if (empty($_POST['password']) || empty($_POST['new_password']) || empty($_POST['password_confirmation'])) {
        exit('<script>alert("Please fill in all required information")</script>');
    }

    if (password_verify($pwd, $password))
    {

    }
    else{
        exit('<script>alert("Incorrect Password")</script>');
    }

    if ($npwd != $rpwd){
        exit('<script>alert("New passwords do not match")</script>');
    }

    $hashed_password = password_hash($npwd, PASSWORD_DEFAULT);

    $sql = "UPDATE user SET password = '$hashed_password' WHERE user_id='$id'";

    if (mysqli_query($link, $sql)) {
        //  echo "<script>alert('The new record is successfully inserted.')</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($link);
    }











}













?>


