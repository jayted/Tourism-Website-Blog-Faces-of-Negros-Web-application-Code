<?php

$checkrole="";
if(isset($_SESSION['userID'])){
include('db/db_con.php');
  $sql = "select * from account where acc_id = '".$_SESSION['userID']."'";
   $result = mysqli_query($link,$sql);
  if (mysqli_num_rows($result) > 0) 
  {

      while($row = mysqli_fetch_assoc($result)) {
       $username= $row['username'];
        $role = $row['role'];
        $checkrole = $role;
        $userID = $row['acc_id']; 
   }
}
}
?>