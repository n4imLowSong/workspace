<?php 

 if(!isset($_SESSION["logged_id"]) || $_SESSION["logged_id"] != 1){
 	//header("location: index.php");
 	//die();
 }


 ?>

<html>
<head>
<meta charset="UTF=8">
<link rel="stylesheet" type="text/css" href=""/>
<title>User Detail</title>
<script>
function userDelete(id) {
   
    var r = confirm("Are you sure to delete this user?");
    if (r == true) {
        window.location.href = "index.php?p=delete_user0&id="+id;
 
	}
}	
</script>

</head>

<body> 


<div id="box" >
<div class="box-top"><h1>User Detail</h1></div>

<div class="box-panel">
<table class='list' border='1px'">

<?php  

include 'conn_ezr.php';

$id=$_GET['id'];
$sql = "SELECT * FROM users WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$row = $result->fetch_assoc();
																																																																																																																																																																																																																						

?>
																																																														
<tr>
	<td>Id</td> <td><?php echo $row["id"]; ?></td>
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
	<td>Baki Cuti</td> <td><?php echo $row["baki_cuti"]; ?></td>
</tr>
<tr>			
	<td></td><td><a href="index.php?p=update_user&id=<?php echo $row['id']; ?>"> EDIT </a>
	<!--<a href="delete_user0.php?id=<?php echo $row['id']; ?>"> -->
	<a href="#" onclick="userDelete(<?php echo $row['id']; ?>); return false;">
	<?php if ($_SESSION['logged_id'] == 1)
      {
       echo "| DELETE ";
      }
    ?>
	</a></td>
	</td>
</tr>	


</table>
</body>
</html>