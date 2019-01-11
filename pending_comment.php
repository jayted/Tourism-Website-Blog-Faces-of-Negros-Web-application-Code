<?php
	session_start();
	include('db/db_con.php');
	
$today = ''.date('M').'-'.date('d').'-'.date('Y');
$day = date('d');
$month = date('M');
$yr = date('Y');
	if (isset($_POST["review"])) {
	
		$comment = $_POST["pend_comment"];
		$place = $_POST["place"];
		$address = $_POST["address"];
	    $email = $_POST["email"];
		echo $rate." ".$comment." ".$place." ".$user;
		$query = "INSERT INTO `pending_comments`(`email`, `place_id`, `comment`, `monthly`,`yearly`,`date`) VALUES ('$email' ,'$place' ,'$comment' ,'$month','$yr','$today');";
		mysqli_query($dbconn, $query);
		
	header("Location:info.php?place_id=$place&address=$address");
	}


?>