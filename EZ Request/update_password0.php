<?php
session_start(); 
if (!isset($_SESSION ["logged_id"])){
    header("Location: index.php");
    die();
   }

include 'conn_ezr.php';

$id = $_SESSION["logged_id"];
$newpass = $_POST["newpass"];

$sql = "SELECT pass FROM users WHERE id=$id"; 
$result = mysqli_query($conn, $sql);
$row = $result->fetch_assoc();

if ($_POST['pass'] == $row['pass']) {

	if ($_POST['newpass'] == $_POST['confirmpass']) {
		$sql = "UPDATE users SET pass='$newpass' WHERE id='$id'";
		$result = mysqli_query($conn, $sql);
	}
	# code...
}

header("Location: user_profile.php")
/*




if ($pass == $pass){ echo "Your passwords do not match.";}
{
    echo "your passwords do not match";
}
else (mysql_query())
{
    echo "You have successfully changed your password.";
}
*/
?>