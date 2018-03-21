<?php

if(!isset($_SESSION["logged_id"]) ||  !($_SESSION["logged_id"] >=1 && $_SESSION['logged_id'] <=3)  ){
	header ("Location:index.php");
	die();
}

?>

<html>
<head>
<meta charset="UTF=8">
<link rel="stylesheet" type="text/css" href=""/>
<title>Update User</title>
</head>

<body>
<form action="update_user0.php" method="POST"> 

<div id="box" >
<div class="box-top"><h1>Update User</h1></div>

<div class="box-panel">
<table class='list' border='1px'">
<?php  

include 'conn_ezr.php';

$id=$_GET['id'];

$sql = "SELECT * FROM users WHERE id=$id";
$result = mysqli_query($conn, $sql);
$row = $result->fetch_assoc();
																																																																																																																																																																																																																						

?>

<input type="hidden" name="id" value="<?php echo $row['id']; ?>" >

<tr>
	<td>Ic</td> <td><input type="text" name="ic" value="<?php echo $row['ic']; ?>" ></td>
</tr>
<tr>
	<td>Username</td> <td><input type="text" name="username" value="<?php echo $row['username']; ?>" ></td>
</tr>
<tr>
	<td>Nama</td> <td><input type="text" name="nama" value="<?php echo $row['nama']; ?>"></td>
</tr>
<tr>
	<td>Password</td> <td><input type="password" name="pass" value="<?php echo $row['pass']; ?>"></td>
</tr>
<tr>
	<td>Jawatan</td> <td><input type="text" name="jawatan" value="<?php echo $row['jawatan']; ?>"></td>
</tr>
<tr>
	<td>Baki Cuti</td> <td><input type="text" name="baki_cuti" value="<?php echo $row['baki_cuti']; ?>"></td>
</tr>
<tr>
	<td></td><td><input type="submit" value="UPDATE" ></td>
</tr>	
</table>
</body>
</html>