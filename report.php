<?php
include_once('connection.php');


if(isset($_POST['valueToSearch']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `bookings` WHERE CONCAT(`userid`, `dob`, `item`, `quantity`, `rrprice`, `cost`, `comments`, `status`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
}
 else {
    $query = "SELECT * FROM `bookings`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
   $servername='localhost';
   $username='root';
   $password='';
   $dbname='vehicles';

$conn=mysqli_connect ($servername, $username, $password, $dbname);
if (!$conn) {
    echo 'connection error' .mysqli_connect_error();
 }
    $filter_Result = mysqli_query($conn, $query);
    return $filter_Result;
}

?>


<?php 
include('functions.php');

if (!isAdmin()) {
  $_SESSION['msg'] = "You must log in first";
  header('location:login.php');
}

if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['user']);
  header("location:login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
  <link rel="stylesheet" type="text/css" href="../style.css">
  <style>
  .header {
    background: #003366;
  }
  button[name=register_btn] {
    background: #003366;
  }
  </style>
</head>
<body bgcolor="silver">
  <div class="header">
    <h2 align="center">Admin - Home Page

    <div id="branding"> 
          <h1 align="center"><span class="highlight">MACHAKOS VEHICLE HIRING SYSTEM</span></h1>
    </div>
    <nav class="navig">
      
         <a href="admin.php" class="current">home</a>|
    <a href="create_user.php">add user</a>|
         <a href="bookings.php">bookings</a>|
        
    <a href="users.php">users</a>|
        <a href="feedback.php">feedback</a>|
         <a href="report.php">report</a>
         <a href="logout.php">logout</a>
    
    </nav>
    
  </div></h2>
  </div>
<fieldset>
<table style="background-color:silver;" cellpadding="2px" border="1px" width="10%" align="center" height="200%" text decoration="none">
<tr> 
  <td><b>Total System users:</b></td> 
<td><b>Total Bookings:</b></td> 
<td><b>Total Pending Bookings:</b></td> 
<td><b>Total Approved Bookings:</b></td> 
<td><b>Total Failed Bookings:</b></td> 
<td width=100><b>Total value of bookings To Date:</b></td> 
<td width=100><b>Average:</b></td> 
<td ><b>Maximum value </b></td> 
<td width=100><b>Minimum Value</b></td> 

</tr>
<tr> 
  <td width=100><b>
  <?php

$sql="SELECT username,user_type FROM login ORDER BY username";

if ($result=mysqli_query($conn,$sql))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  printf(" %d \n",$rowcount);
  // Free result set
  mysqli_free_result($result);
  }   
  $query = "SELECT AVG(cost) FROM login";

?> 
</td>

<td width=150><b>
  <?php

$sql="SELECT user_id,cost FROM bookings ORDER BY user_id";

if ($result=mysqli_query($conn,$sql))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  printf(" %d\n",$rowcount);
  // Free result set
  mysqli_free_result($result);
  }   
  $query = "SELECT AVG(cost) FROM bookings";

?> 
</b></td>
<td width=150><b>
<?php

$sql="SELECT user_id,cost FROM bookings where status= 'pending' ORDER BY user_id";

if ($result=mysqli_query($conn,$sql))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  printf("  %d \n",$rowcount);
  // Free result set
  mysqli_free_result($result);
  }   
  $query = "SELECT AVG(cost) FROM bookings";


?> 
</td>
<td width=150><b>
<?php

$sql="SELECT user_id,cost FROM bookings where status= 'approved' ORDER BY user_id";

if ($result=mysqli_query($conn,$sql))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  printf("  %d \n",$rowcount);
  // Free result set
  mysqli_free_result($result);
  }   
  $query = "SELECT AVG(cost) FROM bookings";


?> 
</td>
<td width=150><b>
<?php

$sql="SELECT user_id,cost FROM bookings where status= 'failed' ORDER BY user_id";

if ($result=mysqli_query($conn,$sql))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  printf(" %d \n",$rowcount);
  // Free result set
  mysqli_free_result($result);
  }   
  $query = "SELECT AVG(cost) FROM bookings";


?> 
</td>
  <td width=100><b><?php
$query = "Use vehicles;";
$conn->query($query);


$query = "SELECT SUM(cost) ".
"FROM bookings ";
$output = $conn->query($query);

if ($output->num_rows > 0) {
    // output data of each row
    while($row = $output->fetch_assoc()) {
        echo " \r\n" . $row["SUM(cost)"]."
";
    }
} else {
    echo "0 results";
}



?></b></td> 
<td width=100><b><?php
$query = "Use vehicles;";
$conn->query($query);

// Using Average Function


$query = "SELECT AVG(cost) ".
"FROM bookings ";
$output = $conn->query($query);

if ($output->num_rows > 0) {
    // output data of each row
    while($row = $output->fetch_assoc()) {
      
        echo "" . $row["AVG(cost)"]."
";
    }
} else {
    echo "0 results";
}
?></b></td> 
<td ><b><?php
$query = "Use vehicles;";
$conn->query($query);

$query = "SELECT MAX(cost) ".
"FROM bookings ";
$output = $conn->query($query);

if ($output->num_rows > 0) {
    // output data of each row
    while($row = $output->fetch_assoc()) {
        echo " " . $row["MAX(cost)"]."
";
    }
} else {
    echo "0 results";
}

?></b></td> 
<td width=100><b><?php
$query = "Use vehicles;";
$conn->query($query);

$query = "SELECT MIN(cost) ".
"FROM bookings ";
$output = $conn->query($query);

if ($output->num_rows > 0) {
    // output data of each row
    while($row = $output->fetch_assoc()) {
        echo "" . $row["MIN(cost)"]."
";
    }
} else {
    echo "0 results";
}



?></b></td> 

</tr>
</table>

</fieldset>

  <fieldset>

  
  
        
        <form action="bookings.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
            <input type="submit" name="search" value="Filter"><br><br>
            
            <table class='table table-striped' border="1" width="100%">
               <tr>
               
        <th>User Id</th>
        <th>vehicle_name</th>
        <th>vehicle_number</th>
        <th>vehicle_type</th>
        <th>pickup_date</th>
        <th>return_date</th>
      <th>PRICE</th>
      <th>pricepv</th>
      <th>quantity</th>
      <th>payment mode</th>
      <th>cost</th>
      <th>STATUS</th>
                </tr>

      <!-- populate table from mysql database -->
                 <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
            
                    <td><?php echo $row['user_id'];?></td>
                    <td><?php echo $row['vehicle_name'];?></td>
                    <td><?php echo $row['vehicle_number'];?></td>
                    <td><?php echo $row['vehicle_type'];?></td>
                    <td><?php echo $row['pickup_date'];?></td>
                    <td><?php echo $row['return_date'];?></td>
          <td><?php echo $row['price'];?></td>
          <td><?php echo $row['pricepv'];?></td>
          <td><?php echo $row['quantity'];?></td>
          <td><?php echo $row['payment_mode'];?></td>
          <td><?php echo $row['cost'];?></td>
          <td><?php echo $row['status'];?></td>
    
                </tr>
                <?php endwhile;?>
            </table>
    
        </form>
                    <h2><input type="submit" onclick="window.print()" value="Print Here" /></h2>
                </div>
    

</fieldset>

</section>
<footer>
  <p>quicksales @copy:2018</p>
  <p>powerd by themutisya</p>
</footer>

</body>
</html>