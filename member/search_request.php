
<?php
include('search_book.php');


	$db = mysqli_connect('localhost', 'root', '', 'lms');
	include('../db_conn.php');
	
	$id = $_GET['id'];
	
	$mem_id = $userRow['mem_id'];
	
	
		$query1 = "SELECT * FROM request WHERE id='$mem_id' AND approve=''";
		$result = mysqli_query($db, $query1);
		
		if(mysqli_num_rows($result) == 0){
		$query = "INSERT INTO request(id, message, logs) VALUES('$mem_id', '{$_SESSION['book_no']}', now())";
		$res = mysqli_query($db, $query);
		if(!$res){
			echo "Could not connect".mysql_error();
		}
		
		else{
			?>
			<script type="text/javascript">
			alert("Book request send to Librarian!");
			window.location="search_book.php";
			</script>
			<?php
			
		}
		}
		
		else{
			?>
			<script type="text/javascript">
		alert("Sorry, You can request only one book & you have already requested a book!");
		window.location="search_book.php";
		</script>
			<?php
		}
	
	
		
	
?>
	
	