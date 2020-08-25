<?php include ("connect.php"); 
$id = $_GET['id'];
$firstquery = $con->query("SELECT * FROM `employees` where `sid` = $id;"); 

$row = $firstquery->fetch_assoc();

?>




<div>
	<center><h2>Edit Employee Details</h2>
		</center>
	<hr>
</div>
<br><br>
<div class="row">
	<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
		<form class="form-group" method="POST" action="a.php?id=<?php echo $id;?>">
			<label>SS Number</label>
			<input type="text" name="sid" value="<?php echo $row['sid'];?>" class="form-control">
			<label> Name</label>
			<input type="text" name="name" value="<?php echo $row['name'];?>" class="form-control">
			<label> Salary</label>
			<input type="text" name="salary" value="<?php echo $row['salary'];?>" class="form-control">
			<label> Phone Number</label>
			<input type="text" name="phone" value="<?php echo $row['phone'];?>" class="form-control">
			<label>Department</label>
			<?php  $second = $con->query("SELECT * FROM dept_info;"); 
                $result = $second->num_rows; ?>
			<select class="form-control" name ="dept_no">
            <?php
				while($row2 = $second->fetch_assoc()) {	
				 ?>
               <option value=<?php echo $row2['dept_no'];?>
               <?php if($row2['dept_no'] == $row['dept_no']){
               	echo " selected";
               } ?>
               ><?php echo $row2['dept_name'];?>
                </option>
            <?php } ?>
            </select>


			<br>
			<center>
			<input type="Submit" name="Submit" value = "Save Changes to Employee Details" class="btn btn-default">
			</center>
		</form>
	</div>

</div>