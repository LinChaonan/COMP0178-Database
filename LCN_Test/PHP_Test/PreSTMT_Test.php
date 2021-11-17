<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "test";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);

// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

// 预处理及绑定
$stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
$stmt->bind_param("ss", $username, $password);

// 设置参数并执行
$username = "John";
$password = "Doe";
$stmt->execute();

echo "新记录插入成功1";

$username = "Mary";
$password = "Moe";
$stmt->execute();

echo "新记录插入成功2";

$username = "Julie";
$password = "Dooley";
$stmt->execute();

echo "新记录插入成功3";

$stmt->close();
$conn->close();
?>