<?php 
include('function.php');

if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must login first";
	header('location: login.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: login.php");
}
if (!isMember()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Welcome To LMS</title>
    <!-- Favicon-->
    <link rel="icon" href="../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="../plugins/iconfont/material-icons.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="../plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../css/themes/all-themes.css" rel="stylesheet" />
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
		
		<!-- Notifications -->
		
		
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
			<div class="button-demo js-modal-buttons">
			   <?php				
					// select loggedin users detail
					$id =$_SESSION['user']['mem_username'];
					$sql = "SELECT * FROM member WHERE mem_username='$id'";
					$res=mysqli_query($db,$sql);
					$userRow=mysqli_fetch_array($res);
					$name = $userRow['mem_username'];
					echo "$name"." (Member)";				
				?>
			 </div>
			 
			 
			</a>
		
		</li>
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
				<i class="material-icons">account_circle</i>
				
			</a>
			<ul class="dropdown-menu" class="pull-right">
			
			
			
				
				<li class="footer">
					<ul class="menu">

						<li>
							<a href="home.php?logout='1'" >
								<div class="icon-circle bg-light-green">
									<i class="material-icons">input</i>
								</div>
								<div class="menu-info">
									<h4>LOGOUT</h4>
									<p>
										
									</p>
								</div>
							</a>
						</li>
					  
					</ul>
				</li>
				
			</ul>
		</li>
		<!-- #END# Notifications -->
		
	   
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
                    <img src="../images/logo.jpg" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">University of Jaffna</div>
                    
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
                        <a href="profile.php">
                            <i class="material-icons">people</i>
                            <span>Profile</span>
                        </a>
                    </li>
               
					
					<li>
						<a href="search_book.php">
							<i class="material-icons">search</i>
							<span>Search & Request</span>
						</a>
					</li>
					

                        
                   
					<li>
                        <a href="issued_book.php">
                            <i class="material-icons">local_offer</i>
                            <span>Issued Books</span>
                        </a>
                        
                    </li>
                    
					<li>
                        <a href="#">
                            <i class="material-icons">info</i>
                            <span>About</span>
                        </a>
                        
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
           

            <!-- Widgets -->
             <div class="row clearfix ">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
						
						
                        <div class="body">
                                    <div class="content-wrapper">
									
									<!-- Headings -->
<div class="row clearfix" >
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			
			<div class="header bg-blue-grey">
			 <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
			<div id="aniimated-thumbnials" class="list-unstyled row clearfix">
			<img src="../images/p3.jpg" alt="LMS" class="img-responsive thumbnail" />
			</div>
			</div>
				<h3>
					<center>Department of ComputerScience | University of Jaffna</center>
				</h3>
				
				
			</div>
			<div class="body">
				<h4>Group 09</h4>
				<div class="panel-group" id="accordion_1" role="tablist" aria-multiselectable="true">
	<div class="panel panel-col-cyan">
		<div class="panel-heading" role="tab" id="headingOne_1">
			<h4 class="panel-title">
				<a role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseOne_1" aria-expanded="true" aria-controls="collapseOne_1">
					Supervisors
				</a>
			</h4>
		</div>
		<div id="collapseOne_1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_1">
			<div class="panel-body">
				<p>• Supervisor | Dr. A. Ramanan. Senior Lecturer, Department Of Computer Science, UOJ<br>
						• Mentor | Ms.V.Thulasika	<br>
						• Instructor | Mr.M.R.M.Naseer	<br>
							</p>
			</div>
		</div>
	</div>
	<div class="panel panel-col-cyan">
		<div class="panel-heading" role="tab" id="headingTwo_1">
			<h4 class="panel-title">
				<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseTwo_1" aria-expanded="false"
				   aria-controls="collapseTwo_1">
					People behind this project
				</a>
			</h4>
		</div>
		<div id="collapseTwo_1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo_1">
			<div class="panel-body">
				<b>
				<p class="m-b-30">2015/sp/144 | R. Shahilashinie</p>
				<p class="m-b-30">2015/sp/157 | M. Suhirthashini(Team Leader)</p>
				<p class="m-b-30">2015/sp/167 | T. Lawshiga</p>
				<p class="m-b-30">2015/sp/220 | T. Tharani</p>
				<p class="m-b-30">2015/sp/255 | B.K.M.D.Nuwanga Rodrigo</p>
				</b>
			</div>
		</div>
	</div>
	
	</div>
	<p><i class="material-icons">info</i><b>This project was contributed by undergraduates for group project in 2nd year(2018).</b></p>
</div>
				
			</div>
		</div>
	</div>
</div>
<!-- #END# Headings -->
		
		
		
        
        </div>
                        </div>
                    </div>
                </div>
            </div>
         </div>

            
    </section>

    <!-- Jquery Core Js -->
    <script src="../plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="../plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="../plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="../plugins/raphael/raphael.min.js"></script>
    <script src="../plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="../plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="../plugins/flot-charts/jquery.flot.js"></script>
    <script src="../plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="../plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="../plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="../plugins/flot-charts/jquery.flot.time.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="../plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Custom Js -->
    <script src="../js/admin.js"></script>
    <script src="../js/pages/index.js"></script>

    <!-- Demo Js -->
    <script src="../js/demo.js"></script>
</body>

</html>