<?php 

if(!isset($_SESSION["logged_id"]))
{
 	header ("location: index.php");
 	die();
}

?>

<script>
	function printDiv(content)
		{
			var printContents=document.getElementById(content).innerHTML;
			var originalContents=document.body.innerHTML = printContents;
			window.print() ;
			document.body.innerHTML=originalContents;
		}
</script>


	<title>Borang Cuti</title>

    <!-- <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" /> -->
    <link rel="stylesheet" href="DateRangePicker/jquery-ui.css" />
    <script src="DateRangePicker/jquery-1.9.1.js"></script>
    <script src="DateRangePicker/jquery-ui.js"></script>
    <script src="DateRangePicker/script.js"></script>
    <link rel="stylesheet" href="DateRangePicker/runnable.css" />



	<form action="borang_cuti0.php" method="POST">
	
	<div id="box" >
	<div class="box-top"><h1>BORANG PERMOHONAN CUTI</h1></div>

	<div class="box-panel" >
	TARIKH: <?php echo date("Y/m/d");?><br>
	<br>
	
	<h3>MAKLUMAT KAKITANGAN</h3>
	NAMA: <tr><td><?php echo $_SESSION["nama"]; ?></td></tr>
	<br>
	NO. I/C: <td><?php echo $_SESSION["ic"]; ?></td>
	<br><br>
	<h3>MAKLUMAT CUTI</h3>
	TAHUNAN:<br>
	<input type="radio" name="sebab_cuti" value="REHAT" onclick="getElementById('text_box').style.display='none'"> REHAT<br>
 	<input type="radio" name="sebab_cuti" value="KECEMASAN" onclick="getElementById('text_box').style.display='none'"> KECEMASAN<br><br>
	KHAS:<br>
	<input type="radio" name="sebab_cuti" value="PERKAHWINAN" onclick="getElementById('text_box').style.display='none'"> PERKAHWINAN<br>
 	<input type="radio" name="sebab_cuti" value="ISTERI BERSALIN" onclick="getElementById('text_box').style.display='none'"> ISTERI BERSALIN<br>
 	<input type="radio" name="sebab_cuti" value="KEMATIAN+surat" onclick="getElementById('text_box').style.display='none'"> KEMATIAN+surat<br>
 	<input type="radio" name="sebab_cuti" value="BENCANA" onclick="getElementById('text_box').style.display='none'"> BENCANA<br><br>
	LAIN-LAIN:<br>
	<input type="radio" name="sebab_cuti" value="SAKIT+surat" onclick="getElementById('text_box').style.display='none'"> SAKIT+surat<br>
 	<!--<input type="radio" name="sebab_cuti" value="GANTI" onclick="getElementById('text_box').style.display='none'"> GANTI<br> -->
 	<input type="radio" name="sebab_cuti" value="BERSALIN+surat" onclick="getElementById('text_box').style.display='none'"> BERSALIN+surat<br>
 	<input type="radio" name="sebab_cuti" value="TANPA GAJI+surat" onclick="getElementById('text_box').style.display='none'"> TANPA GAJI+surat<br>

 	<input id="reason_cuti" type="radio" name="sebab_cuti" value="" onclick="getElementById('text_box').style.display='block'"> LAIN-LAIN(nyatakan):<br>
 	
 	<center>
 	<textarea id="text_box" rows="3" cols="40" onkeyup="getElementById('reason_cuti').value = this.value" style="display: none;"></textarea><br>
 	</center>

	<h3>TARIKH MULA</h3> : <input type="text" id="pickup_date" name="mk_tarikh_mula"/><br>
	<h3>TARIKH TAMAT</h3> : <input type="text" id="dropoff_date" name="mk_tarikh_akhir"/>
	<br><br>

	<?php
	include "conn_ezr.php";
	$id = $_SESSION["logged_id"];;
	$sql = "SELECT * FROM users WHERE id=$id";
	$result = mysqli_query($conn, $sql);
	$row2 = $result->fetch_assoc();

	?>

	<h3>BILANGAN HARI</h3>
	BAKI CUTI SEBELUM PERMOHONAN: <?php echo $row2["baki_cuti"]; ?><br>
	CUTI AM:<input id="bh_am" type="number" name="bh_am"/><br>
	HARI JUMAAT:<input id="jumaat" type="number" name="bh_rehat"/><br>
	HARI SABTU:<input id="sabtu" type="number" name="bh_sabtu"/><br>
	CUTI DIPOHON:<input id="bh_dipohon" type="number" name="bh_dipohon"/><br>
	
	<br><br>

	<h3>MAKLUMAT PENGGANTI</h3>

<select name="mp_uid">
<option>Pilih Pengganti</option>

<?php
include "conn_ezr.php";
$id = $_SESSION["logged_id"];;
$jabatan = $_SESSION["jabatan"];
$sql = "SELECT * FROM users WHERE jabatan='$jabatan' AND id!=$id";
$result = mysqli_query($conn, $sql);

while($row = $result->fetch_assoc()) {
  echo "<option value='".$row["id"]."'>".$row['nama']."</option>";
}

?>

</select>

<br><br>

	<h3>PENGESAHAN PERMOHONAN</h3>
	PENGESAHAN: <input type="checkbox" name="mk_pengesahan" value="1"/>
               <label>*  Dengan ini saya mengesahkan permohonan ini dan mengakui semua maklumat yang diberi adalah benar.</label>


<br><br>

	<input type="submit" value="submit">

</form>
</div>