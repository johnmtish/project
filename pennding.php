<?php
 include 'connection.php'; 
  include 'pending.php'; 


if (isset($_POST['approve'])) {
 

   $sql = "UPDATE bookings SET STATUS ='approved' WHERE user_id ='$_POST[user_id] '";
   mysqli_query($conn, $sql);
}

if (isset($_POST['failed'])) {
 

   $sql = "UPDATE bookings SET STATUS ='failed' WHERE user_id ='$_POST[user_id] '";
   mysqli_query($conn, $sql);
}

?>