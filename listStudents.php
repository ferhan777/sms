<?php 
require_once 'includes/header.php' ;
require_once 'includes/db_connection.php';
?>

 <div class="container">
 	<h1>All students are here</h1>
 	<a href="index.php">Home</a>

    <table class="table table-success table-striped">
        <thead>
            <tr>
                <thead>
                    <th>StudentId</th>
                    <th>Full Name</th>
                    <th>DOB</th>
                    <th>Gender</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Nationality</th>
                    <th>City</th>
                    <th>Courses</th>
                    <th>Photo</th>
                    <th>Edit Student</th>
                    <th>Delete Student</th>
                </thead>
            </tr>
        </thead>
        <tbody class = table-hover>
        <?php 
         // Populating the table
          $sql = "SELECT * FROM students";
          if($result = $dbc->query($sql)){
            if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_array($result)){

                    $studentID = $row['studentID'];
                    $fullname = $row['fullname'];
                    $dob = $row['dob'];
                    $gender = $row['gender'];
                    $phone = $row['phone'];
                    $email = $row['email'];
                    $country = $row['country'];
                    $city = $row['city'];
                    $course = $row['course'];
                    $photo = $row['photo'];
                    echo "<tr>";
                    echo "<td>{$studentID}</td>";
                    echo "<td>{$fullname}</td>";
                    echo "<td>{$dob}</td>";
                    echo "<td>{$gender}</td>";
                    echo "<td>{$phone}</td>";
                    echo "<td>{$email}</td>";
                    echo "<td>{$country}</td>";
                    echo "<td>{$city}</td>";
                    echo "<td>{$course}</td>";
                    ?>

                    <td><img width=150 height= 150 src="<?php echo "uploads/$photo";?>"></td>";

                    <?php 

                    echo "<td><a class=\"btn btn-success\" href=\"editStudent.php?id=$studentID\">"."Edit"."</a></td>";
                    ?>
                    <td><a  href="<?php echo "deleteStudent.php?id=$studentID"?>" class="btn btn btn-danger" onclick="javascript: return confirm('Please confirm deletion');">Delete</a></td>
                <?php } 
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
 <?php require_once 'includes/footer.php' ; ?>