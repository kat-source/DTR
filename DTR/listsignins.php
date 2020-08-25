                        <?php

                        $req_year = $con->query("SELECT `Event_ID`, `req_year`, `dateStart`, `dateEnd` FROM `event_info`");
                        $allyear = '';
                        while($req_yearrows = $req_year->fetch_assoc()){
                            $threadOne[] = $req_yearrows['Event_ID'];
                            $threadTwo[] = $req_yearrows['req_year'];
                            $threadThree[] = $req_yearrows['dateStart'];
                            $threadFour[] = $req_yearrows['dateEnd'];
                            $allyear = $allyear.$req_yearrows['req_year'];
                        }

                        $threads = array();
                        $in = array();
                        $out = array();
                        foreach($threadOne as $indexnum => $key){
                           $threads[$key] = $threadTwo[$indexnum];
                        }
                        foreach($threadOne as $indexnum => $key){
                           $in[$key] = $threadThree[$indexnum];
                        }
                        foreach($threadOne as $indexnum => $key){
                           $out[$key] = $threadFour[$indexnum];
                        }

                        // print_r($threads);
                        // print_r($in);
                        // print_r($out);
                        
                        $firstquery = $con->query("SELECT * FROM `event_attendance`"); 

                
                        ?>
                        <p>
                        <button id="pdf" class="btn btn-warning btn-lg" style="margin-bottom: 10px">EXPORT TO PDF</button>
                        <button id="csv" class="btn btn-info btn-lg" style="margin-bottom: 10px">EXPORT TO CSV</button> 
                        </p>
                        <div class="panel panel-success">
                       
                        <div class="panel-heading">
                            <h3>Student Sign-in List</h3>
                        </div>
                        
                        <div class="panel panel-success">
                            <div class="table-responsive">
                                <table class="table" id="dataTables-example">

                                    <thead>

                                        <tr>
                                            <th>Attendance ID</th>
                                            <th>Student Name</th>
                                            <th>Sign-in</th>
                                            <th>Sign-out</th>
                                            <th>Remarks</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php 
                                        $wait = array();

                                        while($row = $firstquery->fetch_assoc()) { 
                                            $remarks = '';
                                            $Event_ID = $row['Event_ID'];
                                            $sid = $row['Student_ID'];
                                            $yl = strcomma($threads[$Event_ID]);
                                            $query2=  $con->query("SELECT * FROM `student_info` where `Student_ID` = $sid and `Student_YearLevel` in ($yl)"); 
                                            $row2 = $query2->fetch_assoc();

                                            $signinquery = $con->query("SELECT `TimeStamp` from `event_attendance` where `Student_ID` = $sid and `Event_ID` = $Event_ID order by `TimeStamp` asc limit 1");
                                            $signinrows = $signinquery->fetch_assoc();

                                            $signoutquery = $con->query("SELECT `TimeStamp` from `event_attendance` where `Student_ID` = $sid and `Event_ID` = $Event_ID  order by `TimeStamp` desc limit 1");
                                            $signoutrows = $signoutquery->fetch_assoc();

                                            $signin = $signinrows['TimeStamp'];
                                            $signout = $signoutrows['TimeStamp'];

                                            if(!in_array($Event_ID.$sid, $wait)){
                                            $wait[] = $Event_ID.$sid;
                                            ?>
                                        <tr >

                                                <td><?php echo $row['EA_ID']; ?></td>
                                           
                                                <td><?php echo $row2['Student_FName']." ".$row2['Student_MName']." ".$row2['Student_LName']; ?></td>
                                            <?php 
                                            // echo $signinrows['TimeStamp'];
                                            // echo "<br>";
                                            // echo $signoutrows['TimeStamp'];

                                            // $signin = "2019-05-17 10:01:05";
                                            // $signout = "2019-05-17 17:01:05";
                                            if(!diff($signin,$signout)==0){ 
                                                ?>
                                                <td><?php echo $signinrows['TimeStamp']; ?></td>
                                                <td><?php echo $signoutrows['TimeStamp']; ?></td>

                                            <?php }
                                            else{
                                                
                                                ?>
                                                <td><?php echo $signinrows['TimeStamp']; ?></td>
                                                <td>N/A</td>
                                                <?php 
                                            } ?>

                                            <td>
                                            <?php 
                                            // echo diff($in[$Event_ID],$signinrows['TimeStamp']);
                                            // echo $in[$Event_ID];
                                            // echo $signinrows['TimeStamp'];
                                            // echo "<br>";
                                            // echo $signoutrows['TimeStamp'];
                                                if(!diff($signin,$signout)==0){
                                                  
                                                    if(diff($in[$Event_ID],$signinrows['TimeStamp'])>30){
                                                        $remarks = "Late sign-in ".$remarks;
                                                        if(diff($out[$Event_ID],$signoutrows['TimeStamp'])>30){
                                                        $remarks = $remarks."and late sign-out ";
                                                        }
                                                        else{
                                                            $remarks = $remarks."but signed-out on-time";   
                                                        }
                                                    }
                                                    else{
                                                        $remarks = "Present on sign-in ".$remarks;   
                                                    }
                                                    if(diff($out[$Event_ID],$signoutrows['TimeStamp'])>30){
                                                        $remarks = $remarks."but late sign-out ";
                                                    }
                                                    else{
                                                        $remarks = $remarks."and signed-out on-time";   
                                                    }

                                                }

                                                else{
                                                    if(diff($in[$Event_ID],$signinrows['TimeStamp'])<30){
                                                        $remarks = $remarks."Present on sign in but no sign-out";
                                                    }
                                                    else{
                                                     $remarks = $remarks."Late on sign in and no sign-out";   
                                                    }
                                                    
                                                }
                                                echo $remarks;
                                             ?>

                                            </td>

                                            
                                        
                                        </tr>


                                        <?php }
                                        else{

                                          }
                                        } ?>

                                        <?php 
                                        $allyear = strcomma($allyear);
                                            $absent = $con->query("SELECT * FROM `student_info` WHERE Student_YearLevel in ($allyear) and `Student_ID` not in (SELECT `Student_ID` from `event_attendance`)");

                                            while($absentrow = $absent->fetch_assoc()){
                                                $sid = $absentrow['Student_ID'];
                                                // $eventabsent = $con->query("SELECT `Event_ID` from `event_info`");
                                                // while($eventabsentrow = $eventabsent->fetch_assoc()){

                                                    ?>
                                                    <tr>

                                                        <td></td>
                                                        <td><?php echo $absentrow['Student_FName']." ".$absentrow['Student_MName']." ".$absentrow['Student_LName']; ?></td>
                                                        <td>N/A</td>
                                                        <td>N/A</td>
                                                        <td>Absent</td>

                                                    </tr>
                                                    <?php
                                                

                                            }
                                         ?>
                                        <script type="text/javascript">
                                            $('#pdf').on('click',function(){
                                            $("#dataTables-example").tableHTMLExport({type:'pdf',filename:'Attendance.pdf'});
                                          })
                                            $('#csv').on('click',function(){
                                            $("#dataTables-example").tableHTMLExport({type:'csv',filename:'Attendance.csv'});
                                          })
                                        </script>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

