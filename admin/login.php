<?php
 require_once "../includes/functions.php";

 //if (isset($_POST['submit'])) {
 	//$username = $_POST['username'];
 	//$password = $_POST['password'];
 	admin_login();

 //}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../includes/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<p>admin log in</p>
	<form action="" method="POST">
		<p><input type="text" name="username" placeholder="Enter Username"></p>
		<p><input type="password" name="password" placeholder=" Enter password"></p>
		<p><input class="btn btn-success" type="submit" name="submit" value="login"> &nbsp;<input class="btn btn-danger" type="reset" name="" value="Clear"></p> 
	</form>
</div>
   <script type="text/javascript" src="../includes/js/bootstrap.min.js"></script>
 </body>
</html>