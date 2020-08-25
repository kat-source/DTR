<!-- <script type="text/javascript">
function revalidate()
{
//alert("test");
	test1=document.getElementById("test1").value;
	test2=document.getElementById("test2").value;
	window.location="?p=addchildren&?test1="+test1;
}
</script>





<script>
function myFunction() {
	 test1=document.getElementById("sid").value;
  location.replace("localhost/DTR/addchildren.php&?test1="+test1";")
}
</script>

<form name="pass" action="a.php" method="post">
<input type="text" name="test1" id="test1">
<input type="text" name="test2" id="test2">
<a href="javascript:revalidate();">revalidate</a> 
<input type="Submit">
</form>
 -->



<div>
	<center><h2>New Employee</h2>
		</center>
	<hr>
</div>
<br><br>
<div class="row">
	<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
		<form class="form-group" method="POST" action="a.php">
			<label>SS NUMBER</label>
			<input type="text" name="sid" class="form-control" id="sid">
			<label>Name</label>
			<input type="text" name="name" class="form-control">
			<label> Salary</label>
			<input type="text" name="salary" class="form-control">
			<label> Phone Number</label>
			<input type="text" name="phone" class="form-control value="null">
			<label>Department</label>
			<select class="form-control" name ="dept_no">
                <?php
            $firstquery = $con->query("SELECT * FROM dept_info;"); 
				while($row = $firstquery->fetch_assoc()) {	
				 ?>
               <option value=<?php echo $row['dept_no'];?>><?php echo $row['dept_name'];?>
                </option>
            <?php } ?>
            </select>
			<br>

			<center>
				<a href="javascript:myFunction();"> <h4><?php echo "Add Offspring"; ?>
			</center>
			<br>
			



			<center>
			<input type="Submit" name="Submit" value = "Save Employee Info" class="btn btn-default">
			</center>
		</form>
	</div>

</div>


<script type="text/javascript">
function myFunction() {
  //location.replace("localhost/DTR/addchildren.php")
  id=document.getElementById("sid").value;
  window.location="?p=addchildren&id="+id;
}
</script>