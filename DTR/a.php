<?php 
	session_start();
	include ("connect.php");
	if(isset($_POST['Submit'])){
		echo "locate";
		if($_POST['Submit']==='Save Employee Info'){
			$sid = $_POST['sid'];
			$lname =$_POST['name'];
			$fname =$_POST['salary'];
			$mname =$_POST['phone'];
			$ylevel =$_POST['dept_no'];

			$result = $con->query("INSERT INTO `employees`(`sid`, `name`, `salary`, `phone`, `dept_no`) 
				VALUES (\"$sid\",\"$lname\",\"$fname\",\"$mname\",\"$ylevel\");");
			echo "INSERT INTO `employees`(`sid`, `name`, `salary`, `phone`, `dept_no`) 
				VALUES (\"$sid\",\"$lname\",\"$fname\",\"$mname\",\"$ylevel\");";
			if (!$result) {
			die('Invalid query: ' . mysqli_error());
			}

		
		}
		else if($_POST['Submit']==='Save Department'){
			$dept =$_POST['dept_name'];
			$budget =$_POST['dept_budget'];

			
			$result = $con->query("INSERT INTO `dept_info`( `dept_name`, `dept_budget`) 
				VALUES (\"$dept\",\"$budget\");");
				
			if (!$result) {
			die('Invalid query: ' . mysqli_error());
			}
		}


			else if($_POST['Submit']==='Save Child Info'){
			$name =$_POST['name'];
			$age =$_POST['age'];
			$parentID =$_POST['sid'];

			
			$result = $con->query("INSERT INTO `children`( `name`, `age`, `sid`) 
				VALUES (\"$name\",\"$age\",\"$parentID\");");
				
			if (!$result) {
			die('Invalid query: ' . mysqli_error());}


		}
		else if($_POST['Submit']==='Save Changes Employee Details'){
			
			$sid = $_POST['sid'];
			$lname =$_POST['name'];
			$fname =$_POST['salary'];
			$mname =$_POST['phone'];
			$ylevel =$_POST['dept_no'];


			$result = $con->query("UPDATE `employees` SET 
				`sid` = \"$sid\",  
				`name` = \"$lname\", 
				`salary` = \"$fname\", 
				`phone = \"$mname\",
				`dept_no` = \"$ylevel\"
				where sid = \"$id\"");
				
				echo "UPDATE `employees` SET 
				`sid` = \"$sid\",  
				`name` = \"$lname\", 
				`salary` = \"$fname\", 
				`phone = \"$mname\",
				`dept_no` = \"$ylevel\"
				where sid = \"$id\"";
			
			if (!$result) {
			die('Invalid query: ' . mysqli_error());
			}
		}
		}
		else if($_POST['Submit']==='Save Changes to Event Details'){
			$id = $_GET['id'];
			$ename = $_POST['ename'];
			$venue =$_POST['venue'];
			$dateStart =$_POST['dateStart'];
			$dateEnd =$_POST['dateEnd'];
			$result = $con->query("UPDATE `event_info` SET 
				`Event_Name` = \"$ename\", 
				`Venue_ID` = \"$venue\",
				`dateStart` = \"$dateStart\", 
				`dateEnd` = \"$dateEnd\" 
				where `Event_ID` = \"$id\";");
			
			echo "UPDATE `event_info` SET 
				`Event_Name` = \"$ename\", 
				`Venue_ID` = \"$venue\",
				`dateStart` = \"$dateStart\", 
				`dateEnd` = \"$dateEnd\" 
				where `Event_ID` = \"$id\";";
			if (!$result) {
			die('Invalid query: ' . mysqli_error());
			}
		}
	

	if(isset($_GET['action'])){

		if($_GET['action']==='mo'){
			echo "action";
			echo $id = $_GET['id'];
			// echo "INSERT INTO `officers`(`Student_ID`) 
			// 	VALUES (\"$_GET['id']\");";
			$result = $con->query("INSERT INTO `officers`(`Student_ID`) 
				VALUES (\"$id\")");
			// -- echo "INSERT INTO `officers`(`Student_ID`) VALUES (\"$id\");";
			// if (!$result) {
			// die('Invalid query: ' . mysqli_error());
			// }
		}
		else if($_GET['action']==='ro'){
			echo "action";
			echo $id = $_GET['id'];
			// echo "INSERT INTO `officers`(`Student_ID`) 
			// 	VALUES (\"$_GET['id']\");";
			$result = $con->query("DELETE FROM `employees`where (`sid`) = (\"$id\")");
			// -- echo "INSERT INTO `officers`(`Student_ID`) VALUES (\"$id\");";
			// if (!$result) {
			// die('Invalid query: ' . mysqli_error());
			// }
		}


		else if($_GET['action']==='del'){
			echo "action";
			echo $id = $_GET['id'];
			$result = $con->query("DELETE FROM `dept_info`where (`dept_no`) = (\"$id\")");
		}



		else if($_GET['action']==='delchild'){
			echo "action";
			echo $id = $_GET['id'];
			$result = $con->query("DELETE FROM `children`where (`child_no`) = (\"$id\")");
		}
	
	}

	header('Location:index.php');
	


 ?>