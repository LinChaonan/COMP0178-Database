<?php include_once("header.php")?>
<?php require("utilities.php")?>

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

            $id = $_SESSION['userID'];

            $sql_total = "SELECT * FROM watch_list ";
            $rs_result = $conn->query($sql_total);
            $num_results = mysqli_num_rows($rs_result);  // 统计总共的记录条数
            $results_per_page = 4;
            $max_page = ceil($num_results / $results_per_page);


            $page = $_GET["page"] ?? 1;;
            $start_from = ($page-1) * $results_per_page;

            $sql = "SELECT item_id, title, description, current_price, num_bids, end_date  FROM  item 
                                                            WHERE seller_id = '$id'
                                                            LIMIT $start_from,$results_per_page";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $list_id = $row["item_id"];
                    $title = $row["title"];
                    $description = $row["description"];
                    $current_price = $row["current_price"];
                    $num_bids = $row["num_bids"];
                    $end_date = $row["end_date"];
                    $item_id = $row["item_id"];
                    print_listing_li($item_id, $title, $description, $current_price, $num_bids, $end_date);
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
      <a class="page-link" href="mylistings.php?' . $querystring . 'page=' . ($curr_page - 1) . '" aria-label="Previous">
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
      <a class="page-link" href="mylistings.php?' . $querystring . 'page=' . $i . '">' . $i . '</a>
    </li>');
                }

                if ($curr_page != $max_page) {
                    echo('
    <li class="page-item">
      <a class="page-link" href="mylistings.php?' . $querystring . 'page=' . ($curr_page + 1) . '" aria-label="Next">
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