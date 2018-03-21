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
<link rel="stylesheet" href="DateRangePicker/jquery-ui.css" />
<script src="DateRangePicker/jquery-1.9.1.js"></script>
<script src="DateRangePicker/jquery-ui.js"></script>
<script src="DateRangePicker/script.js"></script>
<link rel="stylesheet" href="DateRangePicker/runnable.css" />

<title>Update Form</title>
</head>

<body>
<form action="update_cuti0.php" method="POST"> 

<div id="box">
<div class="box-top"><h1>Update Form</h1></div>

<div class="box-panel">
<table class='list' border='1px'">

<?php  

include 'conn_ezr.php';

$cid=$_GET['cid'];
$sql = "SELECT * FROM cuti WHERE id=$cid";
$result = mysqli_query($conn, $sql);
$row = $result->fetch_assoc();
/*$tmpdate= explode("-",$row['mk_tarikh_mula']);
$mk_tarikh_mula = "$tmpdate[1]/$tmpdate[2]/$tmpdate[0]";
$tmpdate = explode("-",$row['mk_tarikh_akhir']);
$mk_tarikh_akhir = "$tmpdate[1]/$tmpdate[2]/$tmpdate[0]";*/
																																																																																																																																																																																																																				
?>
	
	<input type="hidden" name="id" value="<?php echo $row['id']; ?>" >

	<p>TARIKH MULA: <input type="text" id="pickup_date" name="mk_tarikh_mula" value="<?php echo $row['mk_tarikh_mula'] ?>" /></p>
	<p>TARIKH TAMAT: <input type="text" id="dropoff_date" name="mk_tarikh_akhir" value="<?php echo $row['mk_tarikh_akhir']?>" /></p>
	<br>
	BILANGAN HARI<br><br>
	CUTI AM: <input type="text" name="bh_am" value="<?php echo $row['bh_am']; ?>"><br>
	HARI REHAT: <input type="text" name="bh_rehat" value="<?php echo $row['bh_rehat']?>"><br>
	HARI SABTU: <input type="text" name="bh_sabtu" value="<?php echo $row['bh_sabtu']?>"><br>
	CUTI DIPOHON: <input type="text" name="bh_dipohon" value="<?php echo $row['bh_dipohon']?>"><br>
	TEMPOH KESELURUHAN : <input type="text" name="bh_seluruh" value="<?php echo $row['bh_seluruh']?>"><br>
	<br><br>

	<p>MAKLUMAT PENGGANTI</p>

<select name="mp_uid">

<?php

$id = $_SESSION["logged_id"];;
$jabatan = $_SESSION["jabatan"];
$sql = "SELECT * FROM users WHERE jabatan='$jabatan' AND id!=$id";
$result = mysqli_query($conn, $sql);

while($row2 = $result->fetch_assoc()) 

  {
  if ($row2['id']==$row['mp_uid']) 
  {
  	$selected="selected";
  }
  else {
  	$selected="";
  }

  echo "<option value='".$row2["id"]."' ".$selected.">".$row2['nama']."</option>";
  }


?>

</select>

<br><br>
<input type="submit" value="UPDATE">

</form>
</body>
</html>