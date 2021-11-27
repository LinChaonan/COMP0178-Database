<?php include_once("header.php")?>
<?php require("utilities.php")?>

<div class="container">

<h2 class="my-3">Browse listings</h2>

<div id="searchSpecs">
<!-- When this form is submitted, this PHP page is what processes it.
     Search/sort specs are passed to this page through parameters in the URL
     (GET method of passing data to a page). -->
<form method="get" action="browse.php">
  <div class="row">
    <div class="col-md-5 pr-0">
      <div class="form-group">
        <label for="keyword" class="sr-only">Search keyword:</label>
	    <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text bg-transparent pr-0 text-muted">
              <i class="fa fa-search"></i>
            </span>
          </div>
          <input type="text" class="form-control border-left-0" name="keyword" id="keyword" placeholder="Search for anything">
        </div>
      </div>
    </div>
    <div class="col-md-3 pr-0">
      <div class="form-group">
        <label for="cat" class="sr-only">Search within:</label>
        <select class="form-control" name="cat" id="cat">
          <option selected value="all">All categories</option>
          <option value="fill">Fill me in</option>
          <option value="with">with options</option>
          <option value="populated">populated from a database?</option>
        </select>
      </div>
    </div>
    <div class="col-md-3 pr-0">
      <div class="form-inline">
        <label class="mx-2" for="order_by">Sort by:</label>
        <select class="form-control" name="order_by" id="order_by">
          <option selected value="pricelow">Price (low to high)</option>
          <option value="pricehigh">Price (high to low)</option>
          <option value="date">Soonest expiry</option>
        </select>
      </div>
    </div>
    <div class="col-md-1 px-0">
      <button type="submit" class="btn btn-primary">Search</button>
    </div>
  </div>
</form>
</div> <!-- end search specs bar -->


</div>

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

$sql_total = "SELECT * FROM item";
$rs_result = $conn->query($sql_total);
$num_results = mysqli_num_rows($rs_result);  // 统计总共的记录条数
$results_per_page = 4;
$max_page = ceil($num_results / $results_per_page);


$page = $_GET["page"] ?? 1;;
$start_from = ($page-1) * $results_per_page;

  // Retrieve these from the URL
  if (!isset($_GET['keyword'])) {
      $keyword = '';
      $sql = "SELECT item_id, title, description, current_price, num_bids, end_date  FROM  item 
                                                            LIMIT $start_from,$results_per_page";
      $result = $conn->query($sql);
  }
  else {
      $keyword = $_GET['keyword'];
      echo $keyword;

  }

  if (!isset($_GET['cat'])) {
      $category = '';
      $sql = "SELECT item_id, title, description, current_price, num_bids, end_date  FROM  item 
                                                            LIMIT $start_from,$results_per_page";
      $result = $conn->query($sql);
  }
  else {
      $category = $_GET['cat'];
  }
  
  if (!isset($_GET['order_by'])) {
      $ordering = '';
      $sql = "SELECT item_id, title, description, current_price, num_bids, end_date  FROM  item 
                                                            LIMIT $start_from,$results_per_page";
      $result = $conn->query($sql);
  }
  else {
      $ordering = $_GET['order_by'];
      if ($ordering == "date")
      {

          $sql = "SELECT item_id, title, description, current_price, num_bids, end_date  FROM  item
                                                            WHERE status = '0' ORDER BY end_date DESC
                                                            LIMIT $start_from,$results_per_page" ;
          $result = $conn->query($sql);
          $num_results = mysqli_num_rows($result);
          $max_page = ceil($num_results / $results_per_page);
      }
      elseif ($ordering == "pricelow")
      {

          $sql = "SELECT item_id, title, description, current_price, num_bids, end_date  FROM  item
                                                            ORDER BY current_price
                                                            LIMIT $start_from,$results_per_page" ;
          $result = $conn->query($sql);
      }
      elseif ($ordering == "pricehigh")
      {

          $sql = "SELECT item_id, title, description, current_price, num_bids, end_date  FROM  item
                                                            ORDER BY current_price DESC
                                                            LIMIT $start_from,$results_per_page" ;
          $result = $conn->query($sql);
      }
  }
  
  if (!isset($_GET['page'])) {
    $curr_page = 1;
  }
  else {
    $curr_page = $_GET['page'];
  }

  /* TODO: Use above values to construct a query. Use this query to 
     retrieve data from the database. (If there is no form data entered,
     decide on appropriate default value/default query to make. */
  
  /* For the purposes of pagination, it would also be helpful to know the
     total number of results that satisfy the above query */

?>

<div class="container mt-5">

<!-- TODO: If result set is empty, print an informative message. Otherwise... -->

<ul class="list-group">

<!-- TODO: Use a while loop to print a list item for each auction listing
     retrieved from the query -->

<?php

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
      <a class="page-link" href="browse.php?' . $querystring . 'page=' . ($curr_page - 1) . '" aria-label="Previous">
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
      <a class="page-link" href="browse.php?' . $querystring . 'page=' . $i . '">' . $i . '</a>
    </li>');
  }
  
  if ($curr_page != $max_page) {
    echo('
    <li class="page-item">
      <a class="page-link" href="browse.php?' . $querystring . 'page=' . ($curr_page + 1) . '" aria-label="Next">
        <span aria-hidden="true"><i class="fa fa-arrow-right"></i></span>
        <span class="sr-only">Next</span>
      </a>
    </li>');
  }

$conn->close();

?>

  </ul>
</nav>


</div>


<?php include_once("footer.php")?>