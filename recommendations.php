<?php include_once("header.php")?>
<?php require("utilities.php")?>

<div class="container">

<h2 class="my-3">Recommendations for you</h2>

<?php
  // This page is for showing a buyer recommended items based on their bid 
  // history. It will be pretty similar to browse.php, except there is no 
  // search bar. This can be started after browse.php is working with a database.
  // Feel free to extract out useful functions from browse.php and put them in
  // the shared "utilities.php" where they can be shared by multiple files.
  
  
  // TODO: Check user's credentials (cookie/session).
  
  // TODO: Perform a query to pull up auctions they might be interested in.
  
  // TODO: Loop through results and print them out as list items.

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

$category = "electronics";
$date = date('Y-m-d');

$sql = "SELECT item_id, title, description, current_price, num_bids, end_date  FROM  item 
        WHERE (category='$category') AND (end_date > $date)";

$result = $conn->query($sql);



if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $list_id = $row["item_id"];
        $title = $row["title"];
        $description = $row["description"];
        $current_price = $row["current_price"];
        $num_bids = $row["num_bids"];
        try {
            $end_time = new DateTime($row["end_date"]);
        } catch (Exception $e) {
        }
        $item_id = $row["item_id"];
        print_listing_li($item_id, $title, $description, $current_price, $num_bids, $end_time);

    }
} else {
    echo "0 results";
}



?>