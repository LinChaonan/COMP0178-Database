<?php

$test = mysqli_connect("localhost", "root", "root");
if ($test === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sql = "CREATE TABLE us (
                                       customerType varchar(30) NOT NULL,
                                       email varchar(60) NOT NULL,
                                       userID int(50) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                                       passWord varchar(100) NOT NULL
)";
if (mysqli_query($test, $sql)) {
    echo "Create Table successfully ";
} else {
    echo "ERROR: Can not execute $sql. " . mysqli_error($test);
}

// Close connection
mysqli_close($test);
