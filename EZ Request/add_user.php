<?php 

if (!isset($_SESSION ["logged_id"]) || $_SESSION["logged_id"] != 1){
    header("Location: index.php");
    die();
  }

?>


<form action="add_user0.php" method="POST"> 

<div id="box" >
<div class="box-top"><h1>Add User</h1></div>

<div class="box-panel">

<table class='list' border='1px'">

<tr>
	<td>Ic</td> <td><input type="text" name="ic" required></td>
</tr>
<tr>
	<td>Uid</td> <td><input type="text" name="username" required></td>
</tr>
<tr>
	<td>Nama</td> <td><input type="text" name="nama" required></td>
</tr>
<tr>
	<td>Password</td> <td><input type="password" name="pass" required></td>
</tr>
<tr>
	<td>Jawatan</td> <td><input type="text" name="jawatan" required></td>
</tr>
<tr>
	<td>Jabatan</td> <td><select name="jabatan">
	<option>Pilih Jabatan</option>
  	<option value="HR">Human Resource</option>
  	<option value="DEV">Development</option>
  	<option value="SUP">Support</option>
	</select></td>

</tr>
<tr>
	<td></td><td><input type="submit" value="ADD USER"></td>
</tr>	
</table>
</div>
