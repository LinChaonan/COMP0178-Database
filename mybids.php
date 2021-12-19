<?php
include_once("header.php");
require("utilities.php");
require_once "config.php";
?>

    <div class="container mt-5">

        <!-- TODO: If result set is empty, print an informative message. Otherwise... -->

        <ul class="list-group">

            <!-- TODO: Use a while loop to print a list item for each auction listing
                 retrieved from the query -->

            <?php
            if (!isset($_GET['page'])) {
                $curr_page = 1;
            }
            else {
                $curr_page = $_GET['page'];
            }

            // Check connection
            if ($link->connect_error) {
                die("Connection failed: " . $link->connect_error);
            }

            $id = $_SESSION['userID'];

            $sql_total = "SELECT * FROM item WHERE buyer_id = '$id'";
            $rs_result = $link->query($sql_total);
            [$max_page,$results_per_page,$start_from] = page_calculation($rs_result);

            $sql = "SELECT item_id, title, description, current_price, num_bids, end_date  FROM  item 
                                                            WHERE buyer_id = '$id'
                                                            LIMIT $start_from,$results_per_page";
            $result = $link->query($sql);

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
                die();
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
      <a class="page-link" href="mybids.php?' . $querystring . 'page=' . ($curr_page - 1) . '" aria-label="Previous">
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
      <a class="page-link" href="mybids.php?' . $querystring . 'page=' . $i . '">' . $i . '</a>
    </li>');
                }

                if ($curr_page != $max_page) {
                    echo('
    <li class="page-item">
      <a class="page-link" href="mybids.php?' . $querystring . 'page=' . ($curr_page + 1) . '" aria-label="Next">
        <span aria-hidden="true"><i class="fa fa-arrow-right"></i></span>
        <span class="sr-only">Next</span>
      </a>
    </li>');
                }

                $link->close();

                ?>

            </ul>
        </nav>


    </div>


<?php include_once("footer.php")?>