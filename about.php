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
		<h2 align="center">User - Page

		<div id="branding"> 
          <h1 align="center"><span class="highlight">MACHAKOS VEHICLE HIRING SYSTEM</span></h1>
		</div>
		<nav class="navig">
			
				 <a href="index.php" class="current">home</a>|
				 <a href="about.php" class="current">About</a>|
		<a href="avehicles.php">Avehicles</a>|
         <a href="book.php">Book</a>|
        
		<a href="users.php">users</a>|
        <a href="contact.php">Contact us</a>|
      
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
                       
					</small>

				<?php endif ?>
			</div>
		</div>
	</div>
<fieldset>
	<h2 style="color:#157DEC"><center>About us</CENTER></h2>
      <h4> Machakos online vehicle hiring System (MOVHS) is a computerized online system designed and programmed to deal majorly with vehicle bookings and also making enquiries. </h4>
       <p>
It allows customer to hire vehicles of their choice by providing an online platform for reserving/hiring the vehicle. 
</p>
<p>
The aim of our system is to lead in the vehicle hiring industry by completely focusing on customers, employees, growth, innovation and efficiency. 
<p>
The system also makes full use of information technology to improve the level of efficiency in travel and transportation. 
</p>
	</fieldset>
</section>

	<footer position="center">
  <p>mvhc @copy:2018</p>
  <p>powerd by johnmtish</p>
</footer>
</body>
</html>