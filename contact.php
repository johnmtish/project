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
		<a href="avehicles.php">Avehicles</a>|
         <a href="book.php">Book</a>|
        
	
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
						<a href="login.php?logout='1'" style="color: red;">logout</a>
                      
					</small>

				<?php endif ?>
			</div>
		</div>
	</div>

	<fieldset>
	<form action="contactsentdata.php" method="POST">
<table align="center">
<tr>
<tr>
<td> username</td>
<td> <input type ="text" required="required" name="username"/></td>
</tr>
<tr>
<td>email</td>
<td> <input type ="text" required="required" name="email"/></td>
</tr>

<tr>
<td>comment</td>
<td> <input type ="text" required="required" name="comment"/></td>
</tr>

	
<tr>
<td> <input type ="reset"/></td>
<td> <button type ="submit"/> SUBMIT </button> </td>
</tr>

</table>


</form>
	</fieldset>
</section>
	<footer position="center">
  <p>mvhc @copy:2018</p>
  <p>powerd by johnmtish</p>
</footer>
</body>
</html>iv>
		</div>
	</div>