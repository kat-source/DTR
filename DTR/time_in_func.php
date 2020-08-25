<?php



  include ("connect.php");
	extract($_POST);
$run1= $con->query("INSERT into time_log(sid, timestamp) values(\"$user_idnum\", current_TimeStamp);");
	

						if($run1==true)
								 {
								    echo '<script language="javascript">';
								    echo 'alert("Successfully Added")';
								    echo '</script>';
								    echo '<meta http-equiv="refresh" content="0;url=index.php" />';
								 }else {
			die('Invalid query: ' . mysqli_error());
			}



?>