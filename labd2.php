<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'ims');

	// initialize variables
	$foliono = "";
	$serial = "";
	$intdate = "";
	$warrenty = "";
	$type = "";
	$make = "";
	$model = "";
	$yrmanu = "";
	$state = "";
	$discpt = "";
	$idno = "";
	$update = false;

	if (isset($_POST['save'])) {
		$idno = $_POST['idno'];
		$foliono = $_POST['foliono'];
		$serial = $_POST['serial'];
		$intdate = $_POST['intdate'];
		$warrenty = $_POST['warrenty'];
		$type = $_POST['type'];
		$make = $_POST['make'];
		$model = $_POST['model'];
		$yrmanu = $_POST['yrmanu'];
		$state = $_POST['state'];
		$model = $_POST['discpt'];

		mysqli_query($db, "INSERT INTO lab (idno,foliono,serial,intdate,warrenty,type,make,model,yrmanu,state,model) VALUES ('$idno', '$foliono', '$serial', '$intdate', '$warrenty', '$type', '$make','$model','$yrmanu','$state','$model')"); 
		$_SESSION['message'] = "A Lab Equipment saved!"; 
		header('location: labd3.php');
	}
	if (isset($_POST['update'])) {
		$idno = $_POST['idno'];
		$foliono = $_POST['foliono'];
		$serial = $_POST['serial'];
		$intdate = $_POST['intdate'];
		$warrenty = $_POST['warrenty'];
		$type = $_POST['type'];
		$make = $_POST['make'];
		$model = $_POST['model'];
		$yrmanu = $_POST['yrmanu'];
		$state = $_POST['state'];
		$discpt = $_POST['discpt'];

		mysqli_query($db, "UPDATE lab SET foliono='$foliono', serial='$serial', intdate='$intdate', warrenty='$warrenty', type='$type', make='$make', model='$model', yrmanu='$yrmanu', state='$state', discpt='$discpt' WHERE book_id=$book_id");
		$_SESSION['message'] = "A lab Equipment is updated!"; 
		header('location: labd3.php');
}
	if (isset($_GET['del'])) {
	$idno = $_GET['del'];
	mysqli_query($db, "DELETE FROM lab WHERE idno=$idno");
	$_SESSION['message'] = "A Lab Equipment is deleted!"; 
	header('location: labd3.php');
}
	
	
?>
