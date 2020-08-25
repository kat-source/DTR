<?php 
require "connect.php";



$madd = $_POST["MacAddress"];
$sid = $_POST['sid'];
$lname =$_POST['lname'];
$fname =$_POST['fname'];
$mname =$_POST['mname'];
$ylevel =$_POST['ylevel'];


$sql = "SELECT * from student_info where MacAddress LIKE '$madd'";
$result = $con->query($sql);
$chk = $result->fetch_assoc();

$sql2 = "SELECT * from student_info where Student_ID LIKE '$sid' AND MacAddress is not null";
$result2 = $con->query($sql2);
$chk2 = $result2->fetch_assoc();

$sql3 = "SELECT * from student_info where Student_ID LIKE '$sid' AND MacAddress is null or MacAddress =''";
$result3 = $con->query($sql3);
$chk3 = $result3->fetch_assoc();

if (isset($chk)){
	$response["success"] = 0;
	$response["message"] ="This device is already registered";

	echo json_encode($response);
	echo "This device is already registered";
}
else if (isset($chk2)) {
	$response["success"] = 0;
	$response["message"] ="You already have another device registered.\n Only one device per student is allowed.";

	echo json_encode($response);
	echo "Only one device per student is allowed.";
}
else if (isset($chk3)) {
	$query2 = "UPDATE `student_info` SET MacAddress = '$madd'
	WHERE Student_ID = '$sid';";

$check2 =  $con->query($query2);


if ($check2) {
	$response["success"] = 1;
	$response["message"] = "Device MacAddress Recorded";

	echo json_encode($response);
	echo "Device MacAddress Recorded";

}else{ 
	$response["success"] = 0;
	$response["message"] ="An error occured";

	echo json_encode($response);
	echo "Error: " .$query2 . "<br>" .$con->error;
}
}
else{

$query1 = "INSERT INTO `student_info`(Student_ID, Student_LName, Student_FName, Student_MName, Student_YearLevel, MacAddress) 
				VALUES ('$sid', '$lname', '$fname', '$mname', '$ylevel', '$madd');";

$check =  $con->query($query1);


if ($check) {
	$response["success"] = 1;
	$response["message"] = "Sucessfully registered";

	echo json_encode($response);
	echo "Sucessfully registered";
}else{ 
	$response["success"] = 0;
	$response["message"] ="An error occured";

	echo json_encode($response);
	echo "Error: " .$query1 . "<br>" .$con->error;
}
}
$con->close();

?>

