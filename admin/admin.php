<?php
 session_start();
 require_once '../includes/functions.php';
 if(is_admin()==TRUE){
 	$username = $_SESSION['username'];
 }

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
   <h1>admin panel</h1>
   <p>Welcome Mr/Mrs : <?php echo $username;?> &nbsp;&nbsp; <a class="btn btn-danger" href="logout.php">Logout</a></p>
   <p><a class="btn btn-primary" href="../index.php">Home</a></p>
   <p><a class="btn btn-success" href="addCourse.php">Add new course</a></p>
   <p><a class="btn btn-info" href="addCountries.php">Add countries</a></p>
   <p><a class="btn btn-warning" href="addCities.php">Add Cities for each country</a></p>
   </div>

</body>
</html>