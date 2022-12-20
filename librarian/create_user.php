<?php
include('../functions.php');


//...
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In</title>
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

    <!-- Custom Css -->
    <link href="../css/style.css" rel="stylesheet">
</head>

<body class="signup-page">
    <div class="signup-box">
        <div class="logo">
		<a href="#">
            <b>LIBSYS@DCS</b>
			<small></small>
         </a>   
        </div>
        <div class="card">
            <div class="body">
			<?php echo display_error(); ?>
                <form id="sign_up" method="POST" action="create_user.php">
                    <div class="msg">CREATE NEW ADMIN</div>
					
					 
					
                    <div class="input-group">
                        
                            <label>Username</label>
                        
                        <div class="form-line">
                            <input type="text" class="form-control" name="username"  value="<?php echo $username; ?>" >
                        </div>
                    </div>
                    <div class="input-group">
                        
                           <label>Email</label>
                        
                        <div class="form-line">
                            <input type="email" class="form-control" name="email"  value="<?php echo $email; ?>">
                        </div>
                    </div>
					
					 
					
					
                    <div class="input-group">
                        
                            <label>Password</label>
                        
                        <div class="form-line">
                            <input type="password" class="form-control" name="password_1" >
                        </div>
                    </div>
                    <div class="input-group">
                        
                           <label>Confirm Password</label>
                        
                        <div class="form-line">
                            <input type="password" class="form-control" name="password_2">
                        </div>
                    </div>
                    

                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit" name="register_btn2">CREATE USER</button>

                    
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="../plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="../plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="../js/admin.js"></script>
    <script src="../js/pages/examples/sign-up.js"></script>
</body>
</html>
