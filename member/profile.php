<?php 
include('function.php');
include('update_profile.php');

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
	
	<script>
            $(document).ready(function(){
            $('#myDropDown').change(function(){
                //Selected value
                var inputValue = $(this).val();
//                alert("value in js "+inputValue);

                //Ajax for calling php function
                $.post('update_profile.php', { dropdownValue: inputValue }, function(data){
//                    alert('ajax completed. Response:  '+data);
                    //do after submission operation in DOM
                });
            });
        });
        </script>
	
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
                        <a href="#">
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
                        <a href="about.php">
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
		 <div class="block-header">
			<ol class="breadcrumb breadcrumb-bg-teal align-right">
				<div class="pull-left"><h2>VIEW PROFILE </h2></div>
                <li><i class="material-icons">home</i> Home</li>
                <li><a href="#"><i class="material-icons">person</i> Profile</a></li>
                                
                               
             </ol>
                
            </div>
            <div class="block-header">
                <h2></h2>
            </div>
		<div class="row clearfix">
			 
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
					<?php
						$query = "SELECT * FROM member WHERE mem_username='$id'";
						$result = mysqli_query($db, $query);
						while($row1 = mysqli_fetch_array($result)){
							$mem_name = $row1['mem_name'];
							$enroll_no = $row1['enroll_no'];
							$mem_contact = $row1['mem_contact'];
							$mem_email = $row1['mem_email'];
							$mem_address = $row1['mem_address'];
							$mem_type = $row1['mem_type'];
						}
					?>
					<div class="header">Personal details</div>
					<div class="body">
						<form id="form_advanced_validation" method="post" action="" >		
								
						<input type="submit" class="btn btn-primary" name="change" value="Update Profile!">
						</form>
						<?php
						if(isset($_POST['change'])){
							?>
							<form id="form_advanced_validation" method="post" action="update_profile.php" >		
								
						<input type="hidden" name="mem_id" value="<?php echo $mem_id; ?>">
								
								<div class="form-group form-float">
									<label class="form-label">Member Name</label>
                                    <div class="form-line">
									
									<input type="text" name="mem_name" value="<?php echo $mem_name; ?>" class="form-control">
								</div>
								</div>
								
								<div class="form-group form-float">
									<label class="form-label">Enroll No</label>
                                    <div class="form-line">
									
									<input type="text" name="enroll_no" value="<?php echo $enroll_no; ?>" class="form-control">
								</div>
								</div>
								
								
								<div class="form-group form-float">
									<label class="form-label">Address</label>
                                    <div class="form-line">
									
									<input type="text" name="mem_address" value="<?php echo $mem_address; ?>" class="form-control">
								</div>
								</div>
								
								<div class="form-group form-float">
									<label class="form-label">Contact No</label>
                                    <div class="form-line">
									
									<input type="text" name="mem_contact" value="<?php echo $mem_contact; ?>" class="form-control">
								</div>
								</div>
								
								<div class="form-group form-float">
									<label class="form-label">Email</label>
                                    <div class="form-line">
									
									<input type="text" name="mem_email" value="<?php echo $mem_email; ?>" class="form-control" required>
								</div>
								</div>
								
								<div class="form-group form-float">
									<label class="form-label">Member Category</label>
                                    <div class="form-line">
									
									<select name="mem_type" id="myDropDown"  class="form-control show-tick">

										

										<option value="Academic Staff" <?php echo ((isset($_POST['mem_type'])) && $_POST['mem_type'] == 'Academic Staff')?'selected="selected"':''; ?>>Academic Staff</option>
										<option value="Postgraduate" <?php echo ((isset($_POST['mem_type'])) && $_POST['mem_type'] == 'Postgraduate')?'selected="selected"':''; ?>>Postgraduate</option>
										<option value="Undergraduate" <?php echo ((isset($_POST['mem_type'])) && $_POST['mem_type'] == 'Undergraduate')?'selected="selected"':''; ?>>Undergraduate</option>
										<option value="Temporary Research Assistant" <?php echo ((isset($_POST['mem_type'])) && $_POST['mem_type'] == 'Temporary Research Assistant')?'selected="selected"':''; ?>>Temporary Research Assistant</option>
										<option value="Permanent Research Assistant" <?php echo ((isset($_POST['mem_type'])) && $_POST['mem_type'] == 'Permanent Research Assistant')?'selected="selected"':''; ?>>Permanent Research Assistant</option>

									</select>
								</div>
								</div>
								
								
								
								<div class="input-group">
									
										<button class="btn btn-primary" type="submit" name="update" >update</button>
								

								</div>
								

							</form>
							<?php
						}
						?>
					
						
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