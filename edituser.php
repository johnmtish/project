<?php
include_once('connection.php');


if(isset($_POST['valueToSearch']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `login` WHERE login(`username`, `email`, `user_type`, `password`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
}
 else {
    $query = "SELECT * FROM `login`";
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
		<h2 align="center">admin - Page

		<div id="branding"> 
          <h1 align="center"><span class="highlight">MACHAKOS VEHICLE HIRING SYSTEM</span></h1>
		</div>
		<nav class="navig">
			
				 <a href="admin.php" class="current">home</a>|
				 <a href="create_user.php">Add user</a>|
		<a href="bookings.php">Bookings</a>|
         <a href="users.php">users</a>|
        
		<a href="report.php">Report</a>|
        <a href="feedbacks.php">Feedbacks</a>|
      
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
						<a href="login.php?logout='1'" style="color: red;">logout</a>
                  
					</small>

				<?php endif ?>
			</div>
		</div>
	</div>

<section id="showcase">

	 
	<fieldset>
	<div class="form">
	<div style="text-align: right;">
	<form name="form" action="" method="post">
        <!--<input type="text" name="q" placeholder="Search..">-->
		<!--<input type ="submit" name="submit5" value="search">-->

		<input type="text" name="username" placeholder="name of user to delete" >
		
		
        <input type ="submit" name="submit2" onclick="return confirm('Are you sure you want to Delete this User?')" value="Delete User">
        <input type ="submit" name="" value="View Users">
        <input type ="submit" name="submit3" value="Edit User">
		<!--<input type="button" value="open popup" onclick="window.open('adm.php','_blank','height=100,width=100')"/>-->
		</form>
		
		<?php
		if(isset($_POST["submit2"])) 
{
mysqli_query($conn,"delete from login where username='$_POST[username]'");
}
if(isset($_POST["submit4"])) 
{
$res=mysqli_query($conn,"select * from login");
echo"<table border=1 width=100%>";
echo "<tr>";
echo "<th>";   echo "username"; echo "</th>";
echo "<th>";   echo "email"; echo "</th>";
echo "<th>";   echo "user_type"; echo "</th>";
echo "<th>";   echo "password"; echo "</th>";
echo "<th>";   echo "Action"; echo "</th>";


echo "</tr>";
while($row=mysqli_fetch_array($res))
{
echo "<tr>";
echo "<td>";   echo$row["username"]; echo "</td>";
echo "<td>";    echo$row["email"]; echo "</td>";
echo "<td>";    echo$row["user_type"]; echo "</td>";
echo "<td>";    echo$row["password"]; echo "</td>";



echo "</tr>";
}
echo "</table>";
}

if(isset($_POST["submit5"])) 
{
	

}
?>
<form action="users.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Value To Search">
            <input type="submit" name="search" value="Filter">
            
            <table class='table table-striped' border="1" width="100%">
               <tr>
                 
		    <th>username</th>
		    <th>email</th>
		    <th>user_type</th>
		    <th>password</th>
			
			
                </tr>

      <!-- populate table from mysql database -->
                 <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['username'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['user_type'];?></td>
                    <td><?php echo $row['password'];?></td>
                   
					
		
                </tr>
                <?php endwhile;?>
            </table>
    
        </form>

</fieldset>
  

<footer>
	<p>mvhs @copy:2018</p>
	<p>powerd by johnmtish</p>
</footer>

</body>
</html>