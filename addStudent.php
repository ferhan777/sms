<?php 
require_once 'includes/header.php' ; 
include_once 'includes/db_connection.php';
?>
<?php
 $upload_errors = '';
 /*Form processing*/
  if (isset($_POST['submit'])) {
       //print_r($_FILES); die();
       
  	$fullname = $_POST['fullname'];
       $dob =$_POST['dob'];
       $gender = $_POST['gender'];
       $phone = $_POST['phone'];
       $email = $_POST['email'];
       $country = $_POST['country'];
       $city = $_POST['city'];
       //$courseID = $_POST['course'];
       $course = 'course1';

       //process file upload
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES['photo_upload']['name']);
        $image_type = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $upload_ok = false;
        $photo = $_FILES['photo_upload']['name'];

        //check the file type
        $check = getimagesize($_FILES['photo_upload']['tmp_name']);
        if($check == false){
              echo "file is not an image";
        }elseif($image_type != "jpg" && $image_type != "png" && $image_type != "jpeg"){
            echo "only JPG,PNG and JPEG is allowed";  
        }else{
              $upload_ok = true;
        }

        if($upload_ok==true){
         move_uploaded_file($_FILES["photo_upload"]["tmp_name"], $target_file);
        }

        //inserting to database and then uploading the file

        $sql = "INSERT INTO students(fullname,dob,gender,phone,email,country_id,city,course,photo) VALUES('$fullname','$dob','$gender','$phone','$email',$country,'$city','$course','$photo') ";
       if(mysqli_query($dbc,$sql)){
              $message= "new student added successfully";
       }else{
              echo "Error adding new student <br> ".$sql."<br>".mysqli_error($dbc);
       }       

       

       
  }
?>
 <div class="container">
 	<h1>Add new student</h1>
 	<a href="index.php">Home</a>
       <p><?php if (isset($upload_errors)) { echo $upload_errors; } ?></p>
       <p><?php if (isset($message)) { echo $message; } ?></p>
 	<form action="addStudent.php" method="POST" enctype="multipart/form-data">
 		
 		<label for="fullname" class="form-label"> Enter the Full Name :  </label>
 		 <input type="text" name="fullname" placeholder="Full Name" class="form-control" >

 		<label for="dob" class="form-label"> Date of Birth :  </label>
 		 <input type="date" name="dob" class="form-control" >

 		<label for="gender" class="form-label"> select your Gender :   </label>
 		<p>Male<input type="radio" name="gender" value="male"></p>
 		<p>Female<input type="radio" name="gender" value="female"></p>
 		<p>Others<input type="radio" name="gender"value="Others"></p>

 		<label for="phone" class="form-label">Enter the telephone number : </label>
 		<input type="tel" name="phone" pattern="[1-9]{1}[0-9]{9}" title="Enter 10 digit mobile number"  placeholder="Mobile number" class="form-control">
              
              <label for="email" class="form-label">Enter the Email : </label>
 		<input type="email" name="email" placeholder="Email" class="form-control" >

 	       <label for="nationality" class="form-label">Nationality : </label>
              <select name="country" class="form-control" >
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
              </select>

              <label for="city" class="form-label">Choose City : </label>
              <select name="city" class="form-control" >
 			<option selected>None</option>
 			<option value="city1">city 1</option>
 			<option value="city2">city 2</option>
 			<option value="city3">city 3</option>
 			<option value="city4">city 4</option>
 		</select>

 		
 	 <label for="courses" class="form-label">Choose desired courses : </label>
        <p>
              <!-- Populating checkbox from the database-->
              <?php

              ?>
         <input type="checkbox" name="course[]" value="course1"> Course 1
         <p>
        	

        <label for="photo" class="form-label">Upload your photo</label>
        <input type="file" name="photo_upload" class="form-control">

        <p>
        	<input type="submit" name="submit" value="Add Student">
        	<input type="reset" name="" value="Clear fields">
        </p>


 	</form>
 </div>
 <?php require_once 'includes/footer.php' ; ?>