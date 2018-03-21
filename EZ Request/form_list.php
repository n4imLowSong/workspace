<?php 

if(!isset($_SESSION["logged_id"]))
{
    header ("location: index.php");
    die();
}

?>

<title>Form List</title>

<div id="box" >
<div class="box-top"><h1>Form List</h1></div>

<div class="box-panel" >
<?php  

include 'conn_ezr.php';

$id=$_SESSION['logged_id'];
$sql = "SELECT * FROM cuti WHERE mk_uid=$id";
$result = mysqli_query($conn, $sql);
$x = 1;


    if ($result->num_rows > 0) {

        echo "<table class='list' border='1px'><tr><th>bil.</th><th>Tarikh Cuti</th><th>Status</th></tr>";
    // output data of each row
        while($row = $result->fetch_assoc()) 
        {
            echo "<tr><td>".$x."</td>";
            $x++;

            echo "<td><a href='index.php?p=form_detail&cid=".$row["id"]."'>".$row['mk_tarikh_mula']." - ".$row['mk_tarikh_akhir']."</a></td>\n";   

            if ($row['kp_kelulusan'] == 1) {
                $status = 'lulus';
            }

            if ($row['kp_kelulusan'] == 0) {
                $status = 'tidak lulus';
            }
            if ($row['kp_kelulusan'] == NULL) {
                $status = 'dalam proses';
            }

            echo "<td>".$status."</td></tr>";
        }

        echo "</table>";
    }
    else {
        echo "0 results";
    }

$conn->close();
?>

</div>