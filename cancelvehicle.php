93% of storage used … 
If you run out, you can't create, edit, and upload files. Get 100 GB of storage for Ksh 250.00 Ksh 60.00 for 1 month.

<html>
   
   <head>
      <title>Delete a Record from MySQL Database</title>
   </head>
   
   <body bgcolor="silver">

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
        <a href="contact.php">feedback</a>|
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
<?php
include_once('connection.php');
	if(isset($_POST['valueToSearch']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `bookings` WHERE bookings(`id`,`user_id`, `vehicle_name`, `vehicle_number`, `pickup_date`, `return_date`, `price`, `comments`, `status`) LIKE '%".$valueToSearch."%'";
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
			<th>Action</th>
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
					<td><a href="cancelbooking.php">cancel</a></td>
		
                </tr>
                <?php endwhile;?>
            </table>


            
    
        </form>

   	
      <?php
         if(isset($_POST['delete'])) {
            $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = '';
            $conn = mysql_connect($dbhost, $dbuser, $dbpass);
            
            if(! $conn ) {
               die('Could not connect: ' . mysql_error());
            }
				
            $user_id = $_POST['user_id'];
            
            $sql = "DELETE FROM bookings WHERE user_id = $user_id" ;
            mysql_select_db('vehicles');
            $retval = mysql_query( $sql, $conn );
            
            if(! $retval ) {
               die('Could not delete data: ' . mysql_error());
            }
            
            echo "Deleted data successfully\n";
            
            mysql_close($conn);
         }else {
            ?>
               <form method = "post" action = "<?php $_PHP_SELF ?>">
                  <table width = "400" border = "0" cellspacing = "1" 
                     cellpadding = "2">
                     
                     <tr>
                        <td width = "100">USER ID</td>
                        <td><input name = "user_id" type = "text" 
                           id = "user_id" placeholder="Id here"></td>
                     </tr>
                     
                     <tr>
                        <td width = "100"> </td>
                        <td> </td>
                     </tr>
                     
                     <tr>
                        <td width = "100"> </td>
                        <td>
                           <input name = "delete" type = "submit" 
                              id = "delete" value = "Delete">
                        </td>
                     </tr>
                     
                  </table>
               </form>
            <?php
         }
      ?>
      
   </body>
</html>