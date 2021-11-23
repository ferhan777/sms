<?php require_once 'includes/header.php' ; ?>
<?php
 /*Form processing*/
  if (isset($_POST['submit'])) {
  	print_r($_POST);
  }
?>
 <div class="container">
 	<h1>Add new student</h1>
 	<a href="index.php">Home</a>
 	<form action="addStudent.php" method="POST">
 		
 		<label for="fullname" class="form-label"> Enter the Full Name :  </label>
 		 <input type="text" name="fullname" placeholder="Full Name" class="form-control" required>

 		<label for="dob" class="form-label"> Date of Birth :  </label>
 		 <input type="date" name="dob" class="form-control" required>

 		<label for="gender" class="form-label"> select your Gender :   </label>
 		<p>Male<input type="radio" name="gender" value="male"></p>
 		<p>Female<input type="radio" name="gender" value="female"></p>
 		<p>Others<input type="radio" name="gender"value="Others"></p>

 		<label for="phone" class="form-label">Enter the telephone number : </label>
 		<input type="tel" name="mobile" pattern="[1-9]{1}[0-9]{9}" title="Enter 10 digit mobile number" required placeholder="Mobile number" class="form-control">
              
              <label for="email" class="form-label">Enter the Email : </label>
 		<input type="email" name="email" placeholder="Email" class="form-control" required>

 	       <label for="nationality" class="form-label">Nationality : </label>
              <select name="nationality" class="form-control">
                     <option selected>None</option>
                     <option value="nation1">nation 1</option>
                     <option value="nation2">nation 2</option>
                     <option value="nation3">nation 3</option>
                     <option value="nation3">nation 4</option>
              </select>

              <label for="city" class="form-label">Choose City : </label>
              <select name="city" class="form-control" required>
 			<option selected>None</option>
 			<option value="city1">city 1</option>
 			<option value="city2">city 2</option>
 			<option value="city3">city 3</option>
 			<option value="city4">city 4</option>
 		</select>

 		
 	 <label for="courses" class="form-label">Choose desired courses : </label>
        <p><input type="checkbox" name="course[]" value="course1"> Course 1<p>
        <p><input type="checkbox" name="course[]" value="course2"> Course 2<p>
        <p><input type="checkbox" name="course[]" value="course3"> Course 3<p>	
        
        <label for="photo" class="form-label">Upload your photo</label>
        <input type="file" name="photo" class="form-control">

        <p>
        	<input type="submit" name="submit" value="Add Student">
        	<input type="reset" name="" value="Clear fields">
        </p>


 	</form>
 </div>
 <?php require_once 'includes/footer.php' ; ?>