<?php 
 session_start();

 if(!isset($_SESSION["logged_id"])){
 	header("location: index.php");
 	die();
 }

include 'conn_ezr.php';

$id=$_SESSION["logged_id"];
$sql = "SELECT * FROM users WHERE id=$id";
$result = mysqli_query($conn, $sql);
$row = $result->fetch_assoc();

$mk_uid = $_SESSION['logged_id'];
$sebab_cuti = $_POST['sebab_cuti'];
$date= date("Y/m/d");
//$tmpdate= explode("/",$_POST['mk_tarikh_mula']);
$mk_tarikh_mula = $_POST['mk_tarikh_mula'];
//$tmpdate = explode("/",$_POST['mk_tarikh_akhir']);
$mk_tarikh_akhir = $_POST['mk_tarikh_akhir'];
$bh_am = $_POST['bh_am'];
$bh_rehat = $_POST['bh_rehat'];
$bh_sabtu = $_POST['bh_sabtu'];
$bh_dipohon = $_POST['bh_dipohon'];
$bh_seluruh = $bh_am + $bh_rehat + $bh_sabtu + $bh_dipohon;
$mp_uid = $_POST['mp_uid'];
$mk_pengesahan = $_POST['mk_pengesahan'];

$sql = "INSERT INTO cuti (mk_uid, sebab_cuti, tarikh_borang, mk_tarikh_mula, mk_tarikh_akhir, bh_am, bh_rehat, bh_sabtu, bh_dipohon, bh_seluruh, mp_uid, mk_pengesahan, is_read) VALUES ('$mk_uid','$sebab_cuti', '$date', '$mk_tarikh_mula', '$mk_tarikh_akhir', '$bh_am', '$bh_rehat', '$bh_sabtu', '$bh_dipohon', '$bh_seluruh','$mp_uid','$mk_pengesahan', '')";

$result = mysqli_query($conn, $sql);


//echo mysqli_error($conn);
header("Location: index.php?");

?>