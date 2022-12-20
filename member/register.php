<?php
include('functions.php');


//...
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In</title>
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

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="signup-page">
    <div class="signup-box">
        <div class="logo">
           <b> Library Management System</b>
            
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_up" method="POST" action="register.php">
                    <div class="msg">Register a new membership</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="Email Address" required>
                        </div>
                    </div>
					
					 <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">people</i>
                        </span>
                        <div class="form-line">
                            <select name="mem_type" id="user_type" class="form-control show-tick">
								<option value="">Select member type....</option>

								<option value="academic_staff">Academic Staff</option>
								<option value="postgraduate">Postgraduate</option>
								<option value="undergraduate">Undergraduate</option>
								<option value="temporary_research_assistant">Temporary Research Assistant</option>
								<option value="permanent_research_assistant">Permanent Research Assistant</option>
							</select>
                        </div>
                    </div>
					
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password_1"  placeholder="Password" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password_2"  placeholder="Confirm Password" required>
                        </div>
                    </div>
                    

                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit" name="register_btn">SIGN UP</button>

                    <div class="m-t-25 m-b--5 align-center">
                        <a href="login.php">You already have a membership?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/examples/sign-up.js"></script>
</body>
</html>
<?php ob_end_flush(); ?>