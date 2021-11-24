<?php 
require_once '../includes/functions.php'; 
session_start();
 if(is_admin() !==TRUE){
 	redirect_to('login.php');
 }
?>

<?php
 include_once '../includes/db_connection.php';
 $message = '';
 //form processing to add new course
  if (isset($_POST['submit'])) {
  	$course = $_POST['new_course'];

  	$sql ="INSERT INTO courses(courseName)VALUES('$course')";
  	if(mysqli_query($dbc,$sql)){
  		$message= "new course added successfully";
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
	<p>add new course</p>
    <p><?php if (isset($message)) {
    	echo $message;
    } ?></p>
	<form action="addCourse.php" method="POST">
		<input type="text" name="new_course" placeholder="new course" required>
		<input type="submit" name="submit" value="add new course">
	</form><br><br>
     <hr>

	<p>All courses are in the following :</p>
	<table class="table table-success table-striped">
		<thead>
			<tr>
				<th>Course ID</th>
				<th>Course Name</th>
			</tr>
		</thead>
		<tbody class="table-hover ">
		 <?php
		  $sql = "SELECT * FROM courses ";
		  if($result = $dbc->query($sql)){
		  	if(mysqli_num_rows($result)>0){
		  		while($row = mysqli_fetch_array($result)){

		  			$courseID = $row['courseID'];
		  			$courseName = $row['courseName'];
		  			echo "<tr>";
		  			echo "<td>{$courseID}</td>";
		  			echo "<td>{$courseName}</td>";
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
<?php require_once '../includes/footer.php' ?>