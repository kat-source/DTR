<?php include ("connect.php");  ?>
<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Lou Geh DTR</a> 
            </div>
	  		<!-- <div style="color: white;
			padding: 15px 50px 5px 50px;
			float: right;
			font-size: 16px;">  &nbsp; <a href="login.html" class="btn btn-danger square-btn-adjust">Logout</a> 
			</div> -->
        </nav>   
           <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
				
					
                    <li>
                        <a class="active-menu"  href="index.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>	
					                   
<!--                     <li>
                        <a href="#"><i class="fa fa-sitemap fa-3x"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Second Level Link</a>
                            </li>
                            <li>
                                <a href="#">Second Level Link</a>
                            </li>
                            <li>
                                <a href="#">Second Level Link<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>

                                </ul>
                               
                            </li>
                        </ul>
                    </li>  --> 

                    <li>
                        <a href="#"><i class="fa fa-table fa-3x"></i>List<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="?p=listemployees">List of Employees</a>
                            </li>
                            <li>
                                <a href="?p=listdepartments">List of Departments</a>
                            </li>

                            <li>
                                <a href="?p=listchildren">List of Children</a>
                            </li>

                            
                        </ul>
                    </li> 
                    <li  >
                        <a  href="form.html"><i class="fa fa-edit fa-3x"></i> Add Elements <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="?p=addemployee">Add Employee</a>
                            </li>
                            <li>
                                <a href="?p=adddepartment">Add Department</a>
                            </li>
                            
                           <!--  <li>
                                <a href="?p=addofficer">Add Officers</a>
                            </li> -->
                            
                        </ul>
                    </li> 

                  
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->