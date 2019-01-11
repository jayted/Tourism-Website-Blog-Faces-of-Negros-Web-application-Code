<?php
	session_start();
include('db/db_con.php');
	
$today = ''.date('m').'-'.date('d').'-'.date('Y');
$day = date('d');
$month = date('M');
$yr = date('Y');
	if (isset($_POST["review"])) {
		$rate = $_POST["rating"];
		$comment = $_POST["comment"];
		$place = $_POST["place"];
		$type = $_POST["type"];
		$address = $_POST["address"];
		$user = $_SESSION["userID"];
	    $username = $_POST["username"];
	
		$query1 = "INSERT INTO `rating`(`acc_id`, `place_id`, `comment`, `rating_no`, `username`, `monthly`,`yearly`,`date`,`type`) VALUES ('$user' ,'$place' ,'$comment' ,'$rate','$username','$month','$yr','$today','$type');";
		mysqli_query($dbconn, $query1);
		
		header('Location: '.$_SERVER['HTTP_REFERER']);
	}
		if (isset($_POST["anonymous"])) {
					$comment = $_POST["pend_comment"];
		$place = $_POST["place"];
		$address = $_POST["address"];
	    $email = $_POST["pend_email"];
		echo $rate." ".$comment." ".$place." ".$user;
		$check1=mysqli_query($dbconn,"select * from pending_comments where email='$email'");
    $checkrows1=mysqli_num_rows($check1);
     if($checkrows1>0) {
  	header('Location: '.$_SERVER['HTTP_REFERER']);
   } else {  
		$query = "INSERT INTO `pending_comments`(`email`, `place_id`, `comment`, `monthly`,`yearly`,`date`) VALUES ('$email' ,'$place' ,'$comment' ,'$month','$yr','$today');";
		mysqli_query($dbconn, $query);
		}
	header('Location: '.$_SERVER['HTTP_REFERER']);
		}

	if (isset($_POST["reviewagain"])) {
		$rate = $_POST["rating"];
		$comment = $_POST["comment"];
		$place = $_POST["place"];
		$address = $_POST["address"];
		$user = $_POST["user"];
		echo $rate." ".$comment." ".$place." ".$user;
			$query2 = "UPDATE `rating` SET `comment` = '$comment', `rating_no` = '$rating_no' WHERE `place_id` = `place` = $user AND `rating`.`place_id` = $place;";
	 $query2 = "UPDATE rating set comment = '$comment',rating_no = '$rate',type = '$type'  where place_id = '$place' and acc_id = '$user'";
		mysqli_query($dbconn, $query2);
		
	header('Location: '.$_SERVER['HTTP_REFERER']);
	}
?>