<?php
session_start();
// TODO: Extract $_POST variables, check they're OK, and attempt to make a bid.
// Notify user of success/failure and redirect/give navigation options.
require_once "config.php";
$item_id = $_SESSION['item_id'];

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $bid = $_POST["bid"];

    $sql = "UPDATE item SET current_price = '$bid' WHERE item_id='$item_id'";


    if (mysqli_query($link, $sql)) {
        echo "新记录插入成功";
        echo('<div class="text-center">Your bid are now placed successfully! You will be redirected shortly.</div>');
        header("refresh:5;url=browse.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($link);
    }

    mysqli_close($link);


}
?>