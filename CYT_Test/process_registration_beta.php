<?php
$result = mysqli_query($link, $titles);
while($row = mysqli_fetch_array($result)) {
    echo $row['title']; // Print a single column data
    //echo print_r($row);       // Print the entire row data
}
?>
