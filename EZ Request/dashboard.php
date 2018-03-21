<?php 
if (!isset($_SESSION ["logged_id"])){
    header("Location: login.php");
    die();
  }

?>

<!DOCTYPE html>
<html>
<head>
<title>EZ Request</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="admin.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,600,400italic,600italic,700' rel='stylesheet' type='text/css'>
</head>

<div id="box" >
    <div class="box-top"><h1>PORTFOLIO</h1></div>
			
			<div class="box-panel" >
                          <h3>ORGANIZATION'S PROFILE</h3>
                          Name of organization: Mitechsoft Resources Sdn. Bhd.<br>
                          Website : http://www.mitechsoft.com/<br>
                          Business main function: <br><br>
<ul>
            <li>System Integration</li>
                              <li>IT Solutions, Consultancy &amp; Advisor</li>
            <li>Maintenance and Support Services</li>
            <li>IT training and Education</li>
            </ul>
                        </div>
                    </div>
                </div>
			</div>
                <!-- END SINGLE SERVICE -->