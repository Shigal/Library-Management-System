<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'lms');

	// initialize variables
	$book_no = "";
	$isbn = "";
	$title = "";
	$category = "";
	$author = "";
	$edition = "";
	$publisher = "";
	$year = "";
	$status = "";
	$book_id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$book_no = $_POST['book_no'];
		$isbn = $_POST['isbn'];
		$title = $_POST['title'];
		$category = $_POST['category'];
		$author = $_POST['author'];
		$edition = $_POST['edition'];
		$publisher = $_POST['publisher'];
		$year = $_POST['year'];
		$status = $_POST['status'];
		//status as 'yes'

		mysqli_query($db, "INSERT INTO book (book_no,isbn,title,category,author,edition,publisher,year,status) VALUES ('$book_no', '$isbn', '$title', '$category',  '$author', '$edition', '$publisher', '$year', '$status')"); 
		$_SESSION['message'] = "Book saved"; 
		header('location: bookd.php');
	}
	if (isset($_POST['update'])) {
		$book_id = $_POST['book_id'];
		$book_no = $_POST['book_no'];
		$isbn = $_POST['isbn'];
		$title = $_POST['title'];
		$category = $_POST['category'];
		$author = $_POST['author'];
		$edition = $_POST['edition'];
		$publisher = $_POST['publisher'];
		$year = $_POST['year'];
		$status = $_POST['status'];

		mysqli_query($db, "UPDATE book SET book_no='$book_no', isbn='$isbn', title='$title', category='$category', author='$author', edition='$edition', publisher='$publisher', year='$year', status='$status' WHERE book_id= '$book_id'");
		$_SESSION['message'] = "Book updated!"; 
		header('location: bookd.php');
}
	if (isset($_GET['del'])) {
	$book_id = $_GET['del'];
	mysqli_query($db, "DELETE FROM book WHERE book_id=$book_id");
	$_SESSION['message'] = "Book deleted!"; 
	header('location: bookd.php');
}
	if(isset($_POST['issue'])){
		$issue_id = $_POST['issue_id'];
		$isbn = $_POST['isbn'];
		$issued_book_name = $_POST['issued_book_name'];
		$issued_mem = $_POST['issued_mem'];
		$mem_name = $_POST['mem_name'];
		$issued_date = $_POST['issued_date'];
		$return_date = $_POST['return_date'];
		
		mysqli_query($db, "SELECT book.isbn,book.title,member.mem_id,member.mem_name,issue_status.issued_date,return_status.return_date FROM issue_status INNER JOIN member ON issued_mem=mem_id INNER JOIN book ON issued_book_name=title WHERE issue_id='$issue_id'");
		$_SESSION['message'] = "Book is Issued!";
		header('location: issue_book.php');
	}
	
?>
