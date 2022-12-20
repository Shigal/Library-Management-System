<?php
include('db_conn.php');
?>

<?php
	$book_id = $_POST['book_id'];
	$isbn = $_POST['isbn'];
	$title = $_POST['title'];
	$author  = $_POST['author'];
	$edition = $_POST['edition'];
	$status = $_POST['status'];
	$copies = $_POST['copies'];
	$keyword = $_POST['keyword'];
	
	$query10 = "SELECT * FROM `book` WHERE `book_id`='$book_id'";
			$result10 = mysql_query($query10);
			$count10 = mysql_num_rows($result10);
			if($count10!=0){				 
				 $message = "Entry already exist";
					echo "<script type='text/javascript'>window.confirm('$message');</script>";
					/* exit("<script type='text/javascript'>alert('$message');</script>"); */
					/* header('location:add_lab.html'); */
					echo "<script type='text/javascript'>window.location.href=\"add_book.html\";</script>";
					
					die();
			}
			
			else
			{	
	$query3 = "INSERT INTO book (isbn,title,author,edition,status,copies,keyword) VALUES('$isbn','$title','$author','$edition','$status','$copies','$keyword')";
	
	$result3 = mysql_query($query3);
	
	if($result3)
	{
		header('location:add_book.html');
	}
			}
?>