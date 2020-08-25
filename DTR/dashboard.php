


<div class="row">
    <div class="col-md-12">
         <h2>Lou Geh DTR</h2>   
            <!-- <h5>Welcome Jhon Deo , Love to see you back. </h5> -->
        </div>
    </div>    

     <hr />
    <?php 
    include ("connect.php"); 
    $query=  $con->query("SELECT count(*) as c FROM `employees`"); 
    $row = $query->fetch_assoc();

    $query2=  $con->query("SELECT count(*) as c FROM `children`"); 
    $row2 = $query2->fetch_assoc();
   /* $query3=  $con->query("SELECT count(*) as c FROM `event_attendance`"); 
    $row3 = $query3->fetch_assoc();*/


    ?>      

     <!-- /. ROW  -->
     
    <div class="row">
        <a href="index.php?p=listemployees">
    <div class="col-md-4 col-sm-6 col-xs-6">           
<div class="panel panel-back noti-box">
    <span class="icon-box bg-color-red set-icon">
        <i class="fa fa-bars"></i>
    </span>
    <div class="text-box" >

        <p class="main-text"><?php echo $row['c']; ?> Employee/s</p>
        <p class="text-muted"></p>
    </div>
 </div>
 </div>
 </a>
 <a href="index.php?p=listchildren">
        <div class="col-md-4 col-sm-6 col-xs-6">           
<div class="panel panel-back noti-box">
    <span class="icon-box bg-color-green set-icon">
        <i class="fa fa-bars"></i>
    </span>
    <div class="text-box" >
        <p class="main-text"><?php echo $row2['c']; ?> Employee Offspring/s</p>
        <p class="text-muted"></p>
    </div>
 </div>
 </div>
 </a>
 <a href="index.php">
        <div class="col-md-4 col-sm-6 col-xs-6">           
<div class="panel panel-back noti-box">
    <span class="icon-box bg-color-blue set-icon">
        <i class="fa fa-bell-o"></i>
    </span>
    <div class="text-box" >
        <p class="main-text"><?php echo $row['c']; ?> Sign-in/s</p>
        <p class="text-muted"></p>
    </div>
 </div>
 </div>
</a>
</div>


 <div class="col-lg-3">
                                <div class="blog-single-sidebar bordered blog-container">
                                    <div class="blog-single-sidebar-search">
                                        <div class="input-icon right">
                                           <form method="POST" action="time_in_func.php">
                                            <input type="text" class="form-control" name="user_idnum" placeholder="Enter ID Number">
<br>
 <button type="submit" class="btn btn-info btn-lg"  style="margin-bottom:10px">Time In</button>
</div>
</form>
</div>
</div></div>
                 <!-- /. ROW  -->
                <hr />    


<?php include ("listsignin.php"); ?>
                  
                 <!-- /. ROW  -->   