<?php

session_start();

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewpoint" content="width=device-width">
	<title></title>
<link rel="stylesheet" type="text/css" href="csss.css">

</head>
<body>
<header>
	<div class="container">
		<div id="branding"> 
          <h1><span class="highlight">QUICK SALES </span> Quick</h1>
		</div>
		<nav class="navig">
			
				<a href="adminlogin.php" class="current">home</a>|
				<a href="services.php">services</a>|
				<a href="about.php">about</a>|
				<a href="adm.php">admin</a>
		
		</nav>
		
	</div>

</header>

<section id="showcase">
	<div class="container">
		<h2>Improve Efficiency<br>Try Now</h2>
		
	</div>
	<fieldset>
	<div class="form">
		<form action="loggg.php" method="POST">
		<img src="log.png"><br>
		User Login:<br>
		Email:<br>
			<input type="email" name="email" placeholder="email" required=""><br>
			Password:<br>
			<input type="password" name="pwd" placeholder="password" required=""><br>
			<button type="login" name="login">login</button>
		</form>
	</div>
	</fieldset>
	<fieldset>
		<div>
			<a href="forgotpass.php">forgot password?</a>
			
		</div>
	</fieldset>
</section>

<footer>
	<p>quicksales @copy:2018</p>
	<p>powerd by themutisya</p>
</footer>
</body>
</html>
