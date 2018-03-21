<?php

if (isset($_SESSION["logged_id"])) 
{
    if ( !($_SESSION["logged_id"] >=1 && $_SESSION['logged_id'] <=3) )
    {
        header("Location: index.php?p=dashboard");
    }   
}
else {
    header("Location: index.php?p=dashboard");
}

?>

<title>Senarai Sokongan</title>


<div id="box">
<div class="box-top"><h1>Senarai Rekod Cuti</h1></div>

<div class="box-panel">
<?php  

include 'conn_ezr.php';

$id=$_SESSION['logged_id'];
$sql = "SELECT * FROM users INNER JOIN cuti ON users.id=cuti.mk_uid";
$result = mysqli_query($conn, $sql);
$x = 1;

//$sql = "SELECT * FROM users WHERE id=$id" ;
//$result = mysqli_query($conn, $sql);
//$row2 = $result->fetch_assoc();


if ($result->num_rows > 0) {
    echo "<table class='list' border='1px'><tr><th>Bil.</th><th>Nama</th><th>Username</th><th>Tarikh Ganti</th><th>Status</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) 
    {
        echo "<tr><td>".$x."</td>";
        $x++;
        echo "<td>".$row['nama']."</td><td>".$row['username']."</td><td><a href='index.php?p=rekod_cuti&cid=".$row["id"]."'>".$row['mk_tarikh_mula']." - ".$row['mk_tarikh_akhir']."</a></td>\n";

        

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
