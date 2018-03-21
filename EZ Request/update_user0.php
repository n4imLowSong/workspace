<?php
session_start(); 
if (!isset($_SESSION ["logged_id"]) || $_SESSION["logged_id"] != 1){
    header("Location: index.php");
    die('mmm');
   }

include 'conn_ezr.php';
$id = $_POST['id'];
$ic = $_POST['ic'];
$username = $_POST['username'];
$nama = $_POST['nama'];
$pass = $_POST['pass'];
$jawatan = $_POST['jawatan'];
$baki_cuti = $_POST['baki_cuti'];


$sql = "UPDATE users SET ic='$ic', username='$username', nama='$nama', pass='$pass', jawatan='$jawatan', baki_cuti='$baki_cuti' WHERE id='$id'";

$result = mysqli_query($conn, $sql);


//echo mysqli_error($conn);
header("Location: index.php?p=user_detail&id=$id");

?>