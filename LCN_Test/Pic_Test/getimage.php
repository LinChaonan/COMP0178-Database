<?php
//$id = isset($_GET['id'])?intval($_GET['id']):1;
//$id = $_GET['id'];
$id = 1;    //id正常应该是通过用户填入的id获取（客户端发送过来的查询数据id）
$dbms = 'mysql'; //数据库类型
$host = 'localhost';  //数据库主机名
$dbName = 'auction_system';  // 使用的数据库
$user = 'root';  //数据库连接用户名
$pass = 'root'; //对应的密码

$dsn = "mysql:host = $host;dbname=$dbName";
$pdo = new PDO($dsn,$user,$pass);
$query = "select name,path from image where id=$id";

//数据查询
$result = $pdo->query($query);
if($result){
    $result = $result->fetchAll(2);
    echo "<img src=".$result[0]['path'].">";
    // $path="./uploads/";//定义一个上传后的目录
    // echo "<img src=$path".$result[0]['name'].">";
}
else{
    echo "Handle errors";
}
?>