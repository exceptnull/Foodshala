<?php
  require('../../../config/config.php');
  if(isset($_SESSION['rest_id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM food where id='$id'";
    if(mysqli_query($conn, $query)) {
      header('Location: '.'http://localhost/sandbox/Foodshala/restaurant/dashboard/inventory.php'.'');
		} else {
			echo 'ERROR: '. mysqli_error($conn);
    }
  }
?>