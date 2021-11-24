<?php
$num_rec_per_page=2;   // 每页显示数量

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

$page = $_GET["page"] ?? 1;;
$start_from = ($page-1) * $num_rec_per_page;
$sql = "SELECT * FROM item LIMIT $start_from,$num_rec_per_page";

$rs_result = $conn->query($sql);

?>

    <table>
        <tr><td>title</td><td>price</td></tr>
        <?php
        while ($row = $rs_result->fetch_assoc()) {
            ?>
            <tr>
                <td><?php echo $row["title"]; ?></td>
                <td><?php echo $row["reserve_price"]; ?></td>
            </tr>
            <?php
        };
        ?>
    </table>

<?php
$sql = "SELECT * FROM item";
$rs_result = $conn->query($sql); //查询数据
$total_records = mysqli_num_rows($rs_result);  // 统计总共的记录条数
$total_pages = ceil($total_records / $num_rec_per_page);  // 计算总页数

echo "<a href='pagination.php?page=1'>".'|<'."</a> "; // 第一页


for ($i=1; $i<=$total_pages; $i++) {
    echo "<a href='pagination.php?page=".$i."'>".$i."</a> ";
};


echo "<a href='pagination.php?page=$total_pages'>".'>|'."</a> "; // 最后一页

$conn->close();
?>