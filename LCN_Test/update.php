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

$sql = "SELECT * FROM item";
$result = $conn->query($sql);
$now = new DateTime();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

        $end_time = new DateTime($row["end_date"]);
        $id = $row["item_id"];
                 if ($now > $end_time) {
                    $check = "UPDATE item SET status = '1' WHERE item_id = '$id'";
                    if (mysqli_query($conn,$check)) {
                        echo "数据更新成功";
                    } else {
                        echo "Error: " . $check . "<br>" . mysqli_error($conn);
                    }
        }

    }
} else {
    echo "0 results";
}
?>
