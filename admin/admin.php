<?php
 session_start();
 require_once '../includes/functions.php';
 if(is_admin()==TRUE){
 	$username = $_SESSION['username'];
 }

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>admin panel</title>
</head>
<body>
   <h1>admin panel</h1>
   <p>Welcome Mr/Mrs : <?php echo $username;?> &nbsp;&nbsp; <a href="logout.php">Logout</a></p>
   <p><a href="../index.php">Home</a></p>
   <p><a href="addCourse.php">Add new course</a></p>
   <p><a href="addCountries.php">Add countries</a></p>
   <p><a href="addCities.php">Add Cities for each country</a></p>
   

</body>
</html>