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
  <form action="booksentdata.php" method="POST">
<table align="center">
<tr>
<tr>
<td>user id</td>
<td> <input type ="text" required="required" name="user_id"/></td>
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
<td>pickup date</td>
<td> <input type ="date" required="required" name="pickup_date"/></td>
</tr>
<tr>
<td>return date</td>
<td> <input type ="date" required="required" name="return_date"/></td>
</tr>
<tr>
<tr>
<td>price/day</td>
<td> <input type ="text" required="required" name="price"/></td>
</tr>
<td>Payment Mode</td>
<td> <select name="payment_mode">
<option value="payment_mode">select payment Mode</option>
<option value="cash">cash</option>
<option value="Credit">Credit</option>
<option value="Mobile Payment">Mobile Payment</option>
</select>
</td>
</tr>
<tr>
<td>Quantity</td>
<td> <input type ="text" name="quantity" id="firstNumber" required="required"></td>
</tr>
<tr>
<td>Recommended Price per day(per vehicle)</td>
<td> <input type ="text" name="pricepv" id="secondNumber" required="required"></td>
</tr>
<tr>
<td>number of days</td>
<td> <input type ="text" name="days" id="thirdNumber" required="required"></td>
</tr
<tr>
<td><input type="button" onClick="multiplyBy()" Value="Calculate  Cost" /></td>
<td>Total Cost :</td>
<td><span id = "result" name="result"></span></td>
<tr>
<td>Confirm Total Cost</td>
<td> <input type ="text" name="cost" id="secondNumber" required="required"></td>
</tr>
<script>
function multiplyBy()
{
        num1 = document.getElementById("firstNumber").value;
        num2 = document.getElementById("secondNumber").value;
        document.getElementById("result").innerHTML = num1 * num2;
}

</script>
</tr>


<script>
function multiplyBy()
{
        num1 = document.getElementById("firstNumber").value;
        num2 = document.getElementById("secondNumber").value;
         num3 = document.getElementById("thirdNumber").value;
        document.getElementById("result").innerHTML = num1 * num2*num3;
}

</script>
</tr>
<tr>
<td>Status</td>
<td> <select name="status">
<option value="pending">Pending</option>
</select>
</td>
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
</html>
