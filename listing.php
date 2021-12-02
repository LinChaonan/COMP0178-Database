<?php include_once("header.php")?>
<?php require("utilities.php")?>
<?php
   require_once "config.php";

   $item_id = $_GET['item_id'];
   $_SESSION['item_id']= $item_id;

   $sql = "SELECT * FROM item WHERE (item_id='$item_id')";
   //执行上面的sql语句并将结果集赋给result。
   $result = $link->query($sql);
   $row = $result->fetch_assoc();
  // Get info from the URL:
  // TODO: Use item_id to make a query to the database.
  // DELETEME: For now, using placeholder data.
  $title = $row["title"];
  $description = $row["description"];
  $current_price = $row["current_price"];
  $num_bids = $row["num_bids"];

  $_SESSION['currentPrice'] = $current_price;

  $user_id = $_SESSION['userID'];

  try {
    $end_time = new DateTime($row["end_date"]);
  } catch (Exception $e) {
  }

  // TODO: Note: Auctions that have ended may pull a different set of data,
  //       like whether the auction ended in a sale or was cancelled due
  //       to lack of high-enough bids. Or maybe not.
  
  // Calculate time to auction end:
  $now = new DateTime();
  
  if ($now < $end_time) {
    $time_to_end = date_diff($now, $end_time);
    $time_remaining = ' (in ' . display_time_remaining($time_to_end) . ')';
  }
  
  // TODO: If the user has a session, use it to make a query to the database
  //       to determine if the user is already watching this item.
  //       For now, this is hardcoded.

    $watch = "SELECT * FROM watch_list WHERE user_id='$user_id' and item_id='$item_id'";

    $result = mysqli_query($link, $watch);

    if ($result->num_rows > 0) {
                        $watching = true;
    }
    else {
                        $watching = false;
    }

    $his = "SELECT * FROM historical_auction_price WHERE (item_id='$item_id')";
    $his_result = $link->query($his);

  $has_session = true;

?>


<div class="container">

<div class="row"> <!-- Row #1 with auction title + watch button -->
  <div class="col-sm-8"> <!-- Left col -->
    <h2 class="my-3"><?php echo($title); ?></h2>
  </div>
  <div class="col-sm-4 align-self-center"> <!-- Right col -->
<?php
  /* The following watchlist functionality uses JavaScript, but could
     just as easily use PHP as in other places in the code */
  if ($now < $end_time):
?>
    <div id="watch_nowatch" <?php if ($has_session && $watching) echo('style="display: none"');?> >
      <button type="button" class="btn btn-outline-secondary btn-sm" onclick="addToWatchlist()">+ Add to watchlist</button>
    </div>
    <div id="watch_watching" <?php if (!$has_session || !$watching) echo('style="display: none"');?> >
      <button type="button" class="btn btn-success btn-sm" disabled>Watching</button>
      <button type="button" class="btn btn-danger btn-sm" onclick="removeFromWatchlist()">Remove watch</button>
    </div>
<?php endif /* Print nothing otherwise */ ?>
  </div>
</div>

<div class="row"> <!-- Row #2 with auction description + bidding info -->
  <div class="col-sm-8"> <!-- Left col with item info -->

    <div class="itemDescription">
    <?php echo($description); ?>
    </div>

  </div>

  <div class="col-sm-4"> <!-- Right col with bidding info -->

    <p>
<?php if ($now > $end_time): ?>
     This auction ended <?php echo(date_format($end_time, 'j M H:i')) ?>
     <!-- TODO: Print the result of the auction here? -->
<?php else: ?>
     Auction ends <?php echo(date_format($end_time, 'j M H:i') . $time_remaining) ?></p>  
    <p class="lead">Current bid: £<?php echo(number_format($current_price, 2)) ?></p>

    <!-- Bidding form -->
    <form method="POST" action="place_bid.php">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">£</span>
        </div>
	    <input name="bid" type="number" class="form-control" id="bid">
      </div>
      <button type="submit" class="btn btn-primary form-control">Place bid</button>
    </form>
<?php endif ?>

  
  </div> <!-- End of right col with bidding info -->

</div> <!-- End of row #2 -->

    <br>

<div class="row"> <!-- Row #3 with pic + historical price -->
        <div class="col-sm-8"> <!-- Left col with pic -->

            <div class="picture">
                <?php
                //$id = isset($_GET['id'])?intval($_GET['id']):1;
                //$id = $_GET['id'];
                $id = $item_id;    //id正常应该是通过用户填入的id获取（客户端发送过来的查询数据id）
                $dbms = 'mysql'; //数据库类型
                $host = 'localhost';  //数据库主机名
                $dbName = 'auction_system';  // 使用的数据库
                $user = 'root';  //数据库连接用户名
                $pass = 'root'; //对应的密码
                $size = ' width="700" height="700"';

                $dsn = "mysql:host = $host;dbname=$dbName";
                $pdo = new PDO($dsn,$user,$pass);
                $query = "select name,path from image where id=$id";

                //数据查询
                $result = $pdo->query($query);
                if($result){
                    $result = $result->fetchAll(2);
                    if(empty($result[0]['path'])) $result[0]['path'] = 0;
                    echo "<img src=".$result[0]['path'].$size.">";
                    // $path="./uploads/";//定义一个上传后的目录
                    // echo "<img src=$path".$result[0]['name'].">";
                }
                else{
                    echo "Handle errors";
                }?>
            </div>

        </div>

        <div class="col-sm-4"> <!-- Right col with historical price -->

            <div class="historicalPrice">
                <?php if ($his_result->num_rows > 0) {
                    // output data of each row
                    while($his_row = $his_result->fetch_assoc()) {
                        echo "Price: " . $his_row["bid_price"]. " - Time: " . $his_row["bid_time"]. "<br>";
                    }
                } else {
                    echo "No historical price";
                } ?>
            </div>

        </div> <!-- End of right col with historical price -->

    </div> <!-- End of row #3 -->




<?php include_once("footer.php")?>


<script> 
// JavaScript functions: addToWatchlist and removeFromWatchlist.

function addToWatchlist(button) {
  console.log("These print statements are helpful for debugging btw");

  // This performs an asynchronous call to a PHP function using POST method.
  // Sends item ID as an argument to that function.
  $.ajax('watchlist_funcs.php', {
    type: "POST",
    data: {functionname: 'add_to_watchlist', arguments: [<?php echo($item_id);?>]},

    success: 
      function (obj, textstatus) {
        // Callback function for when call is successful and returns obj
        console.log("Success");
        var objT = obj.trim();
 
        if (objT == "success") {
          $("#watch_nowatch").hide();
          $("#watch_watching").show();
        }
        else {
          var mydiv = document.getElementById("watch_nowatch");
          mydiv.appendChild(document.createElement("br"));
          mydiv.appendChild(document.createTextNode("Add to watch failed. Try again later."));
        }
      },

    error:
      function (obj, textstatus) {
        console.log("Error");
      }
  }); // End of AJAX call

} // End of addToWatchlist func

function removeFromWatchlist(button) {
  // This performs an asynchronous call to a PHP function using POST method.
  // Sends item ID as an argument to that function.
  $.ajax('watchlist_funcs.php', {
    type: "POST",
    data: {functionname: 'remove_from_watchlist', arguments: [<?php echo($item_id);?>]},

    success: 
      function (obj, textstatus) {
        // Callback function for when call is successful and returns obj
        console.log("Success");
        var objT = obj.trim();
 
        if (objT == "success") {
          $("#watch_watching").hide();
          $("#watch_nowatch").show();
        }
        else {
          var mydiv = document.getElementById("watch_watching");
          mydiv.appendChild(document.createElement("br"));
          mydiv.appendChild(document.createTextNode("Watch removal failed. Try again later."));
        }
      },

    error:
      function (obj, textstatus) {
        console.log("Error");
      }
  }); // End of AJAX call

} // End of addToWatchlist func
</script>

    <?php $link->close();?>