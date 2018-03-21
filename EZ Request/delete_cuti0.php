<?php
session_start();

if(!isset($_SESSION["logged_id"]))
{
	header ("Location:index.php");
	die();
}

include 'conn_ezr.php';

$id = $_GET['cid'];


$sql = "DELETE FROM cuti WHERE id='$id'";

$result = mysqli_query($conn, $sql);

header("Location: form_list.php");

?>
