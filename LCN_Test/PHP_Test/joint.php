<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "auction_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = '1';

$sql= "SELECT a.user_id, b.user_id, b.current_bid FROM user a INNER JOIN buyer b 
                        ON (a.user_id = b.user_id) AND a.user_id = '1' ";

$mysql= "SELECT a.user_id, a.item_id, b.item_id, b.title, b.description,
            b.current_price, b.num_bids, b.end_date FROM watch_list a INNER JOIN item b
                        ON (a.item_id = b.item_id) AND (a.user_id = '$id')";

$result = $conn->query($mysql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["user_id"]. " - Name: " . $row["title"]. " " . $row["b.title"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>