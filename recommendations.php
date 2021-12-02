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

require_once "config.php";

$id = $_SESSION['userID'];
//echo $id;


// 1. Get ids of items with similar title with items the user bid before
$titles = "SELECT b.title FROM historical_auction_price AS a LEFT JOIN item AS b ON a.item_id = b.item_id WHERE a.user_id = '$id'";
$str = '';
$result = $link -> query($titles);
while($row = mysqli_fetch_array($result)) {
    //echo $row['title'];
    $str .= $row['title'];
    $str .= ',';
}
$str = process_str($str);
//print_r($str);

$str2 = '';

foreach ($str as $value){

    $title_id = "SELECT item_id FROM item WHERE (title LIKE '%$value%') AND (status = '0')";
    $result = $link -> query($title_id);
    //print_r($result);

    while($row = mysqli_fetch_array($result)) {
        //echo $row['item_id'];
        $str2 .= $row['item_id'];
        $str2 .= ',';
    }
    //echo $str2;

}
$id_list1 = process_str($str2);


// 2. Get ids of items with similar title with items the user is watching
$titles = "SELECT b.title FROM watch_list AS a LEFT JOIN item AS b ON a.item_id = b.item_id WHERE a.user_id = '$id'";
$str3 = '';
$result = $link -> query($titles);
while($row = mysqli_fetch_array($result)) {
    //echo $row['title'];
    $str3 .= $row['title'];
    $str3 .= ',';
}
$str3 = process_str($str3);
//print_r($str3);

$str4 = '';

foreach ($str3 as $value){

    $title_id = "SELECT item_id FROM item WHERE (title LIKE '%$value%') AND (status = '0')";
    $result = $link -> query($title_id);
    //print_r($result);

    while($row = mysqli_fetch_array($result)) {
        //echo $row['item_id'];
        $str4 .= $row['item_id'];
        $str4 .= ',';
    }
    //echo $str4;

}
$id_list2 = process_str($str4);


// 3. Get ids of items with same category with items the user bid before
$categories = "SELECT b.category FROM historical_auction_price AS a LEFT JOIN item AS b ON a.item_id = b.item_id WHERE a.user_id = '$id'";
$str5 = '';
$result = $link -> query($categories);
while($row = mysqli_fetch_array($result)) {
    //print_r($row);
    //echo $row;
    $str5 .= $row['category'];
    $str5 .= ',';
}
$str5 = process_str($str5);
//print_r($str5);


$str6 = '';

foreach ($str5 as $value){

    $category_id = "SELECT item_id FROM item WHERE (category='$value') AND (status = '0')";
    $result = $link -> query($category_id);
    //print_r($result);

    while($row = mysqli_fetch_array($result)) {
        //echo $row['item_id'];
        $str6 .= $row['item_id'];
        $str6 .= ',';
    }
    //echo $str6;

}
$id_list3 = process_str($str6);
//print_r($id_list3);


// 4. Get ids of items with same category with items the user is watching
$categories = "SELECT b.category FROM watch_list AS a LEFT JOIN item AS b ON a.item_id = b.item_id WHERE a.user_id = '$id'";
$str7 = '';
$result = $link -> query($categories);
while($row = mysqli_fetch_array($result)) {
    //print_r($row);
    //echo $row;
    $str7 .= $row['category'];
    $str7 .= ',';
}
$str7 = process_str($str7);
//print_r($str7);


$str8 = '';

foreach ($str7 as $value){

    $category_id = "SELECT item_id FROM item WHERE (category='$value') AND (status = '0')";
    $result = $link -> query($category_id);
    //print_r($result);

    while($row = mysqli_fetch_array($result)) {
        //echo $row['item_id'];
        $str8 .= $row['item_id'];
        $str8 .= ',';
    }
    //echo $str8;

}
$id_list4 = process_str($str8);
//print_r($id_list4);


// 5. Get ids of items with similar details with items the user bid before
$details = "SELECT b.description FROM historical_auction_price AS a LEFT JOIN item AS b ON a.item_id = b.item_id WHERE a.user_id = '$id'";
$str9 = '';
$result = $link -> query($details);
while($row = mysqli_fetch_array($result)) {
    //echo $row['description'];
    $str9 .= $row['description'];
    $str9 .= ',';
}
$str9 = process_str($str9);
//print_r($str9);

$str10 = '';

foreach ($str9 as $value){

    $detail_id = "SELECT item_id FROM item WHERE (description LIKE '%$value%') AND (status = '0')";
    $result = $link -> query($detail_id);
    //print_r($result);

    while($row = mysqli_fetch_array($result)) {
        //echo $row['item_id'];
        $str10 .= $row['item_id'];
        $str10 .= ',';
    }
    //echo $str10;

}
$id_list5 = process_str($str10);
//print_r($id_list5);


// 6. Get ids of items with similar details with items the user is watching
$details = "SELECT b.description FROM watch_list AS a LEFT JOIN item AS b ON a.item_id = b.item_id WHERE a.user_id = '$id'";
$str11 = '';
$result = $link -> query($details);
while($row = mysqli_fetch_array($result)) {
    //echo $row['description'];
    $str11 .= $row['description'];
    $str11 .= ',';
}
$str11 = process_str($str11);
//print_r($str11);

$str12 = '';

foreach ($str11 as $value){

    $detail_id = "SELECT item_id FROM item WHERE (description LIKE '%$value%') AND (status = '0')";
    $result = $link -> query($detail_id);
    //print_r($result);

    while($row = mysqli_fetch_array($result)) {
        //echo $row['item_id'];
        $str12 .= $row['item_id'];
        $str12 .= ',';
    }
    //echo $str12;

}
$id_list6 = process_str($str12);
print_r($id_list6);



/*
//print_r($all_title_id);

if ($result->num_rows > 0)
{
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
}

else {
    echo "0 results";
}


*/
?>