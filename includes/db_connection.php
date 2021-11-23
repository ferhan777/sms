<?php
 $host = 'localhost';
 $user = 'root';
 $password = 'root';
 $database = 'sms';

 //creating database connection
 $dbc = new Mysqli($host,$user,$password,$database);

 if($dbc -> connect_errno){
 	echo "database connection failed : ". $dbc -> connect_error;
 	exit();
 }
?>