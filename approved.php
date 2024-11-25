<?php 
include 'connection.php'; 
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
        <a href="adminfeedback.php">feedback</a>|
         <a href="report.php">report</a>
         <a href="logout.php">logout</a>
    
    </nav>
    
  </div></h2>
  </div>
  <div class="content">
    <!-- notification message -->
    <?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
        <h3>
          <?php 
            echo $_SESSION['success']; 
            unset($_SESSION['success']);
          ?>
        </h3>
      </div>
    <?php endif ?>

    <!-- logged in user information -->
    <div class="profile_info">
      <img src="../images/admin_profile.png"  >

      <div>
        <?php  if (isset($_SESSION['user'])) : ?>
          <strong><?php echo $_SESSION['user']['username']; ?></strong>

          <small>
            <i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
            <br>
            <a href="home.php?logout='1'" style="color: red;">logout</a>
                       &nbsp; <a href="create_user.php"> + add user</a>
          </small>

        <?php endif ?>
      </div>
    </div>
  </div>
<h4 align="center"><a href="pending.php">pending bookings</a>|&nbsp;<a href="approved.php">approved bookings</a> <a href="failed.php">failed bookings</a></h4>
  <fieldset>
<table style="background-color:gold;" align="center" width="100%" height="100%">
<tr>
<td>
<br/>
<center>
<table style="background-color:grey;" width="1100" border="1" cellpadding="1" cellspacing="1" align="center">
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

<?php
 
 $resultset= $conn -> query("SELECT * FROM bookings WHERE STATUS ='approved' ");

 if ($resultset -> num_rows !=0){

  while ($rows=$resultset -> fetch_assoc()){
echo "<form method =POST action =approved.php>";
  
   echo   "<tr>";


    echo "<td>"."<input type =text readonly name=user_id value=".$rows['user_id']." </td>";

  

   echo "<td>".$rows['vehicle_name']."</td>";

   echo "<td>".$rows['vehicle_number']."</td>";

   echo "<td>".$rows['vehicle_type']."</td>";

   echo "<td>".$rows['pickup_date']."</td>";

   echo "<td>".$rows['return_date']."</td>";

   echo "<td>".$rows['price']."</td>";
   

   echo "<td>".$rows['pricepv']."</td>";
   echo "<td>".$rows['quantity']."</td>";
   echo "<td>".$rows['payment_mode']."</td>";
   echo "<td>".$rows['cost']."</td>";
   echo "<td>".$rows['status']."</td>";

   echo "</tr>";
  echo "</form>";
    }

 } 
      else {

  echo "No pending approved found.";
 }

?>
</table></center>


<a href="admin.php"> back home </a>
</td>
</tr>
</table>


</fieldset>
  </fieldset>

</section>
  <footer position="center">
  <p>mvhc @copy:2018</p>
  <p>powerd by johnmtish</p>
</footer>
</body>
</html>