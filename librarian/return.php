
<?php
include('return_book.php');


	$db = mysqli_connect('localhost', 'root', '', 'lms');
	include('../db_conn.php');
	
	$id = $_GET['id'];

	$return_date1 = date('Y-m-d');
	$result = mysqli_query($db, "UPDATE issue_status SET return_date='$return_date1' WHERE issue_id='$id' ");
	$result2 = mysqli_query($db, "UPDATE book SET status='Yes' WHERE book_no='$_SESSION[issued_book_no]' ");

	   $que = mysqli_query($db, "SELECT  * FROM issue_status WHERE issue_id = '$id'");
	   while($row = mysqli_fetch_array($que)){

		$due_date1 = $row['due_date'];
	   }

	   
	$return_date = strtotime($return_date1);	   
	$due_date = strtotime($due_date1);	   
      $timeDiff = abs($return_date - $due_date);
      $numberDays = $timeDiff/86400;  // 86400 seconds in one day
     $numberDays = intval($numberDays);

//       $noOfdaysToCheck ="7";

       $fine ="10";
		$amount = $numberDays * $fine;
      /*  if ($numberDays >= $noOfdaysToCheck){
			$amount = $numberDays * $fine;
        } */

//       $amount = number_format($amount, 2, '.', '');
//       echo $amount;
		echo "UPDATE issue_status SET fine='$amount' WHERE issue_id='$id' ";
	$result3 = mysqli_query($db, "UPDATE issue_status SET fine='$amount' WHERE issue_id='$id' ");

	
	
	if (!$result3){
		echo "Could not connect" . mysql_error();
	}

		else{
			echo "Your fine amount is ".$amount;
			?>
	
		<script type="text/javascript">
		alert("Book successfully returned, and the fine amount is Rs.<?php echo $amount ?>");
		window.location="return_book.php";
		</script>
<?php
		}
		?>