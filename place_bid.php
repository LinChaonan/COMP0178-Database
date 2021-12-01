<?php
session_start();
// TODO: Extract $_POST variables, check they're OK, and attempt to make a bid.
// Notify user of success/failure and redirect/give navigation options.
require_once "config.php";
require_once("send_mail.php");

$itemID = $_SESSION['item_id'];
$userID = $_SESSION['userID'];
$now = new DateTime();
$currentPrice = $_SESSION['currentPrice'];

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $bid = $_POST["bid"];
    if ($bid>$currentPrice) {

        $sql = "UPDATE item SET current_price = '$bid', buyer_id = '$userID',
            num_bids=num_bids+1 WHERE item_id='$itemID'";

        if (mysqli_query($link, $sql)) {
            echo "The new record is successfully inserted.";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($link);
        }

        $history = "INSERT INTO historical_auction_price (item_id, user_id, bid_price,bid_time)
                    VALUES ('$itemID','$userID','$bid',now())";


        if (mysqli_query($link, $history)) {
            echo "Historical records are inserted successfully.";
            echo('<div class="text-center">Your bid are now placed successfully! You will be redirected shortly.</div>');
            header("refresh:5;url=browse.php");
        } else {
            echo "Error: " . $history . "<br>" . mysqli_error($link);
        }

        $sqli = "SELECT u.email
                 FROM historical_auction_price AS h Left JOIN user AS u ON u.user_id = h.user_id
                 WHERE h.item_id = '$itemID'";

        $result = $link->query($sqli);
        if ($result->num_rows >0) {
            while ($row=$result->fetch_assoc()) {
                $email=$row["email"];
                // for each user, get their emails, and send this to them
                $subject = "New bid";
                $body = "Price update!";
                send_email($email, $subject, $body);
                echo "email success";

            }
        }

        mysqli_close($link);
    }
    else{
        echo('<div class="text-center">Your price is lower than current price, try again.</div>');
        header("refresh:5;url=browse.php");
    }

}
?>