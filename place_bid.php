<?php

// TODO: Extract $_POST variables, check they're OK, and attempt to make a bid.
// Notify user of success/failure and redirect/give navigation options.
require_once "config.php";
$item_id = $_SESSION['item_id'];
if($_SERVER["REQUEST_METHOD"] == "POST"){
    echo "hello";

    $item_id = $_SESSION['item_id'];

    $sql = "SELECT * FROM item WHERE item_id='$item_id'";


    if (!$link) {
        die("Connection failed: " . mysqli_connect_error());
    }

    mysqli_close($link);


}
?>