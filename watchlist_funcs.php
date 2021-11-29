 <?php
 session_start();
 require_once "config.php";
if (!isset($_POST['functionname']) || !isset($_POST['arguments'])) {
  return;
}

// Extract arguments from the POST variables:
//$item_id = $_POST['arguments'];
//$user_id = $_POST['arguments1'];

 $itemID = $_SESSION['item_id'];
 $item_id = intval($itemID);
 $userID = $_SESSION['userID'];
 $user_id = intval($userID);


if ($_POST['functionname'] == "add_to_watchlist") {
  // TODO: Update database and return success/failure.

    $add = "INSERT INTO watch_list (item_id,user_id)
                                        VALUES ('$item_id','$user_id')";

    if (mysqli_query($link, $add)) {
        $res = "success";
    } else {
        echo "Error: " . $add . "<br>" . mysqli_error($link);
    }
}
else if ($_POST['functionname'] == "remove_from_watchlist") {
  // TODO: Update database and return success/failure.

    $remove = "DELETE FROM watch_list WHERE item_id='$item_id'and user_id='$user_id' ";

    if (mysqli_query($link, $remove)) {
        $res = "success";
    } else {
        echo "Error: " . $remove . "<br>" . mysqli_error($link);
    }
}

// Note: Echoing from this PHP function will return the value as a string.
// If multiple echo's in this file exist, they will concatenate together,
// so be careful. You can also return JSON objects (in string form) using
// echo json_encode($res).
echo $res;

?>