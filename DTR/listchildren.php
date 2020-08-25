                        <?php include "connect.php";

                        
                      /*  $firstquery = $con->query("SELECT child_no, name, age, emp.name FROM children where children.sid=employees.sid;"); 
                */

                      $firstquery=$con->query("SELECT * FROM children;");
                        ?>
                        <div class="row">
    <div class="col-md-12">
         <h2>Employee Offspring List</h2>   
            <!-- <h5>Welcome Jhon Deo , Love to see you back. </h5> -->
        </div>
    </div>    

     <hr />
                        <div class="panel panel-success">
                       
                        <div class="panel-heading">
                            <h3>Children</h3>
                        </div>
                        
                        <div class="panel panel-success">
                            <div class="table-responsive">
                                <table class="table" id="dataTables-example">
                                    <thead>

                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Age</th>
                                            <th>Parent</th>
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
                                            <td><?php echo $row['child_no']; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['age']; ?></td>
                                            <td><?php 
                                            $parent = $con->query("SELECT name FROM employees where sid=$row[sid]");
                                           while ( $name = $parent->fetch_assoc()) {
                                              
                                            //$name=$row['sid'];
                                            echo $name['name']; }?></td>


                                            <td> <a href="#"> <h4><?php echo "Edit"; ?> </h4></a></td>
                                             
                                           
                                           <td> <a href="a.php?action=delchild&id=<?php echo $row['child_no']?>" onclick="return confirm('Are you sure you want to delete this item?');"> <h4><?php echo "Delete"; ?> </h4></a></td>


                                        
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

