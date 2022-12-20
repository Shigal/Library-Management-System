<?php
	include('db_conn.php');
?>

<?php
	$nameError ="";
	
	if(isset($_POST['reset-password'])){
		$username = trim($_POST['username']);
		$username = strip_tags($username);
		$username = htmlspecialchars($username);

		$password = $_POST['password'];
		$password = strip_tags($password);
		$password = htmlspecialchars($password);
		$password = md5($password);
	}
	if(empty($name)){
			$error = true;
			$nameError = "Please enter your username.";
		}
		
		$query3="UPDATE `login` SET `password`='$password' WHERE `username` ='$username'";
	
	$result3 = mysql_query($query3);
	
	if($result3)
	{
		header('location:forgot_pword.html');
	}

?>