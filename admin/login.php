<?php
 require_once "../includes/functions.php";

 //if (isset($_POST['submit'])) {
 	//$username = $_POST['username'];
 	//$password = $_POST['password'];
 	admin_login();

 //}
?>
<div>
	<p>admin log in</p>
	<form action="" method="POST">
		<p><input type="text" name="username" placeholder="Enter Username"></p>
		<p><input type="password" name="password" placeholder=" Enter password"></p>
		<p><input type="submit" name="submit" value="login"> &nbsp;<input type="reset" name="" value="Clear"></p> 
	</form>
</div>