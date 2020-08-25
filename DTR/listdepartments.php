                      
                        <?php include "connect.php";

                        
                        $firstquery = $con->query("SELECT * FROM `dept_info`"); 
                
                        ?>
                        <div class="row">
                        <div class="col-md-12">
                             <h2>List of Departments</h2>   
                                <!-- <h5>Welcome Jhon Deo , Love to see you back. </h5> -->
                            </div>
                        </div>    

                         <hr />
                        <div class="panel panel-success">
                       
                        <div class="panel-heading">
                            <h3>Departments</h3>
                        </div>
                        
                        <div class="panel panel-success">
                            <div class="table-responsive">
                                <table class="table" id="dataTables-example">
                                    <thead>

                                        <tr>
                                            <th>Department ID</th>
                                            <th>Department Name</th>
                                            <th>Allocated Budget</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        while($row = $firstquery->fetch_assoc()) { 
                                            ?>
                                        <tr >
                                            <td><?php echo $row['dept_no']; ?></td>
                                            <td><?php echo $row['dept_name']; ?></td>
                                            <td><?php echo $row['dept_budget']; ?></td>

                                              <td> <a href="a.php?action=del&id=<?php echo $row['dept_no']?>" onclick="return confirm('Are you sure you want to delete this item?');"> <h4><?php echo "Delete"; ?> </h4></a></td>

 
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

