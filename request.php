<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Welcome To LMS</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="plugins/iconfont/material-icons.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="#" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="#" class="bars"></a>
                <a class="navbar-brand" href="index.html">Library Management System</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    
                    <li class="pull-right"><a href="#" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="images/logo.jpg" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">University of Jaffna</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
						
                            <li><a href="logout.php?logout"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active">
                        <a href="home.php">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="member.php">
                            <i class="material-icons">people</i>
                            <span>Members</span>
                        </a>
                    </li>
                    <li>
                        <a href="book.php">
                            <i class="material-icons">library_books</i>
                            <span>Books</span>
                        </a>
                    </li>
					
					<li>
                        <a href="#" class="menu-toggle">
                            <i class="material-icons">search</i>
                            <span>Search</span>
						</a>
							<ul class="ml-menu">
                            <li>
                                <a href="search_book.php">
                                    <span>Search Book</span>
                                </a>
                            </li>
                            <li>
                                <a href="search_member.php">
                                    <span>Search Member</span>
                                </a>
                            </li>
                    
                        </ul>
                        
                    </li>
					
                    <li>
                        <a href="#" >
                            <i class="material-icons">collections_bookmark</i>
                            <span>Requests</span>
                        </a>
                        
                    </li>
					
					<li>
                        <a href="issue_book.php">
                            <i class="material-icons">local_offer</i>
                            <span>Issue Book</span>
                        </a>
                        
                    </li>
					
					<li>
                        <a href="about.php">
                            <i class="material-icons">info</i>
                            <span>About</span>
                        </a>
                        
                    </li>
                    
                </ul>
            </div>
            
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
			<ol class="breadcrumb breadcrumb-bg-teal align-right">
				<div class="pull-left"><h2>REQUEST DETAILS</h2></div>
                <li><i class="material-icons">home</i> Home</li>
                <li><a href="#"><i class="material-icons">textsms</i> Request</a></li>
                                
                               
             </ol>
                
            </div>

            <!-- Widgets -->
             <div class="row clearfix ">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
						
						
                        <div class="body">
                            <div class="table-responsive">
                                
									<?php
	
	
	
	include('db_conn.php');	
	$query4 = 'SELECT member.mem_name,request.message,request.logs FROM member INNER JOIN request ON member.mem_id=request.id';	
	echo"<br>";
	
	
				if($query4_run = mysql_query($query4))
					{
						$count1 = mysql_num_rows($query4_run);
							if($count1 == null)
								{
									echo "No Requests!".mysql_error();
								}
							else
								{
			  
               echo" <table class='table table-bordered table-striped table-hover js-basic-example dataTable'>
                  <thead>
                    <tr>
					  <th>Member Name</th>
                      <th>Request</th>
                      <th>Date</th>
                      				                       
                    </tr>
					</thead>";					
					while($query4_row=mysql_fetch_assoc($query4_run))
										{
											$mem_name = $query4_row['mem_name'];
											$message = $query4_row['message'];											
											$logs = $query4_row['logs'];
											
											
											echo"<tr><td>".$mem_name."</td><td>".$message."</td><td>".$logs."</td></tr>";											
										}		
					echo"</table>";
					}
					}

				else
					{
						echo "Query Failed".mysql_error();
					}
?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </div>

            
    </section>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
	
	 <!-- Bootstrap Notify Plugin Js -->
    <script src="plugins/bootstrap-notify/bootstrap-notify.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/tables/jquery-datatable.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
</body>

</html>