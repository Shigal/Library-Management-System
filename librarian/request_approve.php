
<?php
include('request.php');


	$db = mysqli_connect('localhost', 'root', '', 'lms');
	include('db_conn.php');
	
	$id = $_GET['id'];
	
	$result = mysqli_query($db, "UPDATE request SET approve='ok' WHERE request_id='$id' ");
//	$result1 = mysqli_query($db, "DELETE * FROM request  WHERE request_id='$id' ");

	
	if (!$result) {
		echo "Could not connect" . mysql_error();
	}

	else{
		?>

	<script type="text/javascript">
	alert("Book request accepted!");
	window.location="request.php";
	</script>
<?php
		}
		?>