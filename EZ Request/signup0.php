<?php

include 'conn_ezr.php';

$ic = $_POST ['ic'];
$pass = $_POST ['pass'];
$email = $_POST ['email'];


$sql = "INSERT INTO users (uid, pwd, email) VALUES ('$uid', '$pwd','$email')";
$result = mysqli_query($conn, $sql);

header("Location: index.php");

?>