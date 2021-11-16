<?php
//Connect ZYB_Test

$conn = mysqli_connect("localhost", "root", "root");
if($conn){
    echo "Successful";
}
else{
    echo "Failed";
}

//Creat New ZYB_Test

$sql="CREATE DATABASE database_project";

if (mysqli_query($conn,$sql)){
    echo "Creating ZYB_Test Successful";
}else{
    echo "Creating ZYB_Test Failed".mysqli_error($conn)."";
}

?>