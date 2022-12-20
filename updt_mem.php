<?php
include('db_conn.php');
?>

<?php

	$mem_id = $_POST['mem_id'];
	$type = $_POST['type'];
	$data = $_POST['data'];
	
	if($type=="Member Name")
	{
		
		$query3="UPDATE `member` SET `mem_name`='$data' WHERE mem_id='$mem_id'";
	}
	if($type=="Email")
	{
		
		$query3="UPDATE `member` SET `email`='$data' WHERE mem_id='$mem_id'";
	}
	if($type=="Member Type")
	{
		
		$query3="UPDATE `member` SET `mem_type`='$data' WHERE mem_id='$mem_id'";
	}
	
	
	$result3 = mysql_query($query3);
	
	if($result3)
	{
		header('location:member.php');
	}

?>