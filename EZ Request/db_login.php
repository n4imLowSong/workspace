<?php

$conn = mysqli_connect("localhost","root","abc123","logintest");

if (!$conn) {
	die("Connection failed: ".mysqli_connect_error());
}


?>