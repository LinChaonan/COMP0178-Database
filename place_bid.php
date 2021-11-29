<?php
session_start();
// TODO: Extract $_POST variables, check they're OK, and attempt to make a bid.
// Notify user of success/failure and redirect/give navigation options.
require_once "config.php";
$itemID = $_SESSION['item_id'];
$userID = $_SESSION['userID'];
$now = new DateTime();
$currentPrice = $_SESSION['currentPrice'];

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $bid = $_POST["bid"];
    if ($bid>$currentPrice) {

        $sql = "UPDATE item SET current_price = '$bid' WHERE item_id='$itemID'";

        if (mysqli_query($link, $sql)) {
            echo "记录插入成功";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($link);
        }

        $history = "INSERT INTO historical_auction_price (item_id, user_id, bid_price)
                                        VALUES ('$itemID','$userID','$bid')";


        if (mysqli_query($link, $history)) {
            echo "历史记录插入成功";
            echo('<div class="text-center">Your bid are now placed successfully! You will be redirected shortly.</div>');
            header("refresh:5;url=browse.php");
        } else {
            echo "Error: " . $history . "<br>" . mysqli_error($link);
        }

        mysqli_close($link);
    }
    else{
        echo('<div class="text-center">Your price is lower than current price, try again.</div>');
        header("refresh:5;url=browse.php");
    }

}
?>