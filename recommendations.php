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
//print_r($id_list1);


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
//print_r($id_list2);

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
//print_r($id_list6);

// all item_id to recommend
$id_list = array_merge($id_list1, $id_list2, $id_list3, $id_list4, $id_list5, $id_list6);
$id_list = array_unique($id_list);
$id_list = array_filter($id_list);
//print_r($id_list);

$str13 = '';
$historical_id = "SELECT item_id FROM historical_auction_price WHERE (user_id = '$id')";
$result = $link -> query($historical_id);
//print_r($result);

while($row = mysqli_fetch_array($result)) {
    //echo $row['item_id'];
    $str13 .= $row['item_id'];
    $str13 .= ',';
}
//echo $str13;
$id_counter_list1 = process_str($str13);
//print_r($id_counter_list1);

$str14 = '';
$watched_id = "SELECT item_id FROM watch_list WHERE (user_id = '$id')";
$result = $link -> query($watched_id);
//print_r($result);

while($row = mysqli_fetch_array($result)) {
    //echo $row['item_id'];
    $str14 .= $row['item_id'];
    $str14 .= ',';
}
//echo $str14;
$id_counter_list2 = process_str($str14);
//print_r($id_counter_list2);


$id_list_counter = array_merge($id_counter_list1, $id_counter_list2);
$id_list_counter = array_unique($id_list_counter);
//print_r($id_list_counter);

$final_list = array_diff($id_list, $id_list_counter);
//print_r($final_list);
$list_str = implode(",", $final_list);
//print_r($list_str);


// 7. Calculate the average bid price placed by the user
$historical_bids = "SELECT user_id,MAX(bid_price) AS bid_price FROM historical_auction_price WHERE (user_id = '$id') GROUP BY item_id";
$result = $link -> query($historical_bids);

$str15 = '';
while($row = mysqli_fetch_array($result)) {
//echo $row['item_id'];
    $str15 .= $row['bid_price'];
    //echo $str15;
    $str15 .= ',';

}
$str15 = process_str($str15);
//print_r($str15);
$str15 = array_filter($str15);
$average = array_sum($str15)/count($str15);

$low_bound = ceil($average * 0.5);
$upper_bound = ceil($average * 1.5);
//echo $average, '-', $low_bound, '-', $upper_bound;

// 8. Show the recommendation result within the 50% - 150% interval of the average bid price first
$fulfilled = "SELECT item_id FROM item 
              WHERE (item_id in ({$list_str})) AND ($low_bound < current_price) AND (current_price < $upper_bound) ";
$result = $link -> query($fulfilled);

$str16 = '';
while($row = mysqli_fetch_array($result)) {
//echo $row['item_id'];
    $str16 .= $row['item_id'];
    //echo $str16;
    $str16 .= ',';

}
$str16 = process_str($str16);


$partially_fulfilled = "SELECT item_id FROM item 
                        WHERE (item_id in ({$list_str})) 
                        AND (($low_bound > current_price) OR (current_price > $upper_bound) OR ($low_bound = current_price) OR (current_price = $upper_bound)) ";
$result = $link -> query($partially_fulfilled);

$str17 = '';
while($row = mysqli_fetch_array($result)) {
//echo $row['item_id'];
    $str17 .= $row['item_id'];
    //echo $str17;
    $str17 .= ',';
}
$str17 = process_str($str17);
//print_r($str17);

$id_list_price = array_merge($str16, $str17);
$id_list_price = array_unique($id_list_price);
$id_list_price = array_slice($id_list_price, 0, 8);
//print_r($id_list_price);
$list_str2 = implode(",", $id_list_price);
//echo "------------";
//print_r($list_str2);


foreach ($id_list_price as $id)
{
    $final_sql = "SELECT item_id, title, description, current_price, num_bids, end_date FROM item WHERE item_id = '$id' ";
    $result = $link -> query($final_sql);
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
}
/*
$sql_total = "SELECT * FROM item WHERE item_id in ({$list_str2}) ";
$rs_result = $conn->query($sql_total);
$num_results = mysqli_num_rows($rs_result);  // 统计总共的记录条数
$results_per_page = 8;
$max_page = ceil($num_results / $results_per_page);


$page = $_GET["page"] ?? 1;;
$start_from = ($page-1) * $results_per_page;


$final_sql = "SELECT item_id, title, description, current_price, num_bids, end_date  
                FROM item WHERE item_id in ({$list_str2})
                LIMIT $start_from,$results_per_page";


$result = $link -> query($final_sql);
//echo gettype($result);


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

if (!isset($_GET['page'])) {
    $curr_page = 1;
}
else {
    $curr_page = $_GET['page'];
}
?>

</ul>

<!-- Pagination for results listings -->
<nav aria-label="Search results pages" class="mt-5">
  <ul class="pagination justify-content-center">

<?php

  // Copy any currently-set GET variables to the URL.
  $querystring = "";
  foreach ($_GET as $key => $value) {
    if ($key != "page") {
      $querystring .= "$key=$value&amp;";
    }
  }

  $high_page_boost = max(3 - $curr_page, 0);
  $low_page_boost = max(2 - ($max_page - $curr_page), 0);
  $low_page = max(1, $curr_page - 2 - $low_page_boost);
  $high_page = min($max_page, $curr_page + 2 + $high_page_boost);

  if ($curr_page != 1) {
    echo('
    <li class="page-item">
      <a class="page-link" href="recommendations.php?' . $querystring . 'page=' . ($curr_page - 1) . '" aria-label="Previous">
        <span aria-hidden="true"><i class="fa fa-arrow-left"></i></span>
        <span class="sr-only">Previous</span>
      </a>
    </li>');
  }

  for ($i = $low_page; $i <= $high_page; $i++) {
    if ($i == $curr_page) {
      // Highlight the link
      echo('
    <li class="page-item active">');
    }
    else {
      // Non-highlighted link
      echo('
    <li class="page-item">');
    }

    // Do this in any case
    echo('
      <a class="page-link" href="recommendations.php?' . $querystring . 'page=' . $i . '">' . $i . '</a>
    </li>');
  }

  if ($curr_page != $max_page) {
    echo('
    <li class="page-item">
      <a class="page-link" href="recommendations.php?' . $querystring . 'page=' . ($curr_page + 1) . '" aria-label="Next">
        <span aria-hidden="true"><i class="fa fa-arrow-right"></i></span>
        <span class="sr-only">Next</span>
      </a>
    </li>');
  }

$conn->close();
*/
?>

  </ul>
</nav>


</div>


<?php include_once("footer.php")?>


