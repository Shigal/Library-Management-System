<?php
include('db_conn.php');
?>

<?php
	$mem_id = $_POST['mem_id'];
	$mem_name = $_POST['mem_name'];
	$email = $_POST['email'];
	$mem_type  = $_POST['mem_type'];
	
	
	$query10 = "SELECT * FROM `member` WHERE `mem_id`='$mem_id'";
			$result10 = mysql_query($query10);
			$count10 = mysql_num_rows($result10);
			if($count10!=0){				 
				 $message = "Entry already exist";
					echo "<script type='text/javascript'>window.confirm('$message');</script>";
					/* exit("<script type='text/javascript'>alert('$message');</script>"); */
					/* header('location:add_lab.html'); */
					echo "<script type='text/javascript'>window.location.href=\"add_mem.html\";</script>";
					
					die();
			}
			
			else
			{	
	$query3 = "INSERT INTO member (mem_name,email,mem_type,reg_date) VALUES('$mem_name','$email','$mem_type',NOW())";
	
	$result3 = mysql_query($query3);
	
	if($result3)
	{
		header('location:add_mem.html');
	}
			}
?>