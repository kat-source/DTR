                        <?php include "connect.php";

                        
                        $firstquery = $con->query("SELECT * FROM employees;"); 
                
                        ?>
                        <div class="row">
    <div class="col-md-12">
         <h2>Employees List</h2>   
            <!-- <h5>Welcome Jhon Deo , Love to see you back. </h5> -->
        </div>
    </div>    

     <hr />
                        <div class="panel panel-success">
                       
                        <div class="panel-heading">
                            <h3>Employees</h3>
                        </div>
                        
                        <div class="panel panel-success">
                            <div class="table-responsive">
                                <table class="table" id="dataTables-example">
                                    <thead>

                                        <tr>
                                            <th>Social ID</th>
                                            <th>Name</th>
                                            <th>Salary</th>
                                            <th>Phone Number</th>
                                            <th>Department</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        while($row = $firstquery->fetch_assoc()) { 
                                            ?>
                                        <tr >
                                            <td><?php echo $row['sid']; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['salary']; ?></td>
                                            <td><?php echo $row['phone']; ?></td>
                                            <td><?php echo $row['dept_no']; ?></td>
                                            

                                            <td> <a href="?p=addchildren&id=<?php echo $row['sid']?>" onclick="return confirm('Add offspring info of this employee?');"> <h4><?php echo "Add Offspring"; ?> </h4></a></td>



                                            <td> <a href="#"> <h4><?php echo "Edit"; ?> </h4></a></td>



                                           <td> <a href="a.php?action=ro&id=<?php echo $row['sid']?>" onclick="return confirm('Are you sure you want to delete this item?');"> <h4><?php echo "Delete"; ?> </h4></a></td>


                                        
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

