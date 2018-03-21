 <?php 
 session_start();

 if(!isset($_SESSION["logged_id"])){
 	header("location: index.php");
 	die();
 }

include 'conn_ezr.php';

$sp_sokongan = $_POST['sp_sokongan'];
$sp_uid = $_SESSION['logged_id'];
$cid=$_POST['cid'];
$sp_tarikh= date("Y/m/d");


$sql = "UPDATE cuti SET sp_sokongan = '$sp_sokongan' , sp_uid = '$sp_uid', sp_tarikh_sah = '$sp_tarikh' WHERE id = '$cid'";
$result = mysqli_query($conn, $sql);

//echo mysqli_error($conn);
 
header("Location: index.php" );

?>
