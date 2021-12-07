<?php

include_once("header.php");
require_once "config.php";
require_once "send_mail.php";

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

        $sql = "INSERT INTO item (title,description, start_price,current_price, reserve_price, end_date, seller_id,category,status)
                VALUES ('$title','$details','$SPrice','$SPrice','$RPrice','$Date','$seller_id','$category','0')";

        if (mysqli_query($link, $sql)) {
            echo "<script>alert('Auction created successfully')</script>";

            // Send mail to the seller.
            $emails = "SELECT email FROM user WHERE user_id = '$seller_id'";
            $email_result = $link->query($emails);
            while ($row = mysqli_fetch_array($email_result)) {
                $seller_email = $row['email'];
                $subject = "Auction Create Successful";
                $body = "Hi there, <br/> <br/> You successfully created an auction for ".$title.".<br/> <br/> Kind regards, <br/> Simple Click Marketing Team <br/>";
                send_email($seller_email, $subject, $body);
            }
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($link);
        }

        ///
        $dbms = 'mysql';
        $host = 'localhost';
        $dbName = 'auction_system';
        $user = 'root';
        $pass = 'root';
        $dsn ="mysql:host = $host;dbname=$dbName";
        $pdo = new PDO($dsn,$user,$pass);

    $upfile=$_FILES["pic"];
        //Define type list
        $typelist=array("image/jpeg","image/jpg","image/png","image/gif");
        $path="./images/";
        if($upfile["error"]>0){
            switch($upfile['error']){
                case 1:
                    $info="file size exceed php.ini - upload_max_filesize.";
                    die("Error:".$info);
                case 2:
                    $info="file size exceed html - MAX_FILE_SIZE.";
                    die("Error:".$info);
                case 3:
                    $info="Just part of the file have been uploaded.";
                    die("Error:".$info);
                case 4:
                    $newfile = 'No image';
                    $path = './images/0.jpg';
                    $query = "INSERT INTO image(name,path)VALUES('$newfile','$path')";
                    $result = $pdo -> query($query);
                    die();
                case 5:
                    $info="Cannot find temp directory.";
                    die("Error:".$info);
                case 6:
                    $info="writing file failed";
                    die("Error:".$info);
            }
        }
        //File size filter
        if($upfile['size']>10000000){
            die("file size exceed limitation");
        }
        //File type filter
        if(!in_array($upfile["type"],$typelist)){
            die("Illegal file type!".$upfile["type"]);
        }
        //Generate a new file name
        $fileinfo=pathinfo($upfile["name"]);
        do{
            $newfile=date("YmdHis").rand(1000,9999).".".$fileinfo["extension"];
        }while(file_exists($path.$newfile));
        //Check if this file existed
        if(is_uploaded_file($upfile["tmp_name"])){
            //Upload file (move file)
            if(move_uploaded_file($upfile["tmp_name"],$path.$newfile)){
                echo "File uploaded successfully!";
                //Store file name and path into database
                $data = addslashes(fread(fopen($pic,"r"),filesize($pic)));
                //Store pic name and path into database
                $query = "INSERT INTO image(name,path)VALUES('$newfile','$path$newfile')";
                $result = $pdo -> query($query);

                if($result){
                    echo"Pic have been stored into database";
                }
                else{
                    echo"Request failed, please try again";
                }
            }else{
                die("Update file failed!");
            }
        }else{
            die("Not a file!");
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