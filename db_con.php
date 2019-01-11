<?php 

    $link = mysqli_connect('localhost:3306','root','','tourist') or die("Could not connect");
    mysqli_set_charset($link,"utf8");



// Database configuration
$dbHost     = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName     = "tourist";

// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}



$connect = mysqli_connect("localhost", "root", "", "tourist");



	$host = 'localhost';  
	$username = 'root'; 
	$password = ''; 
	$db = 'tourist'; 
	$dbconn = mysqli_connect($host,$username,$password) or die("Could not connect to database!"); 
	mysqli_select_db($dbconn, 'tourist') or die( "Unable to select database");


    $connect = mysqli_connect("localhost","root","","tourist") or die("Could not connect to the database.");






$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "tourist";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 









try
{
    $bdd = new PDO('mysql:host=localhost;dbname=tourist;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}





$db_host        = 'localhost';
$db_user        = 'root';
$db_pass        = '';
$db_database    = 'tourist'; 

$db = new PDO('mysql:host='.$db_host.';dbname='.$db_database, $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $connect = mysqli_connect("localhost","root","","tourist") or die("Could not connect to the database.");



    $mysqlUserName      = "root";
    $mysqlPassword      = "";
    $mysqlHostName      = "localhost";
    $DbName             = "tourist";
    $backup_name        = "mybackup.sql";
    $tables             = "Your tables";
 ?>

           <?php
// Database configuration
$dbHost     = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName     = "tourist";

// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>