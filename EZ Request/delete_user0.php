<?php

if(!isset($_SESSION["logged_id"]) || $_SESSION["logged_id"] !=1){
	header ("Location:index.php");
	die();
}

include 'conn_ezr.php';

$id = $_GET['id'];

$sql = "DELETE FROM users WHERE id='$id'";
mysqli_query($conn, $sql);

if (mysqli_affected_rows($conn) == 1 ) {
    header("Location: index.php?p=user_list&deleted");
}   


?>
