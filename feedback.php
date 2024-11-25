<?php 
include('functions.php');
include('connection.php');
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
				 <a href="about.php">About</a>|
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

	<?php
include_once('connection.php');
	if(isset($_POST['valueToSearch']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `feedbacks` WHERE feedbacks( `first`, `email`, `comments`, `status`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
}
 else {
    $query = "SELECT * FROM `feedbacks`";
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
	
        <form action="feedbacks.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
            <input type="submit" name="search" value="Filter"><br><br>
            
            <table class='table table-striped' border="1" width="100%">
               <tr>
                 
		    <th>user name</th>
		    
		    <th>email </th>
		    
			
			<th>comments</th>
<!-- populate table from mysql database -->
                </tr>
                  <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
            
                   
                    <td><?php echo $row['username'];?></td>
                   
                    <td><?php echo $row['email'];?></td>
       
			<td><?php echo $row['comment'];?></td>
                </tr>

      
                <?php endwhile;?>
            </table>
    
        </form>
                    <h2><input type="submit" onclick="window.print()" value="Print Here" /></h2>
                </div>


	

	


</fieldset>

	<footer position="center">
  <p>mvhc @copy:2018</p>
  <p>powerd by johnmtish</p>
</footer>
</body>
</html>