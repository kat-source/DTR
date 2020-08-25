

<div>
	<center><h2>Add Employee Offspring</h2>
		</center>
	<hr>
</div>
<br><br>
<div class="row">
	<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
		<form class="form-group" method="POST" action="a.php">
			<label>Name</label>
			<input type="text" name="name" class="form-control">
			<label> Age</label>
			<input type="text" name="age" class="form-control">
			<label> Parent</label>
			<input type="text" name="sid" class="form-control" value="<?php echo $_GET['id']; ?>" readonly>
               
			<br>

			<br>
			
			<center>
			<input type="Submit" name="Submit" value = "Save Child Info" class="btn btn-default">
			</center>
		</form>
	</div>

</div>


