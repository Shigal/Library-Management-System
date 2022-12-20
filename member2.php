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
	
	$mem_id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$mem_name = $_POST['mem_name'];
		$mem_email = $_POST['mem_email'];
		$mem_type = $_POST['mem_type'];
		$mem_contact = $_POST['mem_contact'];
		$mem_address = $_POST['mem_address'];
		$mem_username = $_POST['mem_username'];
		$enroll_no = $_POST['enroll_no'];
		

		mysqli_query($db, "INSERT INTO member (enroll_no,mem_name,mem_contact,mem_address,mem_username,mem_email,mem_type) VALUES ('$enroll_no','$mem_name', '$mem_contact','$mem_address', '$mem_username', '$mem_email', '$mem_type')"); 
		$_SESSION['message'] = "Member saved"; 
		header('location: member.php');
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

		mysqli_query($db, "UPDATE member SET mem_name='$mem_name', mem_email='$mem_email', mem_contact='$mem_contact' mem_email='$mem_email', mem_type='$mem_type', mem_address='$mem_address' enroll_no='$enroll_no' WHERE mem_id= '$mem_id'");
		$_SESSION['message'] = "Member updated!"; 
		header('location: member.php');
}
	if (isset($_GET['del'])) {
	$book_id = $_GET['del'];
	mysqli_query($db, "DELETE FROM member WHERE mem_id=$mem_id");
	$_SESSION['message'] = "Member deleted!"; 
	header('location: member.php');
}
	
	
?>
