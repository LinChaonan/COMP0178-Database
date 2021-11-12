<?php
//Connect Database

$conn = mysqli_connect("localhost", "root", "root");
if($conn){
    echo "Successful";
}
else{
    echo "Failed";
}

//Creat New Database

$sql="CREATE DATABASE test";

if (mysqli_query($conn,$sql)){
    echo "Creating Database Successful";
}else{
    echo "Creating Database Failed".mysqli_error($conn)."";
}

?>