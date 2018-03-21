<?php

if(!isset($_SESSION["logged_id"])){
	header ("Location:index.php");
	die();
}

?>

<html>
<head>
<meta charset="UTF=8">
<link rel="stylesheet" type="text/css" href=""/>
<title>Update Password</title>
</head>


<body>
<form action="update_password0.php" method="POST"> 


<div id="box" >
<div class="box-top"><h1>Update Password</h1></div>

<div class="box-panel">
<form action="update_password0.php" method="POST"> 

<table class='list' border='1px'">
<tr>
	<td>Current Password</td> <td><input type="password" name="pass" required=""></td>
</tr>
<tr>
	<td>New Password</td> <td><input type="password" name="newpass" required=""></td>
</tr>
<tr>
	<td>Confirm New Password</td> <td><input type="password" name="confirmpass" required=""></td>
</tr>
<tr>
	<td></td><td><input type="submit" value="UPDATE" ></td>
</tr>	
</table>
</div>
</form>
</body>
</html>