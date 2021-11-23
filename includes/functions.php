<?php


function redirect_to($location){
    header("location:{$location}");
    exit();
}

 function is_admin(){
 	if(!isset($_SESSION['username'])){
 		redirect_to('login.php');
 	}else{
 		return true;
 	}
 }


function admin_login(){

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $username = stripcslashes($username);
        $password = stripcslashes($password);
        //$username = mysql_real_escape_string($username);
        //$password = mysql_real_escape_string($password);
        
        require_once 'db_connection.php'; //accessing the database connection
        $sql ="SELECT * FROM users WHERE username='$username' ";
        $result = $dbc -> query($sql);
        $row = $result->fetch_assoc();
        
        if(isset($row['username'])){
            session_start();
            $_SESSION['username'] = $username;
            redirect_to('admin.php');
        }else{
            echo 'user not found';
        }
      
        
    }
}    




?>