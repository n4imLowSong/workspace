<?php session_start(); 
if (!isset($_SESSION ["logged_id"])){
    header("Location: login.php");
    die();
  }


function isSelected ($p){

  if (@$_GET['p'] == $p) {
    return "class='selected'";
  }

  else {
    return "href='index.php?p=$p'";
  }

}

function setRead ($id,$cid){

  include 'conn_ezr.php';
  $sql = "SELECT is_read FROM cuti WHERE id='$cid' ";
  $result = mysqli_query($conn, $sql);
  $row = $result->fetch_assoc();

  $current_value=$row['is_read'];

  if (strlen($current_value) == 0 ) {
    $new_value=",".$id.",";
  }
  else{
    $new_value="$current_value$id".",";
  }

  $sql = "UPDATE cuti SET is_read='$new_value' WHERE id='$cid'";
  $result = mysqli_query($conn, $sql);

}

include 'conn_ezr.php';
$index_id=$_SESSION['logged_id'];
$search = ",".$index_id.",";
$sql = "SELECT COUNT(*) AS num_rows FROM cuti WHERE is_read NOT LIKE '%$search%' AND mp_uid='$index_id' ";
$result = mysqli_query($conn, $sql);
$row = $result->fetch_assoc();

$jabatan = $_SESSION["jabatan"];
$sql = "SELECT COUNT(*) AS num_rows FROM cuti INNER JOIN users ON cuti.mk_uid=users.id WHERE users.jabatan='$jabatan' AND cuti.mp_pengesahan = 1 AND is_read NOT LIKE '%$search%'";
$result = mysqli_query($conn, $sql);
$row2 = $result->fetch_assoc();

$sql = "SELECT COUNT(*) AS num_rows FROM users INNER JOIN cuti ON users.id=cuti.mk_uid WHERE is_read NOT LIKE '%$search%'";
$result = mysqli_query($conn, $sql);
$row3 = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html>
<head>
<title>EZ Request</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" media="print" type="text/css" href="print.css">
<link rel="stylesheet" media="screen" type="text/css" href="admin.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,600,400italic,600italic,700' rel='stylesheet' type='text/css'>
</head>

<body class="align" background="Media/automa.jpg" alt="Mitech BG" style="background-repeat: no-repeat; background-size:100% 100%;">

<div id="header">

  <div class="logo">
    <a href="#">EZ<span> Request&nbsp;</span></a>
    <img src="Media/logomitech-2016-trans-.png" alt="Mitech Logo" style="float:right;width:110px;height:40px">
  </div>

  <div class="logo-2"> 
        <img src="http://grafreez.com/wp-content/temp_demos/river/img/admin-bg.jpg" >
         <div class="rank-label-container">
               <span class="rank-label"><?php echo $_SESSION["username"] ?></span>
         </div>
        <a href="index.php?p=user_profile"></a>

  </div>
 </div>
</div>

<a class="mobile">MENU</a>

<div id="container">

  <div class="sidebar">
    <ul id="nav">
      <li><a <?php echo isSelected('dashboard'); ?> >Dashboard</a></li>
      <li><a <?php echo isSelected('user_profile'); ?> >User Profile</a></li>
      <?php if ($_SESSION['logged_id'] == 1){
            echo "<li><a ".isSelected('add_user').">Add User</a></li>";
            echo "<li><a ".isSelected('user_list').">User List</a></li>";
            } else {
                echo "<li><a ".isSelected('borang_cuti').">Leave Request Form</a></li>";
                echo "<li><a ".isSelected('form_list')."> Leave Request History</a></li>";
                echo "<li><a ".isSelected('senarai_pengganti')."> <span>Replacement</span><span style='background-color:red; float:right; padding:0px 7.5px 0px 7.5px; border-radius: 100%; '> ".$row['num_rows']."<span></a></li>";
              }
      ?>
        <?php if ($_SESSION['logged_id'] >=2 && $_SESSION['logged_id'] <=5 ){
              echo "<li><a ".isSelected('senarai_sokongan')."><span>Supervisor Support</span><span style='background-color:red; float:right; padding:0px 7.5px 0px 7.5px; border-radius: 100%; '> ".$row2['num_rows']."<span></a></li>";
            } 

        ?>
           <?php if ($_SESSION['logged_id'] >=1 && $_SESSION['logged_id'] <=3 ){
                 echo "<li><a ".isSelected('senarai_rekod')."><span>Employee Leave Approval</span><span style='background-color:red; float:right; padding:0px 7.5px 0px 7.5px; border-radius: 100%; '> ".$row3['num_rows']."<span></a></li>";
                 }
           ?>
      <li><a href="logout0.php">Logout</a></li>
      

    </ul>
    
  </div>

  <div class="content">

    <!--
    <h1>Dashboard</h1>
    <p><?php echo $_SESSION['logged_id'] ?> Here you can do stuff</p>

    <div id="box">
     <div class="box-top">News</div>
     <div class="box-panel">Lorem nes stuf</div>
 
    </div>

   <div id="box">
     <div class="box-top">News</div>
     <div class="box-panel">Lorem nes stuf</div>
    </div>


    <div id="box">
     <div class="box-top">News</div>
     <div class="box-panel">Lorem nes stuf</div>
    </div>-->


<?php

if (isset($_GET['p'])) {
$p=$_GET['p'].".php";
include $p ;

}
else {

include "user_profile.php" ;
}






/*
switch ($p) {
    case "user_profile":
        $p=$p.".php";
        include $p ;
        break;
    case "user_list":
        $p=$p.".php";
        include $p ;
        break;
    case "green":
        echo "Your favorite color is green!";
        break;
    default:
        echo "Your favorite color is neither red, blue, nor green!";
}
*/

?>

</div>


</div><!-- #container -->

<script type="text/javascript">

	$(document).ready(function(){
     $("a.mobile").click(function(){
      $(".sidebar").slideToggle('fast');
     });

    window.onresize = function(event) {
      if($(window).width() > 480){
      	$(".sidebar").show();
      }
    };


	});

</script>

</body>
</html>