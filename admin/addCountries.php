<?php 
require_once '../includes/functions.php';
session_start();
 if(is_admin() !==TRUE){
 	redirect_to('login.php');
 }
 ?>
<?php
 //form processing
 include_once '../includes/db_connection.php';
 $message = '';
 if (isset($_POST['submit'])) {
 	$country = $_POST['country'];
 	$country = ucfirst($country);
   
    $sql ="INSERT INTO countries(countryName)VALUES('$country')";
  	if(mysqli_query($dbc,$sql)){
  		$message= "new country added successfully";
  	}else{
  		echo "Error adding new course ".$sql."<br>".mysqli_error($dbc);
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
	<p>add new countries</p>
	<p><?php if (isset($message)) { echo $message; } ?></p>

	<form class="form" action="addCountries.php" method="POST">
		<p><input type="text" name="country" placeholder="new country" required></p>
		<p><input type="submit" name="submit" value="add country" class="btn btn-primary"> &nbsp; <input type="reset" name="" value="Clear" class="btn btn-danger"></p>
	</form><br><br><hr>
	<p>All countries in database:</p>
	<table class="table table-success table-striped">
		<thead>
			<tr>
				<th>Country ID</th>
				<th>Country Name</th>
			</tr>
		</thead>
		<tbody class="table-hover ">
		 <?php
		  $sql = "SELECT * FROM countries ";
		  if($result = $dbc->query($sql)){
		  	if(mysqli_num_rows($result)>0){
		  		while($row = mysqli_fetch_array($result)){

		  			$countryID = $row['countryID'];
		  			$countryName = $row['countryName'];
		  			echo "<tr>";
		  			echo "<td>{$countryID}</td>";
		  			echo "<td>{$countryName}</td>";
		  			echo "</tr>";
		  		}
		  		echo "</tbody></table>";
		  		//free result
		  		mysqli_free_result($result);
		  	}else{
		  		echo "no courses found";
		  	}
		  }else{
		  	echo "database query failed ".mysqli_error($dbc);
		  }
		  mysqli_close($dbc);
		 ?>	
		</tbody>
	</table>
</div>

   <script type="text/javascript" src="../includes/js/bootstrap.min.js"></script>
 </body>
</html>