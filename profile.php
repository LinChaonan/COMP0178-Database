<?php
require_once "config.php";
include_once("header.php");

$user_id = $_SESSION['userID'];
$info = "SELECT * FROM user WHERE user_id='$user_id'";
$info_result = $link->query($info);

if ($info_result->num_rows > 0) {
    $row = $info_result->fetch_assoc();
    $email = $row["email"];
    $address = $row["address"];
    $phone = $row["phone"];
} else {
    echo "0 results";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body{text-align: center; }
    </style>
</head>
<body>
<h1 class="my-5">Hello, Welcome to Simple Click</h1>
<?php echo('
  <div class="form-group row">
  </div>
  <div class="form-group row">
    <label for="email" style="font-size: 1.2em" class="col-sm-2 col-form-label text-right">Email:</label>
    <label for="email" style="font-size: 1.2em" class="col-sm-2 col-form-label text-center">' . $email . '</label>
  </div>
  <div class="form-group row">
    <label for="Address" style="font-size: 1.2em" class="col-sm-2 col-form-label text-right">Address:</label>
    <label for="Address" style="font-size: 1.2em" class="col-sm-2 col-form-label text-center">' . $address . '</label>
  </div>
  <div class="form-group row">
    <label for="Phone Number" style="font-size: 1.2em" class="col-sm-2 col-form-label text-right">Phone Number:</label>
    <label for="Phone Number" style="font-size: 1.2em" class="col-sm-2 col-form-label text-center">' . $phone . '</label>
  </div>
')
?>
<p>
    <br>
    <a href="reset_password.php" class="btn btn-dark">Reset Your Password</a>
</p>
</body>
</html>

