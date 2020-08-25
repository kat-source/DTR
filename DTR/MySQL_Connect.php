<?php
$conn_error = 'Connection Failed';
$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = '';
$mysql_db = 'softeng';

	$conn = @mysqli_connect('localhost', 'root', '', $mysql_db);

	if(!$conn){
		die($conn_error);
	}
	
 echo 'Connection Successful';



?>