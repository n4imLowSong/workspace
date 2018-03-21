<?php 
 session_start();

 if(!isset($_SESSION["logged_id"])){
 	header("location: index.php");
 	die();
 }

include 'conn_ezr.php';

$kp_uid = $_SESSION['logged_id'];
$mk_uid = $_POST['mk_uid'];
$kp_baki_sebelum = $_POST['kp_baki_sebelum'];
$kp_baki_selepas = $_POST['kp_baki_selepas'];
$kp_kelulusan = $_POST['kp_kelulusan'];
$cid=$_POST['cid'];
$kp_tarikh_lulus= date("Y/m/d");


$sql = "UPDATE cuti SET kp_kelulusan = '$kp_kelulusan' , kp_uid = '$kp_uid', kp_tarikh_lulus = '$kp_tarikh_lulus' , kp_baki_sebelum = '$kp_baki_sebelum', kp_baki_selepas = '$kp_baki_selepas' WHERE id = '$cid'";
$result = mysqli_query($conn, $sql);

if ($kp_kelulusan == "1") {
	$sql = "UPDATE users SET baki_cuti = '$kp_baki_selepas' WHERE id = '$mk_uid'";
	$result = mysqli_query($conn, $sql);
}


//echo mysqli_error($conn);
 
header("Location: index.php?p=user_list" );

?>
