

<?php
	$db = mysqli_connect('localhost', 'root', '', 'lms');
	include('db_conn.php');
	
	$id = $_GET['id'];
	$date = date("d-M-Y");
	$result = mysqli_query($db, "UPDATE issue_status SET return_date='$date' WHERE issue_id='$id' ");


if(!$result){
			echo "Could not connect" . mysql_error();
		}
		else{
			?>

<script type="text/javascript">
	alert("Book successfully returned!");
	window.location="return_book.php";

</script>

<?php
		}
		?>