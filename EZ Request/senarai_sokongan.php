<?php 

if(!isset($_SESSION["logged_id"]))
{
    header ("location: index.php");
    die();
}

?>

<title>Senarai Sokongan</title>

<div id="box">
<div class="box-top"><h1>Senarai Sokongan</h1></div>

<div class="box-panel">
<?php  

include 'conn_ezr.php';

$jabatan = $_SESSION["jabatan"];
$id=$_SESSION['logged_id'];
//kne gune function INNER JOIN dgn ganti nama table cuti row 'id' ke 'cid'
$sql = "SELECT *, cuti.id as cid FROM cuti INNER JOIN users ON cuti.mk_uid=users.id WHERE users.jabatan='$jabatan' AND cuti.mp_pengesahan = 1;";
$result = mysqli_query($conn, $sql);
$x = 1;


if ($result->num_rows > 0) {
    echo "<table class='list' border='1px'><tr><th>num.</th><th>Tarikh Ganti</th><th>Status</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) 
    {

         if (strpos($row['is_read'], ','.$id.',') !== false ) {
            $class="is_read1";
        }
        else {
            $class="is_read0";
        }
        echo "<tr><td>".$x."</td>";
        $x++;
        echo "<td class='".$class."'><a href='index.php?p=sokongan&cid=".$row["cid"]."'>".$row['mk_tarikh_mula']." - ".$row['mk_tarikh_akhir']."</a></td>\n";

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
} else {
    echo "0 results";
}
$conn->close();
?>

</div>