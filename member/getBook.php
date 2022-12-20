<?php
	include "../db_conn.php";
	$db = mysqli_connect("localhost", "root", "","lms");
	$categoryid = $_POST['category'];   // category id

	$sql = "SELECT book_no,title FROM book WHERE category=".$categoryid;

	$result = mysqli_query($db,$sql);

	$book_arr = array();

	while( $row = mysqli_fetch_array($result) ){
		$book_no = $row['book_no'];
		$title = $row['title'];

		$book_arr[] = array("book_no" => $book_no, "title" => $title);
	}
	// encoding array to json format
echo json_encode($book_arr);
?>