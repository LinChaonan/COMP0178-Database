<?php

include_once("header.php");
require_once "config.php";

?>

<div class="container my-5">

<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

        $title = $_POST["auctionTitle"];
        $details = $_POST["auctionDetails"];
        $category =
        $SPrice = $_POST["auctionStartPrice"];
        $RPrice = $_POST["auctionReservePrice"];
        $Date = $_POST["auctionEndDate"];
        echo $title, $details, $SPrice, $RPrice, $Date;

        if (!$link) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "INSERT INTO item (title,description, start_price, reserve_price, end_date)
VALUES ('$title','$details','$SPrice','$RPrice','$Date')";

        if (mysqli_query($link, $sql)) {
            echo "新记录插入成功";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($link);
        }

        mysqli_close($link);

}
// This function takes the form data and adds the new auction to the database.

/* TODO #1: Connect to MySQL database (perhaps by requiring a file that
            already does this). */


/* TODO #2: Extract form data into variables. Because the form was a 'post'
            form, its data can be accessed via $POST['auctionTitle'], 
            $POST['auctionDetails'], etc. Perform checking on the data to
            make sure it can be inserted into the database. If there is an
            issue, give some semi-helpful feedback to user. */


/* TODO #3: If everything looks good, make the appropriate call to insert
            data into the database. */



// If all is successful, let user know.
echo('<div class="text-center">Auction successfully created! <a href="FIXME">View your new listing.</a></div>');


?>

</div>


<?php include_once("footer.php")?>