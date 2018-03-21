<?php 

if(!isset($_SESSION["logged_id"])){
 	header("location: index.php");
 	die();
 }

 ?>


<div id="box" >
<div class="box-top"><h1>User Profile</h1></div>


<?php  

include 'conn_ezr.php';

$id=$_SESSION['logged_id'];
$sql = "SELECT * FROM users WHERE id=$id";
$result = mysqli_query($conn, $sql);
$row = $result->fetch_assoc();
																																																																																																																																																																																																																						
?>

<div class="box-panel">


<table class='list' border='1px'">																									
<tr>
	<td>Id</td><td><?php echo $row["id"]; ?></td>
</tr>
<tr>
	<td>Uid</td> <td><?php echo $row["username"]; ?></td>
</tr>
<tr>
	<td>Ic</td> <td><?php echo $row["ic"]; ?></td>
</tr>
<tr>
	<td>Nama</td> <td><?php echo $row["nama"]; ?></td>
</tr>
<tr>
	<td>Jawatan</td> <td><?php echo $row["jawatan"]; ?></td>
</tr>
<tr>
	<?php if ($_SESSION['logged_id'] != 1){
		echo "<td>Baki Cuti</td> <td> ".$row['baki_cuti']." </td>";
	}
	?>
</tr>
<tr>
	<td></td><td><a href="index.php?p=update_password"> EDIT PASSWORD</a></td>
</tr>

</table>

</div>
</div>
