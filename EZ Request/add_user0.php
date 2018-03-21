<?php
session_start();

if (isset($_SESSION["logged_id"])) 
{
	if (!$_SESSION["logged_id"] == 1)
	{
		header("Location: user_dashboard.php");
	}	
}
else {
	header("Location: user_dashboard.php");
}



include 'conn_ezr.php';

$ic = $_POST['ic'];
$username = $_POST['username'];
$nama = $_POST['nama'];
$pass = $_POST['pass'];
$jawatan = $_POST['jawatan'];
$jabatan= $_POST['jabatan'];

$sql = "INSERT INTO users (ic,username,nama,pass,jawatan,jabatan,baki_cuti) VALUES ('$ic','$username','$nama','$pass','$jawatan','$jabatan',17)";

$result = mysqli_query($conn, $sql);


//echo mysqli_error($conn);
//print_r($_POST);
header("Location: index.php?p=user_list");



?>