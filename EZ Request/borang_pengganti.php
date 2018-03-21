<?php

if(!isset($_SESSION["logged_id"]))
{
	header ("Location:index.php");
	die();
}

?>

<!DOCTYPE html>

<html>
<head>
<meta charset="UTF=8">
<link rel="stylesheet" type="text/css" href=""/>
<title>Form Detail</title>
</head>

<body>
<form action="borang_pengganti0.php" method="POST"> 

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

	<h3>MAKLUMAT PENGGANTI</h3>

	<?php

	$id = $row['mp_uid'];
	$sql = "SELECT * FROM users WHERE id=$id";
	$result = mysqli_query($conn, $sql);
	$row3 = $result->fetch_assoc();

	echo "NAMA: ".$row3['nama']."<br>"."IC: ".$row3['ic'];
	

	?>

	<br><br>


	<form action="borang_pengganti0.php" method="POST">

	<?php  
	
	if ($row['mp_pengesahan'] == "1") {
    $checked="checked disabled";
    } 
    else {
  	$checked="";
  	}
	?>

	<input type="hidden" name="cid" value="<?php echo $row['id']; ?>" >

	PENGESAHAN:<input type="checkbox" name="mp_pengesahan" value="1" <?php echo $checked ?> />
               <label>*  Dengan ini saya bersetuju untuk mengendalikan tugasan pemohon sepanjang tempoh beliau bercuti.</label><br><br>


	<?php
	//kalu 0/1 kne guna === Comparison Operators
	 if ($row['mp_pengesahan'] == "1") {
    echo "TARIKH: ".$row['mp_tarikh_sah'];
    } 
     else {
  	echo "<input type='submit'>";
  	}

	$session_id=$_SESSION['logged_id'];

  	if (strpos($row['is_read'], ','.$session_id.',') === false ) {	
  		setRead($session_id,$cid);
		header("location: index.php?p=borang_pengganti&cid=".$cid);
	}
	?> 

    <br><br>


	
	

</form>
</body>
</html>

