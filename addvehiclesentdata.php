<?php

include "connection.php";



$id = $_POST['id'];
$vehicle_name = $_POST['vehicle_name'];
$vehicle_number = $_POST['vehicle_number'];
$vehicle_type = $_POST['vehicle_type'];
$vehicle_price=$_POST['vehicle_price'];
;



$sql= "INSERT INTO avehicles (id,vehicle_name, vehicle_number, vehicle_type, vehicle_price) 

VALUES ('$id','$vehicle_name', '$vehicle_number', '$vehicle_type','$vehicle_price')";
$result = $conn-> query($sql);
header("Location:addvehicle.php")
?>