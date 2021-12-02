<?php

include_once("header.php");
require_once "config.php";

?>

<div class="container my-5">

<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

        $title = $_POST["auctionTitle"];
        $details = $_POST["auctionDetails"];
        $category = $_POST["category"];
        $SPrice = $_POST["auctionStartPrice"];
        $RPrice = $_POST["auctionReservePrice"];
        $Date = $_POST["auctionEndDate"];
        $seller_id = $_SESSION['userID'];

        try {
            $end_time = new DateTime($Date);
        } catch (Exception $e) {
        }
        $now = new DateTime();

        if (empty($title) || empty($category) || empty($SPrice) || empty($Date))
        {
            exit('Please complete the create auction form!');
        }

        if ($SPrice < 1){
            exit('The minimum starting price is 1');
        }

        if (!empty($RPrice) && ($RPrice < $SPrice)) {
            exit('The reserve price cannot be lower than the starting price');
        }

        if ($end_time < $now) {
            exit('The end date must be in the future');
        }


        if (!$link) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "INSERT INTO item (title,description, start_price, reserve_price, 
                                    end_date, seller_id,category,status)
                VALUES ('$title','$details','$SPrice','$RPrice','$Date','$seller_id','$category','0')";

        if (mysqli_query($link, $sql)) {
            echo "New auction successfully added";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($link);
        }

        ///
        //1.获取上传文件信息
        $upfile=$_FILES["pic"];
        //定义允许的类型
        $typelist=array("image/jpeg","image/jpg","image/png","image/gif");
        $path="./images/";//定义一个上传后的目录
        //2.过滤上传文件的错误号
        if($upfile["error"]>0){
            switch($upfile['error']){//获取错误信息
                case 1:
                    $info="上传得文件超过了 php.ini中upload_max_filesize 选项中的最大值.";
                    break;
                case 2:
                    $info="上传文件大小超过了html中MAX_FILE_SIZE 选项中的最大值.";
                    break;
                case 3:
                    $info="文件只有部分被上传";
                    break;
                case 4:
                    $info="没有文件被上传.";
                    break;
                case 5:
                    $info="找不到临时文件夹.";
                    break;
                case 6:
                    $info="文件写入失败！";break;
            }die("上传文件错误,原因:".$info);
        }
        //3.本次上传文件大小的过滤（自己选择）
        if($upfile['size']>10000000){
            die("上传文件大小超出限制");
        }
        //4.类型过滤
        if(!in_array($upfile["type"],$typelist)){
            die("上传文件类型非法!".$upfile["type"]);
        }
        //5.上传后的文件名定义(随机获取一个文件名)
        $fileinfo=pathinfo($upfile["name"]);//解析上传文件名字
        do{
            $newfile=date("YmdHis").rand(1000,9999).".".$fileinfo["extension"];
        }while(file_exists($path.$newfile));
        //6.执行文件上传
        //判断是否是一个上传的文件
        if(is_uploaded_file($upfile["tmp_name"])){
            //执行文件上传(移动上传文件)
            if(move_uploaded_file($upfile["tmp_name"],$path.$newfile)){
                echo "文件上传成功!";

                //将文件名和路径存储到数据库
                $dbms = 'mysql'; //数据库类型
                $host = 'localhost';  //数据库主机名
                $dbName = 'auction_system';  // 使用的数据库
                $user = 'root';  //数据库连接用户名
                $pass = 'root'; //对应的密码
                $dsn ="mysql:host = $host;dbname=$dbName";
                $pdo = new PDO($dsn,$user,$pass);
//                $data = addslashes(fread(fopen($pic,"r"),filesize($pic)));
                //将图片的名称和路径存入数据库
                $query = "INSERT INTO image(name,path)VALUES('$newfile','$path$newfile')";
                $result = $pdo -> query($query);

                if($result){
                    echo"文件已存储到数据库";
                }
                else{
                    echo"请求失败，请重试";
                }
            }else{
                die("上传文件失败！");
            }
        }else{
            die("不是一个上传文件!");
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
echo('<div class="text-center">Auction successfully created! <a href ="mylistings.php">View your new listing.</a></div>');


?>

</div>


<?php include_once("footer.php")?>