<?php

include 'conn_ezr.php';
session_start();

$username = $_POST ['username'];
$pass = $_POST ['pass'];


$sql = "SELECT * FROM users WHERE username='$username' AND pass='$pass'";
$result = mysqli_query($conn, $sql);

//print_r($sql);

if (!$row=mysqli_fetch_assoc($result)) 
{
	echo "Your username or password is incorrect!";
} else {
	$_SESSION["logged_id"] = $row['id'];
	$_SESSION["ic"] = $row['ic'];
	$_SESSION["nama"] = $row['nama'];
	$_SESSION["jabatan"] = $row['jabatan'];
	$_SESSION["jawatan"] = $row['jawatan'];
	$_SESSION["username"] = $row['username'];

	if ($_SESSION["logged_id"] == 1) {
		
		$thisyear = $row['baki_cuti'];
		$nextyear = date("Y");


		if ($thisyear != $nextyear ) {
			$sql = "UPDATE users SET baki_cuti = baki_cuti+17 WHERE id != 1";
			$result = mysqli_query($conn, $sql);

			$sql = "UPDATE users SET baki_cuti = '$nextyear' WHERE id = 1";
			$result = mysqli_query($conn, $sql);
		}


	}

	
}
//print_r($row);
header("Location: index.php?p=dashboard");

?>