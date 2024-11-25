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
        <a href="adminfeedback.php">feedback</a>|
        <a href="avehicles.php">available vehcls</a>|
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
	<form action="addvehiclesentdata.php" method="POST">
<table align="center">
<tr>
	<tr>
<td>id</td>
<td> <input type ="text" required="required" name="id"/></td>
</tr>
<tr>
<td>vehicle name</td>
<td> <input type ="text" required="required" name="vehicle_name"/></td>
</tr>
<tr>
<td>vehicle number</td>
<td> <input type ="text" required="required" name="vehicle_number"/></td>
</tr>
<tr>

	<tr>
<td>vehicle type</td>
<td> <select name="vehicle_type">
<option value="vehicle_type">select item</option>
<option value="lorry">lorry</option>
<option value="car">car</option>
<option value="bus">bus</option>
<option value="pick up">pick up</option>
</select>
</td>
</tr>

<tr>
<td>price</td>
<td> <input type ="text" required="required" name="vehicle_price"/></td>
</tr>

<tr>
<td> <input type ="reset"/></td>
<td> <button type ="submit"/> SUBMIT </button> </td>
</tr>

</table>


</form>
	</fieldset>
</section>