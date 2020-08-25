<?php 

//  $con = mysql_connect("localhost","root","","votingsystem");
//  $message = '';
//  if(mysql_error()){
//  	$message = mysql_error();
//  	echo 'Something\'s Wrong';
//  	echo $message;
//  }
//  else{
//  	echo 'Connection Made on con';
//  }
	
 // 	$con = mysql_connect("$IP","root","");
	// mysql_select_db("restaman",$con) or die(mysql_error($con));
	
	// error_reporting(E_ALL ^ E_NOTICE);
	// error_reporting(E_ALL ^ E_DEPRECATED);
	// phpinfo();

$IP = "localhost";
$uname = "root";
$pword = "";
$dbase = "dtr";
 
$con = new mysqli($IP, $uname, $pword ,$dbase);

if($con->connect_errno > 0){
	
    die('Unable to connect to database [' . $con->connect_error . ']'); 
}
else{
	// echo "connected";
}
if (!function_exists('strcomma')) {
    // ... proceed to declare your function

	function strcomma($str){

		$str = str_split($str);
		// print_r($str);
		$l = count($str);
		$i=0;
		$ss = '';
		while($i<$l){
			$ss =$ss.$str[$i].',';
			$i++;
		}
		// echo $ss;
		$ss = substr($ss, 0, strlen($ss)-1);
		return $ss;
	}
}

if (!function_exists('diff')) {
	function diff($date1, $date2){
		return abs((strtotime($date1) - strtotime($date2))/60);
	}
}

if (!function_exists('reqs')) {
	function reqs($eid){

		$str = strcomma($eid);
		$strarr = explode(",", $str);
		$return = '';
		foreach ($strarr as  $value) {
			if($value==1){
				$return = $return."First Years<br>";
			}
			else if($value==2){
				$return = $return."Second Years<br>";
			}
			else if($value==3){
				$return = $return."Third Years<br>";
			}
			else{
				$return = $return."Fourth Years<br>";
			}
		}

		return $return;
		
	}
}


// $theIP = "http://192.168.43.53/RestoFinder";


// $ftp_conn = ftp_connect($IP) or die("Could not connect to $IP");
// $ftp_username = "ftp_admin";
// $ftp_userpass = "adminftpserver";
// $login = ftp_login($ftp_conn, $ftp_username, $ftp_userpass);

// function 

// if(!$_FILES==''){
// 	echo "ok";
// 	echo "<br>";
// 	print_r($_FILES);

// 	if(ftp_put($ftp_conn, $_FILES["resFile"]["name"], $_FILES["resFile"]["tmp_name"], FTP_BINARY)){
// 		echo "naisu";
// 	}
// 	else{
// 		("nuuuu");
// 	}
// }
 //  $con2 = mysql_connect("localhost","root","","votingsystem");
 // $message2 = '';
 // if(mysql_error()){
 // 	$message2 = mysql_error();
 // 	echo 'Something\'s Wrong';
 // 	echo $message2;
 // }
 // else{
 // 	echo 'Connection Made on con2';
 // }

 ?>