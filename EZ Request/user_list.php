<?php  

if (!isset($_SESSION ["logged_id"]) || $_SESSION["logged_id"] != 1){
    header("Location: index.php");
    die();
}
  
if (isset($_GET['deleted'])){
    echo "<script> alert('delete successful') </script>"; 
}
?>


<div id="box" >
<div class="box-top"><h1>List of User</h1></div>

<div class="box-panel" >
<?php  

include 'conn_ezr.php';

$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
$x = 1;


if ($result->num_rows > 0) {
    echo "<table class='list' border='1px'><tr><th>ID</th><th>Nama</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$x."</td>";
        $x++;

        echo "<td><a href='index.php?p=user_detail&id=".$row["id"]."'>".$row["nama"]."</a></td></tr>";
       ?>
       <!--<td><a href='user_detail.php?id=<?php echo $row["id"]; ?>'><?php echo $row["nama"]; ?></a></td></tr>-->

       <?php
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>

</body>
</html>