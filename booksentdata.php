<?php

session_start();

include "connection.php";



$user_id = $_POST['user_id'];
$vehicle_name = $_POST['vehicle_name'];
$vehicle_number = $_POST['vehicle_number'];
$vehicle_type = $_POST['vehicle_type'];
$pickup_date = $_POST['pickup_date'];
$return_date = $_POST['return_date'];
$price=$_POST['price'];
$pricepv =$_POST['pricepv'];
$quantity = $_POST['quantity'];
$days = $_POST['days'];

$payment_mode =$_POST['payment_mode'];
$cost = $_POST['cost'];
$status = $_POST['status'];



$sql= "INSERT INTO bookings (user_id, vehicle_name, vehicle_number, vehicle_type, pickup_date, return_date, price, pricepv, quantity,days, payment_mode, cost, status) 

VALUES ('$user_id', '$vehicle_name', '$vehicle_number', '$vehicle_type', '$pickup_date', '$return_date', '$price', '$pricepv', '$quantity','$days', '$payment_mode', '$cost', '$status')";
$result = $conn-> query($sql);
header("Location:book.php")
?>