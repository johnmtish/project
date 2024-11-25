<?php

include "connection.php";



$id = $_POST['id'];
$username = $_POST['username'];
$email = $_POST['email'];
$user_type = $_POST['user_type'];


$password=$_POST['password'];
;



$sql= "INSERT INTO login (id,username, email, user_type, password) 

VALUES ('$id','$username', '$email', '$user_type','$password')";
$result = $conn-> query($sql);
header("Location:admin.php")
?>