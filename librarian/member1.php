<?php  include('member2.php'); ?>

<?php 
include('../functions.php');

if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: ../login.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: ../login.php");
}
if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must login first";
	header('location: ../login.php');
}
?>

<?php 
	if (isset($_GET['edit'])) {
		$mem_id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM member WHERE mem_id=$mem_id");

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$enroll_no = $n['enroll_no'];
			$mem_username = $n['mem_username'];
			$mem_name = $n['mem_name'];
			$mem_email = $n['mem_email'];
			$mem_contact = $n['mem_contact'];
			$mem_address = $n['mem_address'];
			$mem_type = $n['mem_type'];
			$mem_image = $n['mem_image'];
		}
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
                $.post('member2.php', { dropdownValue: inputValue }, function(data){
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

    <!-- JQuery DataTable Css -->
    <link href="../plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="../css/style.css" rel="stylesheet">
	
	<!-- Bootstrap Select Css -->
    <link href="../plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

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
                           <?php  if (isset($_SESSION['user'])) : ?>
						<strong><?php echo $_SESSION['user']['username']; ?></strong>
						(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)
						 </div>
						 
						 
                        </a>
					
					</li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">account_circle</i>
                            
                        </a>
                        <ul class="dropdown-menu" class="pull-right">
						
						
						
                            <li class="header">
							
							
							
							</li>
                            <li class="body">
                                <ul class="menu">
                                    <li>
                                        <a href="create_user.php">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>ADD USER</h4>
                                                <p>
                                                    
                                                </p>
                                            </div>
                                        </a>
                                    </li>

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
                                  <?php endif ?>
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
                        <a href="memberd.php">
                            <i class="material-icons">people</i>
                            <span>Members</span>
                        </a>
                    </li>
                    <li>
                        <a href="bookd.php">
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
                        <a href="request.php">
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
                        <a href="return_book.php">
                            <i class="material-icons">beenhere</i>
                            <span>Return Book</span>
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
				<div class="pull-left"><h2>MEMBER DETAILS</h2></div>
                <li><i class="material-icons">home</i> Home</li>
                <li><a href="member.php"><i class="material-icons">people</i> Members</a></li>
                                
                               
             </ol>
                
            </div>

            <!-- Widgets -->
             <div class="row clearfix ">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
						
						
                        <div class="body">
                            <div class="body">
                            <?php if (isset($_SESSION['message'])): ?>
							<div class="alert alert-success">
								<?php 
									echo $_SESSION['message']; 
									unset($_SESSION['message']);
								?>
							</div>
						<?php endif ?>

						<?php $results = mysqli_query($db, "SELECT * FROM member"); ?>

							<form id="form_advanced_validation" method="post" action="member2.php" enctype="multipart/form-data">		
								
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
									<label class="form-label">Username</label>
                                    <div class="form-line">
									
									<input type="text" name="mem_username" value="<?php echo $mem_username; ?>" class="form-control">
								</div>
								</div>
								
								<div class="form-group form-float">
									<label class="form-label">Password</label>
                                    <div class="form-line">
									
									<input type="password" name="password" value="<?php echo $password; ?>" class="form-control" >
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
									<label class="form-label">Member Type</label>
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
								
								<div class="form-group form-float">
								<label class="form-label">Image</label>
                                    <div class="form-line">
									
									<input type="file" name="f1" value="<?php echo $mem_image; ?>" class="form-control">
								</div>
								</div>
								
								<div class="input-group">
									<?php if ($update == true): ?>
										<button class="btn btn-primary" type="submit" name="update" >update</button>
									<?php else: ?>
										<button class="btn btn-success" type="submit" name="save" >Save</button>
									<?php endif ?>

								</div>
								

							</form> 
							
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
	
	 <!-- Bootstrap Notify Plugin Js -->
    <script src="../plugins/bootstrap-notify/bootstrap-notify.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../plugins/node-waves/waves.js"></script>
	
	 <!-- Select Plugin Js -->
    <script src="../plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="../plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="../plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="../js/admin.js"></script>
    <script src="../js/pages/tables/jquery-datatable.js"></script>

    <!-- Demo Js -->
    <script src="../js/demo.js"></script>
</body>

</html>