<?php
include('db_conn.php');
?>

<?php

	$isbn = $_POST['isbn'];
	$type = $_POST['type'];
	$data = $_POST['data'];
	
	if($type=="Book Title")
	{
		
		$query3="UPDATE `book` SET `title`='$data' WHERE isbn='$isbn'";
	}
	if($type=="Author")
	{
		
		$query3="UPDATE `book` SET `author`='$data' WHERE isbn='$isbn'";
	}
	if($type=="Status")
	{
		
		$query3="UPDATE `book` SET `status`='$data' WHERE isbn='$isbn'";
	}
	if($type=="Edition")
	{
		
		$query3="UPDATE `book` SET `edition`='$data' WHERE isbn='$isbn'";
	}
	
	if($type=="Keyword")
	{
		
		$query3="UPDATE `book` SET `keyword`='$data' WHERE isbn='$isbn'";
	}
	if($type=="Copies")
	{
		
		$query3="UPDATE `book` SET `copies`='$data' WHERE isbn='$isbn'";
	}
	
	
	$result3 = mysql_query($query3);
	
	if($result3)
	{
		header('location:book.php');
	}

?>