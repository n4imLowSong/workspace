<?php 
if (!isset($_SESSION ["logged_id"])){
    header("Location: index.php");
    die();
  }
?>

<script>

function PrintPreview(box) {
 var test=	document.getElementById(box).innerHTML;
 
 var Contractor= $('span[id*="lblCont"]').html();
 printWindow = window.open("", "", "location=1,status=1,scrollbars=1,width=650,height=600");
 printWindow.document.write('<html><head>');
 printWindow.document.write('<link rel="stylesheet" media="screen" type="text/css" href="print.css">');
  printWindow.document.write('<link rel="stylesheet" media="print" type="text/css" href="print2.css">');
 //printWindow.document.write('<style type="text/css">@media print{.no-print, .no-print *{display: none !important;}</style>');
 printWindow.document.write('</head>');
 printWindow.document.write('<body>');
 printWindow.document.write('<div class="printButton" style="width:100%;text-align:center;position: fixed;background-color: #ccc;">');

  //Print and cancel button
 printWindow.document.write('<input type="button" id="btnPrint" value="Print" class="no-print" style="width:100px" onclick="window.print();"/>');
 printWindow.document.write('<input type="button" id="btnCancel" value="Cancel" class="no-print"  style="width:100px" onclick="window.close()" />');

 printWindow.document.write('</div>');

 //You can include any data this way.
 //printWindow.document.write('<table><tr><td>Contractor name:'+ Contractor +'</td></tr>you can include any info here</table');

 printWindow.document.write(document.getElementById(box).innerHTML);
 //here 'forPrintPreview' is the id of the 'div' in current page(aspx).
 printWindow.document.write('</body></html>');
 printWindow.document.close();
 printWindow.focus();
}

</script>

<body>

<div id="box" >

<div class="box-top"><h1>Employee Leave Record</h1></div>

<div class="box-panel">

	<div class="header">

		<img src="Media/logomitech-2016-trans-.png"; width="200px"; height="100px"; align="center">
		<h3>Maklumat Cuti Pekerja Terkini Melalui Sistem EZ Request</h3>
		<br><hr><br>
	</div>

<table class='list' border='1px'">

<?php  

include 'conn_ezr.php';

$cid=$_GET['cid'];
$sql = "SELECT * FROM cuti WHERE id=$cid";
$result = mysqli_query($conn, $sql);
$row = $result->fetch_assoc();

$id = $row['mk_uid'];
$sql = "SELECT ic, nama, baki_cuti FROM users WHERE id=$id" ;
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


	<form action="rekod_cuti0.php" method="POST">

	<?php  
	
	if ($row['mp_pengesahan'] == "1") {
    $checked="checked disabled";
    } 
    else {
  	$checked="disabled";
  	}
	?>

	<input type="hidden" name="cid" value="<?php echo $row['id']; ?>" >
	<input type="hidden" name="mk_uid" value="<?php echo $row['mk_uid']; ?>" >

	PENGESAHAN:<input type="checkbox" name="mp_pengesahan" value="1" <?php echo $checked ?> />
               <label>*  Dengan ini saya bersetuju untuk mengendalikan tugasan pemohon sepanjang tempoh beliau bercuti.</label><br><br>


	<?php
	//kalu 0/1 kne guna === Comparison Operators
	if ($row['mp_pengesahan'] == "1" ) {
    echo "TARIKH: ".$row['mp_tarikh_sah'];
    } 
    else {
   	  if ($_SESSION['logged_id'] != 1) {
   		echo "<input type='submit'>";
   	  }
   	  else {
   	  	if ($row['kp_kelulusan'] === "1" || $row['kp_kelulusan'] === "0") {
   	  		echo "<input type='submit' value='submit' disabled>";
   	  	}
   	  	else {
   	  		echo "<input type='submit' value='dalam proses..' disabled>";
   	  	}
   	  }
 }
	?> 

    <br><br>			

<h3>SOKONGAN PENYELIA</h3>

<?php

$id = $row['sp_uid'];
$sql = "SELECT * FROM users WHERE id=$id";
$result = mysqli_query($conn, $sql);
$row4 = $result->fetch_assoc();



echo "NAMA: ".$row4['nama']."<br>"."JAWATAN: ".$row4['jawatan'];	
	
if ($row['sp_sokongan'] == "1") {
$radio1="checked disabled";
$radio2="disabled";
}
else if ( $row['sp_sokongan'] == "0") {
$radio1="disabled";
$radio2="checked disabled";
}
else {
$radio1="disabled";
$radio2="disabled";
}

?>

<br><br>

<input type="radio" name="sp_sokongan" value="1" <?php echo $radio1 ?> > DISOKONG <br>
<input type="radio" name="sp_sokongan" value="0" <?php echo $radio2 ?> >TIDAK DISOKONG <br>

<br>

<?php
//kalu 0/1 kne guna === Comparison Operators
 if ($row['sp_sokongan'] == "1") {
 echo "TARIKH: ".$row['sp_tarikh_sah'];
 } 
 else {
 	  if ($_SESSION['logged_id'] != 1) {
   		echo "<input type='submit'>";
   	  }
   	  else {
   	  	if ($row['kp_kelulusan'] === "1" || $row['kp_kelulusan'] === "0") {
   	  		echo "<input type='submit' value='submit' disabled>";
   	  	}
   	  	else {
   	  		echo "<input type='submit' value='dalam proses..' disabled>";
   	  	}
   	  }
 }
?> 

<br><br>

Untuk kegunaan pejabat:

	<br>

	<h3>REKOD CUTI KAKITANGAN</h3>


	<input type="hidden" name="kp_baki_sebelum" value="<?php echo $row2['baki_cuti']; ?>" >
	<input type="hidden" name="kp_baki_selepas" value="<?php echo $row2['baki_cuti']-$row['bh_dipohon']; ?>" >

<?php
if ($row['kp_kelulusan'] === "1" || $row['kp_kelulusan'] === "0") {
?>
	BAKI SEBELUM: <?php echo $row['kp_baki_sebelum']; ?><br>
	BILANGAN DIPOHON:<?php echo $row['bh_dipohon']; ?><br>
	BAKI SELEPAS:<?php echo $row['kp_baki_selepas']; ?><br>

<?php

}

else {
?>
	BAKI SEBELUM: <?php echo $row2['baki_cuti']; ?><br>
	BILANGAN DIPOHON:<?php echo $row['bh_dipohon']; ?><br>
	BAKI SELEPAS:<?php echo $row2['baki_cuti']-$row['bh_dipohon']; ?><br>
<?php  

}


?>
	<br>
	<h3>KELULUSAN</h3>

	<?php

	$id = $_SESSION['logged_id'];
	$sql = "SELECT * FROM users WHERE id=$id";
	$result = mysqli_query($conn, $sql);
	$row5 = $result->fetch_assoc();

	echo "NAMA: ".$row5['nama']."<br>"."JAWATAN: ".$row5['jawatan'];	
		
	if ($row['kp_kelulusan'] == "1") {
	$radio1="checked disabled";
	$radio2="disabled";
	}
	else if ( $row['kp_kelulusan'] == "0") {
	$radio1="disabled";
	$radio2="checked disabled";
	}
	else {
	$radio1="";
	$radio2="";
	}

	?>

	<br><br>

	<input type="radio" name="kp_kelulusan" value="1" <?php echo $radio1 ?> > LULUS <br>
	<input type="radio" name="kp_kelulusan" value="0" <?php echo $radio2 ?> >TIDAK LULUS <br>

	<br>

	<?php
	//kalu 0/1 kne guna === Comparison Operators
	 if ($row['kp_kelulusan'] == "1") {
	 echo "TARIKH: ".$row['kp_tarikh_lulus'];
	 } 
	 else {
	 	if ($row['kp_kelulusan'] == "0") {
   		echo "<input type='submit' value='Tidak Lulus' disabled>";
   	  	}
   	  	else {
   	  	echo "<input type='submit' value='submit'>";
   	  }
   	}
	?> 
	<br><br>
	
<input class="printButton" type="button" value="Print" onClick="PrintPreview('box')" />
	</form>

</table>
</div>
</div>

</body>
</html>