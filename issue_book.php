//<?php  include('book2.php'); ?>
<?php
$db = mysqli_connect('localhost', 'root', '', 'lms');
session_start();
?>

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
	
	<!-- Bootstrap Select Css -->
    <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

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
				<div class="pull-left"><h2>BOOK ISSUE </h2></div>
                <li><i class="material-icons">home</i> Home</li>
                <li><a href="#"><i class="material-icons">library_books</i> Book issue</a></li>
                                
                               
             </ol>
                
            </div>

            <!-- Widgets -->
             <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
						
						
                        <div class="body">
                            


<form action="" method="post">
	<table>
		<tr>
		<td>
		
		<div class="form-group form-float">
			
			<label class="form-label">Enrollment No</label>
				
				<select class="form-control show-tick" name="enroll">
					
					<?php
					$query1 = mysqli_query($db,"SELECT enroll_no FROM member");
					while($row1=mysqli_fetch_array($query1)) {
						echo "<option>";
						echo $row1['enroll_no'];
						echo "</option>";
					}
					?>
					
				</select>
			
			</div>
			
			
		</td>
		
		<td>
			
		<div class="form-group form-float">
			<div class="form-line">
				
			<input type="submit" value="Search" name="submit1" class=" btn btn-primary " style="margin-top: 20px;">
			</div>
		</div>	
			
			
		</td>
		</tr>
	</table>


<?php
	if(isset($_POST['submit1'])){
		$query3 = mysqli_query($db, "SELECT * FROM member WHERE enroll_no='$_POST[enroll]'");
		while($row3=mysqli_fetch_array($query3)){
			$mem_name = $row3['mem_name'];
			$mem_email = $row3['mem_email'];
			$mem_username = $row3['mem_username'];
			$mem_contact = $row3['mem_contact'];
			$enroll_no = $row3['enroll_no'];
			$_SESSION['enroll_no'] = $enroll_no;
			$_SESSION['mem_username'] = $mem_username;
		}
	?>
	<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
		 <div class="body table-responsive">
		<table class="table">
			<tbody>
			<tr>
				<td>
				<div class="form-group form-float">
				<div class="form-line">
					
				<input type="text" class="form-control" value="<?php echo $enroll_no; ?>" placeholder="enroll_no" name="enroll_no" disabled>
				</div>
				</div>
				</td>
			</tr>
		
			<tr>
				<td>
				<div class="form-group form-float">
					<div class="form-line">
					<label class="form-label">Member Name</label>
				<input type="text" class="form-control" value="<?php echo $mem_name; ?>" placeholder="member_name" name="member_name" required>
				</div>
				</div>
				</td>
			</tr>
		
			<tr>
				<td>
				<div class="form-group form-float">
					<div class="form-line">
					<label class="form-label">Contact No</label>
				<input type="text" class="form-control" value="<?php echo $mem_contact; ?>" placeholder="member_contact" name="member_contact" required>
				</div>
				</div>
				</td>
			</tr>
		
			<tr>
				<td>
				<div class="form-group form-float">
					<div class="form-line">
					<label class="form-label">Email</label>
				<input type="text" class="form-control" value="<?php echo $mem_email; ?>" placeholder="member_email" name="member_email" required>
				</div>
				</div>
				</td>
			</tr>
			<tr>
				<div class="form-group form-float">
					<div class="form-line">
				</div>
				</div>
			</tr>
			<tr>
				<div class="form-group form-float">
					<div class="form-line">
					
				
				<select name="bookname" class="form-control show-tick">
					<?php
					 $query2 = mysqli_query($db, "SELECT title FROM book");
					 while($row2=mysqli_fetch_array($query2)){
						echo "<option>";
						echo $row2['title'];
						echo "</option>";
					 }
					?>
				</select>
				</div>
				</div>
			</tr>
		
			<tr>
				<td>
				<div class="form-group form-float">
					<div class="form-line">
					<label class="form-label">Issue Date</label>
				<input type="text" class="form-control" value="<?php echo date("d-M-Y"); ?>" placeholder="issue_date" name="issue_date" required>
				</div>
				</div>
				</td>
			</tr>
		
			<tr>
				<td>
				<div class="form-group form-float">
					<div class="form-line">
					<label class="form-label">Username</label>
				<input type="text" class="form-control" value="<?php echo $mem_username ?>" placeholder="mem_username" name="mem_username" disabled>
				</div>
				</div>
				</td>
			</tr>
		
			<tr>
				<td>
				<div class="form-group form-float">
					
					
				<input type="submit" class="form-control btn btn-primary"  name="submit2" value="Issue Book">
				
				</div>
				</td>
			</tr>
			</tbody>
		</table>
		</div>
		</div>
		</div>
		</div>
	<?php
		
	}
?>

</form>

<?php
	if(isset($_POST['submit2'])){
		$enroll_no1=$_SESSION['enroll_no'];
		$mem_name1=$_POST['member_name'];
		$mem_contact1=$_POST['member_contact'];
		$mem_email1=$_POST['member_email'];
		$mem_username1=$_SESSION['mem_username'];
		$bookname1=$_POST['bookname'];
		$issue_date1=$_POST['issue_date'];
		$query4 = mysqli_query($db, "INSERT INTO issue_status(enroll_no,mem_name,mem_contact,mem_email,mem_username,issued_book_name,issued_date) VALUES( '$enroll_no1', '$mem_name1', '$mem_contact1', '$mem_email1', '$mem_username1', '$bookname1', '$issue_date1') ");
		
		
		if(!$query4){
			echo "Could not connect" . mysql_error();
		}
		else{
			?>
			<script type="text/javascript">
			alert("Book successfully issued!");
			window.location.href=window.location.href;
			</script>
			<?php
		}
	
	}
	?>

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
	
	 <!-- Select Plugin Js -->
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/tables/jquery-datatable.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
</body>

</html>