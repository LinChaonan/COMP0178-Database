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

//Creat New Table
mysqli_select_db($conn,"test");

$table="CREATE TABLE testTable(
student_id int(11) auto_increment primary key,
student_no char(10) not null unique,
student_name char(20) not null)";

if(mysqli_query($conn,$table)){

    echo "Creating Table Successful";

}

else{

    echo "Creating Table Failed".mysqli_error($conn)."";

}

?>