<?php
 require_once 'includes/functions.php';
 require_once 'includes/db_connection.php';
 require_once 'includes/header.php';

 if($_SERVER['REQUEST_METHOD']== 'GET'){
  $id = $_GET['id'];
  //populate field values to edit
  $sql = "SELECT * FROM students WHERE studentID = $id";
  $result = $dbc->query($sql);
  if($result){
   $row = mysqli_fetch_array($result);
   $fullname = $row['fullname'];
   $dob = $row['dob'];
   $gender = $row['gender'];
   $phone = $row['phone'];
   $email = $row['email'];
   $country = $row['country'];
   $city = $row['city'];
   $course = $row['course'];
   $photo = $row['photo'];
  }
 }

 if($_SERVER['REQUEST_METHOD']=='POST'){

 }
?>
<div class="container">
 	<h1>Add new student</h1>
 	<a href="index.php">Home</a>
       <p><?php if (isset($upload_errors)) { echo $upload_errors; } ?></p>
       <p><?php if (isset($message)) { echo $message; } ?></p>
 	<form action="" name="editStud" method="POST" enctype="multipart/form-data">
 		
 		<label for="fullname" class="form-label"> Enter the Full Name :  </label>
 		 <input type="text" name="fullname" placeholder="Full Name" class="form-control" value="<?php echo $fullname; ?>" >

 		<label for="dob" class="form-label"> Date of Birth :  </label>
 		 <input type="date" name="dob" class="form-control" value="<?php echo $dob; ?>">

 		<label for="gender" class="form-label"> select your Gender :   </label>
 		<p>Male<input type="radio" name="gender" value="male" <?php if($gender=='male'){echo "checked";} ?>></p>
 		<p>Female<input type="radio" name="gender" value="female" <?php if($gender=='female'){echo "checked";} ?>></p>
 		<p>Others<input type="radio" name="gender"value="Others" <?php if($gender=='others'){echo "checked";} ?>></p>

 		<label for="phone" class="form-label">Enter the telephone number : </label>
 		<input type="tel" name="phone" pattern="[1-9]{1}[0-9]{9}" title="Enter 10 digit mobile number"  placeholder="Mobile number" class="form-control" value="<?php echo $phone; ?>">
              
              <label for="email" class="form-label">Enter the Email : </label>
 		<input type="email" name="email" placeholder="Email" class="form-control" value="<?php echo $email; ?>">

 	       <label for="nationality" class="form-label">Nationality : </label>
              <select name="country" class="form-control" >
              <option selected>select any</option>
              <?php
               //populating a dropdown with country name
               $sql = "SELECT * FROM countries";
               if($result = $dbc->query($sql)){
                     if(mysqli_num_rows($result)>0){
                            while($row = mysqli_fetch_array($result)){
                                   $countryID = $row['countryID'];
                                   $countryName = $row['countryName'];

                                   //echo "<select name ='select'>";
                                   echo "<option value=$countryName;".">".$countryName."</option>";
                                   //echo "</select>";
                            }
                     }
               }
              ?>
              </select>

              <label for="city" class="form-label">Choose City : </label>
              <select name="city" class="form-control" >
 			<option value="<?php echo $city;?>"><?php echo $city;?></option>
 			
 		</select>

 		
 	 <label for="courses" class="form-label">Choose desired courses : </label>
        <p>
              <!-- Populating checkbox from the database-->
              <?php

              ?>
         <input type="checkbox" name="course" value="course1" value="<?php if($course==$course){echo 'checked';}?>"> Course 1
         <p>
        	
        <p>
        	<img width=150 height= 150 src="<?php echo "uploads/$photo";?>">
        </p>
        <label for="photo" class="form-label">Upload your photo</label>
        <input type="file" name="photo_upload" class="form-control">

        <p>
        	<input type="submit" name="submit" value="Add Student">
        	<input type="reset" name="" value="Clear fields">
        </p>


 	</form>
 </div>
 <?php require_once 'includes/footer.php' ; ?>