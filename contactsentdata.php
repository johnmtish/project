<?php

session_start();

include "connection.php";




$username = $_POST['username'];

$email = $_POST['email'];


$comment=$_POST['comment'];
;



$sql= "INSERT INTO feedbacks (username, email, comment) 

VALUES ('$username','$email','$comment')";
$result = $conn-> query($sql);
header("Location:thanks.php")
?>