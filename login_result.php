<?php

require_once "config.php";
// TODO: Extract $_POST variables, check they're OK, and attempt to login.
// Notify user of success/failure and redirect/give navigation options.

// For now, I will just set session variables and redirect.

session_start();
//$_SESSION['logged_in'] = true;
//$_SESSION['account_type'] = "buyer";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $email = $_POST["email"];
    $pwd = $_POST["password"];

    echo $email, $pwd;

    $sql = "SELECT * FROM user WHERE (email='$email') AND (password='$pwd')";
    //执行上面的sql语句并将结果集赋给result。
    $result = $link->query($sql);
    //判断结果集的记录数是否大于0
    if ($result->num_rows > 0) {
        echo "matched";
        $row = $result->fetch_assoc();
        $_SESSION['logged_in'] = true;
        $_SESSION['account_type'] = "seller";
        $_SESSION['userID'] = $row["user_id"];
        echo $_SESSION['userID'];
        echo('<div class="text-center">You are now logged in! You will be redirected shortly.</div>');

        // Redirect to index after 5 seconds
        header("refresh:5;url=browse.php");
        }
    else {
    echo "无信息匹配";
    echo('<div class="text-center">log in failed! You will be redirected shortly.</div>');
    header("refresh:5;url=logout.php");
    }

    if (!$link) {
        die("Connection failed: " . mysqli_connect_error());
    }

    mysqli_close($link);


}

?>