                        <?php include "connect.php";

                        
                        $firstquery = $con->query("SELECT * FROM time_log;"); 
                
                        ?>
                        <div class="row">
    <div class="col-md-12">
         <h2>Time In Log</h2>   
            <!-- <h5>Welcome Jhon Deo , Love to see you back. </h5> -->
        </div>
    </div>    

     <hr />


     <p>
                        <button id="pdf" class="btn btn-warning btn-lg" style="margin-bottom: 10px">EXPORT TO PDF</button>
                        <button id="csv" class="btn btn-info btn-lg" style="margin-bottom: 10px">EXPORT TO CSV</button> 
                        </p>
                        <div class="panel panel-success">
                        <div class="panel panel-success">
                       
                        <div class="panel-heading">
                            <h3>LOGS</h3>
                        </div>
                        
                        <div class="panel panel-success">
                            <div class="table-responsive">
                                <table class="table" id="dataTables-example">
                                    <thead>

                                        <tr>
                                            <th>Log ID</th>
                                            <th>Name</th>
                                            <th>Department</th>
                                            <th>TimeStamp</th>
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
                                            <td><?php echo $row['log_no']; ?></td>
                                            <td><?php 
                                            $parent = $con->query("SELECT name FROM employees where sid=$row[sid]");
                                           while ( $name = $parent->fetch_assoc()) {
                                              
                                            //$name=$row['sid'];
                                            echo $name['name']; }?>
                                           </td>
                                            <td><?php 
                                            $parent = $con->query("SELECT dept_name FROM dept_info where dept_no=(SELECT dept_no from employees where sid=$row[sid])");

                                           while ( $name = $parent->fetch_assoc()) {
                                              
                                            //$name=$row['sid'];
                                            echo $name['dept_name']; }?></td>
                                            <td><?php echo $row['timestamp']; ?></td>

                                        
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

