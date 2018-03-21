<?php

if(!isset($_SESSION["logged_id"]))
{
	header ("Location:index.php");
	die();
}

?>

<html>
<head>
<meta charset="UTF=8">
<link rel="stylesheet" type="text/css" href=""/>
<title>Form Detail</title>
<script>
function formDelete(id) {
    var r = confirm("Are you sure to delete this form?");
    if (r == true) {
    window.location.href = "index.php?p=delete_cuti0&cid="+id;
 
	}
}	
</script>
</head>

<body>
<form action="update_cuti0.php" method="POST"> 

<div id="box" >
<div class="box-top"><h1>Form Detail</h1></div>

<div class="box-panel">
<table class='list' border='1px'">

<?php  

include 'conn_ezr.php';

$cid=$_GET['cid'];
$sql = "SELECT * FROM cuti WHERE id=$cid";
$result = mysqli_query($conn, $sql);
$row = $result->fetch_assoc();

$id = $row['mk_uid'];
$sql = "SELECT ic, nama FROM users WHERE id=$id" ;
$result = mysqli_query($conn, $sql);
$row2 = $result->fetch_assoc();
																																																																																																																																																																																																																						
?>

	TARIKH: <?php echo $row['tarikh_borang'];?>

	<br><br>
	
	<h3>MAKLUMAT KAKITANGAN</h3>
	NAMA: <?php echo $row2["nama"]; ?>
	<br>
	NO. I/C: <?php echo $row2["ic"]; ?>
	<br><br>

	<p>TARIKH MULA: <?php echo $row["mk_tarikh_mula"]; ?></p>
	<p>TARIKH TAMAT: <?php echo $row["mk_tarikh_akhir"]; ?></p>
	<br>
	BILANGAN HARI<br><br>
	CUTI AM: <?php echo $row["bh_am"]; ?><br>
	HARI REHAT: <?php echo $row["bh_rehat"]; ?><br>
	HARI SABTU: <?php echo $row["bh_sabtu"]; ?><br>
	CUTI DIPOHON: <?php echo $row["bh_dipohon"]; ?><br>
	TEMPOH KESELURUHAN : <?php echo $row["bh_seluruh"]; ?><br>
	<br><br>

	<p>MAKLUMAT PENGGANTI</p>

	<?php

	$id = $row['mp_uid'];
	$sql = "SELECT nama FROM users WHERE id=$id";
	$result = mysqli_query($conn, $sql);
	$row3 = $result->fetch_assoc();

	echo "NAMA: ".$row3['nama'];

	?>

	<br><br>

	<a href="index.php?p=update_cuti&cid=<?php echo $row['id']; ?>">EDIT </a>
	<a href="#" onclick="formDelete(<?php echo $row['id']; ?>); return false;">| DELETE </a>



</body>
</html>