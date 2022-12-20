
<?php 
session_start();

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'lms');

// variable declaration
$username = "";
$email    = "";
$errors   = array(); 

// call the register() function if register_btn is clicked
if (isset($_POST['register_btn'])) {
	register();
}

// REGISTER USER
function register(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $mem_username, $mem_email, $mem_address, $mem_contact, $mem_name, $enroll_no;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$enroll_no = e($_POST['enroll_no']);
	$mem_name    =  e($_POST['mem_name']);
	$mem_contact    =  e($_POST['mem_contact']);
	$mem_address   =  e($_POST['mem_address']);
	$mem_username    =  e($_POST['mem_username']);
	$mem_email       =  e($_POST['mem_email']);
	$password_1  =  e($_POST['password_1']);
	$password_2  =  e($_POST['password_2']);
	
	$q = "SELECT * FROM member WHERE mem_username='$mem_username'";
	$r = mysqli_query($db, $q);
	if(mysqli_num_rows($r) > 0){
		array_push($errors, "Sorry... username already taken");
	}

	// form validation: ensure that the form is correctly filled
	if (empty($mem_username)) { 
		array_push($errors, "Username is required"); 
	}
	if (empty($mem_name)) { 
		array_push($errors, "Name is required"); 
	}
	if (empty($mem_email)) { 
		array_push($errors, "Email is required"); 
	}
	if (empty($mem_address)) { 
		array_push($errors, "Address is required"); 
	}
	if (empty($mem_contact)) { 
		array_push($errors, "Contact is required"); 
	}
	if (empty($enroll_no)) { 
		array_push($errors, "Enrollment No is required"); 
	}
	if (empty($password_1)) { 
		array_push($errors, "Password is required"); 
	}
	if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
	}
	

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password_1);//encrypt the password before saving in the database

			
	echo		$query = "INSERT INTO member (enroll_no, mem_name, mem_contact, mem_address, mem_username, password, mem_email, mem_type, reg_date,user_type, active) 
					  VALUES('$enroll_no', '$mem_name', '$mem_contact', '$mem_address', '$mem_username', '$password', '$mem_email', '$mem_type', now(),'user','No')";
			mysqli_query($db, $query);

			// get id of the created user
			$logged_in_user_id = mysqli_insert_id($db);

			$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
//			$_SESSION['success']  = "You are now logged in";
			header('location: member/login.php');				
		
	}
}

if (isset($_POST['register_btn2'])) {
	register2();
}

// REGISTER USER
function register2(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $username, $email;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$username    =  e($_POST['username']);
	$email       =  e($_POST['email']);
	$password_1  =  e($_POST['password_1']);
	$password_2  =  e($_POST['password_2']);

	// form validation: ensure that the form is correctly filled
	if (empty($username)) { 
		array_push($errors, "Username is required"); 
	}
	if (empty($email)) { 
		array_push($errors, "Email is required"); 
	}
	if (empty($password_1)) { 
		array_push($errors, "Password is required"); 
	}
	if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
	}
	$query2 = "SELECT * FROM login WHERE username='$username'";
	$result2 = mysqli_query($db, $query2);
	
	if(mysqli_num_rows($result2) > 0 ){
		array_push($errors, "Sorry... username already taken!");
	}

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password_1);//encrypt the password before saving in the database

		$query = "INSERT INTO login (username, email, user_type, password) 
					  VALUES('$username', '$email', 'admin', '$password')";
			mysqli_query($db, $query);

			// get id of the created user
			$logged_in_user_id = mysqli_insert_id($db);

			$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
			$_SESSION['success']  = "You are now logged in";
			header('location: ../index.php');			
	}
}

// return user array from their id
function getUserById($id){
	global $db;
	$query = "SELECT * FROM member WHERE mem_id=" . $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

// escape string
function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}	
function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}
// log user out if logout button clicked
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: index.php");
}
// call the login() function if register_btn is clicked
if (isset($_POST['login_btn'])) {

	login();
}

// LOGIN USER
function login(){
	global $db, $username, $errors;

	// grap form values
	$username = e($_POST['username']);
	$password = e($_POST['password']);

	// make sure form is filled properly
	if (empty($username)) {
		array_push($errors, "Username is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	// attempt login if no errors on form
	if (count($errors) == 0) {
		$password = md5($password);

	$query = "SELECT * FROM login WHERE username='$username' AND password='$password' LIMIT 1";
		$results = mysqli_query($db, $query);
//	 mysqli_num_rows($results);
		if (mysqli_num_rows($results) == 1) { // user found
			// check if user is admin or user
			$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['user_type'] == 'admin') {

				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: librarian/home.php');		  
			}else{
				  $_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";  
				
				header('location: member/issued_book.php');	
				}
		}else {
			array_push($errors, "Wrong username/password combination");
		}
	}
}

/* if (isset($_POST['login-btn2'])) {

	login2();
}

// LOGIN USER
function login2(){
	global $db, $username, $errors;

	// grap form values
	$username = e($_POST['username']);
	$password = e($_POST['password']);

	// make sure form is filled properly
	if (empty($username)) {
		array_push($errors, "Username is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	// attempt login if no errors on form
	if (count($errors) == 0) {
		$password = md5($password);

	$query = "SELECT * FROM member WHERE mem_username='$username' AND password='$password' LIMIT 1";
		$results = mysqli_query($db, $query);
	 mysqli_num_rows($results);
		if (mysqli_num_rows($results) == 1) { // user found
			// check if user is admin or user
			$logged_in_user = mysqli_fetch_assoc($results);
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				
				header('location: member/home.php');	
				
		}else {
			array_push($errors, "Wrong username/password combination");
		}
	}
}
 */
			
				


// ...
function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}

function isMember()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'user' ) {
		return true;
	}else{
		return false;
	}
}
