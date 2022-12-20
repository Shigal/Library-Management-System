<?php
include('db_conn.php');
?>

<?php

	$isbn = $_POST['isbn'];
		
	$query3 = "DELETE FROM `book` WHERE isbn='$isbn'";
	
	$result3 = mysql_query($query3);
	
	if($result3)
	{
		header('location:book.php');
	}

?>