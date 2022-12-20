<?php
include('db_conn.php');
?>

<?php

	$mem_id = $_POST['mem_id'];
		
	$query3 = "DELETE FROM `member` WHERE mem_id='$mem_id'";
	
	$result3 = mysql_query($query3);
	
	if($result3)
	{
		header('location:member.php');
	}

?>