<?php session_start(); 
 if (isset($_SESSION ["logged_id"])){
  header("Location: user_dashboard.php");
  die();
 }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF=8">
<title>Title of the document</title>
<link rel="stylesheet" type="text/css" href="login.css">
</head>

<body class="align" background="Media/automa.jpg" alt="Mitech BG">

<div class="login-page">
  <div class="form">
    <form class="register-form" action="signup.php" method="POST">
      <input type="text" name="uid" placeholder="username"/>
      <input type="password" name="pwd" placeholder="password"/>
      <input type="text" name="email" placeholder="email address"/>
      <button>create</button>
      <p class="message">Already registered? <a href="#">Sign In</a></p>
    </form>
    <form class="login-form" action="login0.php" method="POST">
      <img src="Media/logomitech-2016-trans-.png" alt="Mitech Logo">
      <input type="text" name="username" placeholder="username"/>
      <input type="password" name="pass" placeholder="password"/>
      <button>login</button>
      <!--<p class="message">Not registered? <a href="#">Create an account</a></p>-->
    </form>
  </div>
</div>

      <script src="stopExecutionOnTimeout.js"></script>

    <script src='jquery.min.js'></script>

<script src="login.js"></script>
	
</body>





</html>