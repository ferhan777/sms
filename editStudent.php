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
   $studentID = $_POST['studId'];
   $fullname = $_POST['fullname'];
   $dob=$_POST['dob'];
   $gender = $_POST['gender'];
   $phone = $_POST['phone'];
   $email = $_POST['email'];
   $country = $_POST['country'];
   $city = $_POST['city'];
   $course = $_POST['course'];
   $fullname = $_POST['fullname'];

   //file upload
   $target_dir = "uploads/";
   $target_file = $target_dir . basename($_FILES['photo_upload']['name']);
   $image_type = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
   $upload_ok = false;
   $photo = $_FILES['photo_upload']['name'];
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

    //update database
    $sql = "UPDATE students SET fullname='$fullname',dob='$dob',gender='$gender',phone='$phone',email='$email',country='$country',city='$city',course='$course',photo='$photo' WHERE studentID=$studentID ";

       if(mysqli_query($dbc,$sql)){
              $message= "new student added successfully";
       }else{
              echo "Error adding new student <br> ".$sql."<br>".mysqli_error($dbc);
       } 
 }
?>
<div class="container">
 	<h1>Edit student</h1>
 	<a class="btn btn-primary" href="index.php">Home</a>
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

                                   //echo "<select name ='country'>";
                                   echo "<option value=$countryName".">".$countryName."</option>";
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
               $sql2= "SELECT * FROM courses";
               if($result2 = $dbc->query($sql2)){
                 if(mysqli_num_rows($result2)>0){
                    while ($row = mysqli_fetch_array($result2)) {
                        $courseName = $row['courseName'];
                        $courseID = $row['courseID'];
                        echo "<input type=\"checkbox\" name=\"course\" value=\"$courseName\"> $courseName"."&nbsp;";
                    }
                 }
               }

              ?>
         <input type="checkbox" name="course" value="course1" value="<?php if($course==$course){echo 'checked';}?>"> Course 1
         <p>
        	
        <p>
        	<img width=150 height= 150 src="<?php echo "uploads/$photo";?>">
        </p>
        <label for="photo" class="form-label">Upload your photo</label>
        <input type="file" name="photo_upload" class="form-control">

        <p>
        	<input class="btn btn-success" type="submit" name="submit" value="Add Student">
        	<input class="btn btn-danger" type="reset" name="" value="Clear fields">
        	<input type="hidden" name="studId" value="<?php echo $id;?>">
        </p>


 	</form>
 </div>
 <?php require_once 'includes/footer.php' ; ?>