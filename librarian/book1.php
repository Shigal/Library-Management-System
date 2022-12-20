
<?php  include('book2.php'); ?>

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
		$book_id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM book WHERE book_id=$book_id");

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$isbn = $n['isbn'];
			$title = $n['title'];
			$book_no = $n['book_no'];
			$category = $n['category'];
			$author = $n['author'];
			$edition = $n['edition'];
			$publisher = $n['publisher'];
			$year = $n['year'];
			$status = $n['status'];
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
               alert("value in js "+inputValue);

                //Ajax for calling php function
                $.post('book2.php', { dropdownValue: inputValue }, function(data){
                   alert('ajax completed. Response:  '+data);
                   // do after submission operation in DOM
                });
            });
        });
        </script>
	
    <!-- Favicon-->
    <link rel="icon" href="../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
   <link href="../plugins/iconfont/material-icons.css" rel="stylesheet" type="text/css">
   
   <!-- Bootstrap Select Css -->
    <link href="../plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

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
				<div class="pull-left"><h2>BOOK DETAILS</h2></div>
                <li><i class="material-icons">home</i> Home</li>
                <li><a href="bookd.php"><i class="material-icons">library_books</i> Books</a></li>
                                
                               
             </ol>
                
            </div>

            <!-- Widgets -->
             <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
						
						
                        <div class="body">
                            <?php if (isset($_SESSION['message'])): ?>
							<div class="alert alert-success">
								<?php 
									echo $_SESSION['message']; 
									unset($_SESSION['message']);
								?>
							</div>
						<?php endif ?>

						<?php $results = mysqli_query($db, "SELECT * FROM book"); ?>

							<form id="form_advanced_validation" method="post" action="book2.php" >		
								
						<input type="hidden" name="book_id" value="<?php echo $book_id; ?>">
								
								<div class="form-group form-float">
                                    <div class="form-line">
									<label class="form-label">ISBN</label>
									<input type="text" name="isbn" value="<?php echo $isbn; ?>" class="form-control">
								</div>
								</div>
								
								<div class="form-group form-float">
                                    <div class="form-line">
									<label class="form-label">Book No</label>
									<input type="text" name="book_no" value="<?php echo $book_no; ?>" class="form-control">
								</div>
								</div>
								
								<div class="form-group form-float">
                                    <div class="form-line">
									<label class="form-label">Title</label>
									<input type="text" name="title" value="<?php echo $title; ?>" class="form-control" required>
								</div>
								</div>
								
								<div class="form-group form-float">
                                    <div class="form-line">
									<label class="form-label">Book Category</label>
									<select name="category" id="myDropDown"  class="form-control show-tick" >

										

										<option value="Algorithms and Complexity"  <?php echo ((isset($_POST['category'])) && $_POST['category'] == 'Algorithms and Complexity')?'selected="selected"':''; ?> >Algorithms and Complexity</option>
										<option value="Architecture and Organization" <?php echo ((isset($_POST['category'])) && $_POST['category'] == 'Architecture and Organization')?'selected="selected"':''; ?>>Architecture and Organization</option>
										<option value="Computational Science" <?php echo ((isset($_POST['category'])) && $_POST['category'] == 'Computational Science')?'selected="selected"':''; ?>>Computational Science</option>
										<option value="Discrete Structure" <?php echo ((isset($_POST['category'])) && $_POST['category'] == 'Discrete Structure')?'selected="selected"':''; ?>>Discrete Structure</option>
										<option value="Graphics and Visualization" <?php echo ((isset($_POST['category'])) && $_POST['category'] == 'Graphics and Visualization')?'selected="selected"':''; ?>>Graphics and Visualization</option>
										<option value="Human-Computer Interaction" <?php echo ((isset($_POST['category'])) && $_POST['category'] == 'Human-Computer Interaction')?'selected="selected"':''; ?>>Human-Computer Interaction</option>
										<option value="Information Assurance and Security" <?php echo ((isset($_POST['category'])) && $_POST['category'] == 'Information Assurance and Security')?'selected="selected"':''; ?>>Information Assurance and Security</option>
										<option value="Information Management" <?php echo ((isset($_POST['category'])) && $_POST['category'] == 'Information Management')?'selected="selected"':''; ?>>Information Management</option>
										<option value="Intelligent Systems" <?php echo ((isset($_POST['category'])) && $_POST['category'] == 'Intelligent Systems')?'selected="selected"':''; ?>>Intelligent Systems</option>
										<option value="Networking and Communication" <?php echo ((isset($_POST['category'])) && $_POST['category'] == 'Networking and Communication')?'selected="selected"':''; ?>>Networking and Communication</option>
										<option value="Operating Systems" <?php echo ((isset($_POST['category'])) && $_POST['category'] == 'Operating Systems')?'selected="selected"':''; ?>>Operating Systems</option>
										<option value="Platform-based Development" <?php echo ((isset($_POST['category'])) && $_POST['category'] == 'Platform-based Development')?'selected="selected"':''; ?>>Platform-based Development</option>
										<option value="Parallel and Distributed Computing" <?php echo ((isset($_POST['category'])) && $_POST['category'] == 'Parallel and Distributed Computing')?'selected="selected"':''; ?>>Parallel and Distributed Computing</option>
										<option value="Programming Languages" <?php echo ((isset($_POST['category'])) && $_POST['category'] == 'Programming Languages')?'selected="selected"':''; ?>>Programming Languages</option>
										<option value="Software Development Fundamentals" <?php echo ((isset($_POST['category'])) && $_POST['category'] == 'Software Development Fundamentals')?'selected="selected"':''; ?>>Software Development Fundamentals</option>
										<option value="Software Engineering" <?php echo ((isset($_POST['category'])) && $_POST['category'] == 'Software Engineering')?'selected="selected"':''; ?>>Software Engineering</option>
										<option value="System Fundamentals" <?php echo ((isset($_POST['category'])) && $_POST['category'] == 'System Fundamentals')?'selected="selected"':''; ?>>System Fundamentals</option>
										<option value="Social Issues and Professional Practice" <?php echo ((isset($_POST['category'])) && $_POST['category'] == 'Social Issues and Professional Practice')?'selected="selected"':''; ?>>Social Issues and Professional Practice</option>
										<option value="Basics" <?php echo ((isset($_POST['category'])) && $_POST['category'] == 'Basics')?'selected="selected"':''; ?>>Basics</option>

									</select>
								</div>
								</div>
								
								<div class="form-group form-float">
                                    <div class="form-line">
									<label class="form-label">Author</label>
									<input type="text" name="author" value="<?php echo $author; ?>" class="form-control" required>
								</div>
								</div>
								
								<div class="form-group form-float">
                                    <div class="form-line">
									<label class="form-label">Edition</label>
									<input type="text" name="edition" value="<?php echo $edition; ?>" class="form-control">
								</div>
								</div>
								
								<div class="form-group form-float">
                                    <div class="form-line">
									<label class="form-label">Publisher</label>
									<input type="text" name="publisher" value="<?php echo $publisher; ?>" class="form-control">
								</div>
								</div>
								<div class="form-group form-float">
                                    <div class="form-line">
									<label class="form-label">Year</label>
									<input type="text" name="year" value="<?php echo $year; ?>" class="form-control">
								</div>
								</div>
								
								<div class="form-group form-float">
                                    <div class="form-line">
									<label class="form-label">Availability</label>
									<select name="status" id="myDropDown"  class="form-control show-tick">
									
									<option value="Yes" <?php echo ((isset($_POST['status'])) && $_POST['status'] == 'Yes')?'selected="selected"':''; ?>>Yes</option>
									<option value="No" <?php echo ((isset($_POST['status'])) && $_POST['status'] == 'No')?'selected="selected"':''; ?>>No</option>
									</select>
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