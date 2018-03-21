<?php

$conn = mysqli_connect("localhost","root","","ezr");

if (!$conn) {
	die("Connection failed: ".mysqli_connect_error());
}
//else {echo "SUCCESS!";}