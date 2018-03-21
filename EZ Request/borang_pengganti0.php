<?php 
 session_start();

 if(!isset($_SESSION["logged_id"])){
 	header("location: index.php");
 	die();
 }

include 'conn_ezr.php';

$cid=$_POST['cid'];
$date= date("Y/m/d");
$mp_pengesahan = $_POST['mp_pengesahan'];
$sql = "UPDATE cuti SET mp_pengesahan = '$mp_pengesahan', mp_tarikh_sah = '$date'  WHERE id = '$cid'";
$result = mysqli_query($conn, $sql);

header("Location: borang_pengganti.php?cid=$cid" );

?>

