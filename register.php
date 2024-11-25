<?php include('connection.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title>registration</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body bgcolor="silver">
<div class="header">
    <h2>Register Here </h2>

</div>

    <form action="create_usersentdata.php" method="POST">
<table align="center">
<tr>
<tr>
<td>username</td>
<td> <input type ="text" required="required" name="username"/></td>
</tr>
<tr>
<td>email</td>
<td> <input type ="text" required="required" name="email"/></td>
</tr>
<tr>

    <tr>
<td>user_type</td>
<td> <select name="user_type">
<option value="vehicle_type">select item</option>

<option value="user">user</option>

</select>
</td>
</tr>
<tr>
<td>password</td>
<td> <input type ="text" required="required" name="password"/></td>
</tr>
<tr><br>


<tr>
<td> <input type ="reset"/></td>
<td> <button type ="submit"/> SUBMIT </button> </td>
</tr>

</table>

<br>

    <p>
        Already a member? <a href="login.php">Sign in</a>
    </p>
</form>
</body>
</html>