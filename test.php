<?php

date_default_timezone_set('Asia/Manila');
$todays_date = date("y-m-d h:i:sa");
$today = strtotime($todays_date);
echo "<br>";echo "<br>";
echo "Current time ";
echo "<br>";


echo date("Y-m-d h:i:sa", $today);

$todays_date = date("y-m-d h:i:sa");
$today = strtotime($todays_date);
echo "<br>";echo "<br>";
echo "Current time + 5minutes";
echo "<br>";
$today1=strtotime("+5 minutes");

echo date("Y-m-d h:i:sa", $today1);
