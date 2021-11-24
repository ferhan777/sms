<?php
 session_start();
  require_once '../includes/functions.php';
 if(is_admin() !==TRUE){
 	redirect_to('login.php');
 }
 
 //form processing
 include_once '../includes/db_connection.php';
 $message = '';

?>
<?php
 //form processing
  if (isset($_POST['submit'])) {
  	//print_r($_POST); die();
  	$city = $_POST['city'];
  	$cId = $_POST['countryID'];

  	$sql ="INSERT INTO cities(cityName,CountryID)VALUES('$city',$cId)";
  	if(mysqli_query($dbc,$sql)){
  		$message= "new city added successfully";
  	}else{
  		echo "Error adding new City ".$sql."<br>".mysqli_error($dbc);
  	}

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
	<p><a href="admin.php">Home</a></p>
	
	<p><?php if (isset($message)) { echo $message; } ?></p>

	<form class="form" action="addCities.php" method="POST">
		<p>Select a country first</p>
		<select name="countryID">
		<?php

		
		 //populating a dropdown with country name
		 $sql = "SELECT * FROM countries";
		 if($result = $dbc->query($sql)){
		 	if(mysqli_num_rows($result)>0){
		 		while($row = mysqli_fetch_array($result)){
		 			$countryID = $row['countryID'];
		 			$countryName = $row['countryName'];

		 			//echo "<select name ='select'>";
		 			echo "<option value=".$countryID.">".$countryName."</option>";
		 			//echo "</select>";
		 		}
		 	}
		 }
		?>
		</select><br><br>
		<p><input type="text" name="city" placeholder="new city" required></p>
		<p><input type="submit" name="submit" value="add City" class="btn btn-primary"> &nbsp; <input type="reset" name="" value="Clear" class="btn btn-danger"></p>
	</form>
	

</div>

   <script type="text/javascript" src="../includes/js/bootstrap.min.js"></script>
 </body>
</html>