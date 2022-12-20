<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'lms');

	// initialize variables
	$mem_name = "";
	$mem_contact = "";
	$mem_address = "";
	$enroll_no = "";
	$mem_username = "";
	$mem_email = "";
	$mem_type = "";
	$mem_image = "";
	$user_type = "";
	$password = "";
	$reg_date = "";
	
	$mem_id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$mem_name = $_POST['mem_name'];
		$mem_email = $_POST['mem_email'];
		$mem_type = $_POST['mem_type'];
		$mem_contact = $_POST['mem_contact'];
		$mem_address = $_POST['mem_address'];
		$mem_username = $_POST['mem_username'];
		
		$password = $_POST['password'];
		$password = md5($password);
		
		$enroll_no = $_POST['enroll_no'];
		
		$tm = md5(time());
		$filename = $_FILES['f1']['name'];
		$dst = "../images/user_images/" .$tm. $filename;
		$dst1 = "images/user_images/" .$tm. $filename;
	
	move_uploaded_file($_FILES['f1']['tmp_name'], $dst);

		mysqli_query($db, "INSERT INTO member (enroll_no,mem_name,mem_contact,mem_address,mem_username, password,mem_email,mem_type,mem_image,user_type, reg_date) VALUES ('$enroll_no','$mem_name', '$mem_contact','$mem_address', '$mem_username','$password',  '$mem_email', '$mem_type','$dst1','user', NOW())"); 
		$_SESSION['message'] = "Member saved"; 
		header('location: memberd.php');
	}
	if (isset($_POST['update'])) {
		$mem_id = $_POST['mem_id'];
		$mem_name = $_POST['mem_name'];
		$mem_email = $_POST['mem_email'];
		$mem_type = $_POST['mem_type'];
		$mem_contact = $_POST['mem_contact'];
		$mem_address = $_POST['mem_address'];
		$mem_username = $_POST['mem_username'];
		$enroll_no = $_POST['enroll_no'];
		
		$tm = md5(time());
		$filename = $_FILES['f1']['name'];
		$dst = "../images/user_images/" .$tm. $filename;
		$dst1 = "images/user_images/" .$tm. $filename;
	
	move_uploaded_file($_FILES['f1']['tmp_name'], $dst);

		mysqli_query($db, "UPDATE member SET mem_name='$mem_name', mem_email='$mem_email', mem_contact='$mem_contact', mem_email='$mem_email', mem_type='$mem_type', mem_address='$mem_address', enroll_no='$enroll_no', mem_image='$dst1' WHERE mem_id= '$mem_id'");
		$_SESSION['message'] = "Member updated!"; 
		header('location: memberd.php');
}
	if (isset($_GET['del'])) {
	$mem_id = $_GET['del'];
	mysqli_query($db, "DELETE FROM member WHERE mem_id=$mem_id");
	$_SESSION['message'] = "Member deleted!"; 
	header('location: memberd.php');
}

function processDrpdown($selectedVal) {
		echo "Selected value in php ".$selectedVal;
	} 	
	
?>
