<?php session_start(); ?>

<?php
include('check.php');
?>


<?php

if(isset($_SESSION['userID'])){
header('Location: '.$_SERVER['HTTP_REFERER']);
}elseif(isset($_SESSION['admin'])){
header('Location: '.$_SERVER['HTTP_REFERER']);
}
include('db/db_con.php');

  $username = $_POST["userName"];
  $password = MD5($_POST["password"]);
  
  $query = "SELECT username, password FROM account WHERE account.username='$username' AND account.password='$password'";
  $result= mysqli_query($connect, $query) or die("Query failed.");


  if(mysqli_num_rows($result) == 1){
      $_SESSION["userName"] = $username;
      $query = "SELECT acc_id FROM account WHERE username='$username';";
      $result= mysqli_query($connect, $query);
      $row = mysqli_fetch_assoc($result);
      $_SESSION["userID"] = $row['acc_id'];
    
  }
  else{
 $username = $_POST["userName"];
    $password = MD5($_POST["password"]);

    $query = "SELECT username, password,role FROM admin WHERE admin.username='$username' AND admin.password='$password' and admin.role = 'admin' ";
    $result= mysqli_query($connect, $query) or die("Query failed.");


    if(mysqli_num_rows($result) == 1){
      class OS_BR{    
private $agent = "";
private $info = array();

function __construct(){
    $this->agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : NULL;
    $this->getBrowser();
    $this->getOS();
}     
function getBrowser(){     
    $browser = array("Navigator"            => "/Navigator(.*)/i",
                     "Firefox"              => "/Firefox(.*)/i",
                     "Internet Explorer"    => "/MSIE(.*)/i",
                     "Google Chrome"        => "/chrome(.*)/i",
                     "MAXTHON"              => "/MAXTHON(.*)/i",
                     "Opera"                => "/Opera(.*)/i",
                     );
    foreach($browser as $key => $value){
        if(preg_match($value, $this->agent)){
            $this->info = array_merge($this->info,array("Browser" => $key));
            $this->info = array_merge($this->info,array(
              "Version" => $this->getVersion($key, $value, $this->agent)));
            break;
        }else{
            $this->info = array_merge($this->info,array("Browser" => "UnKnown"));
            $this->info = array_merge($this->info,array("Version" => "UnKnown"));
        }
    }
    return $this->info['Browser'];
}
function getOS(){
    $OS = array("Windows"   =>   "/Windows/i",
                "Linux"     =>   "/Linux/i",
                "Unix"      =>   "/Unix/i",
                "Mac"       =>   "/Mac/i"
                );

    foreach($OS as $key => $value){
        if(preg_match($value, $this->agent)){
            $this->info = array_merge($this->info,array("Operating System" => $key));
            break;
        }
    }
    return $this->info['Operating System'];
}

function getVersion($browser, $search, $string){
    $browser = $this->info['Browser'];
    $version = "";
    $browser = strtolower($browser);
    preg_match_all($search,$string,$match);
    switch($browser){
        case "firefox": $version = str_replace("/","",$match[1][0]);
        break;

        case "internet explorer": $version = substr($match[1][0],0,4);
        break;

        case "opera": $version = str_replace("/","",substr($match[1][0],0,5));
        break;

        case "navigator": $version = substr($match[1][0],1,7);
        break;

        case "maxthon": $version = str_replace(")","",$match[1][0]);
        break;

        case "google chrome": $version = substr($match[1][0],1,10);
    }
    return $version;
}

function showInfo($switch){
    $switch = strtolower($switch);
    switch($switch){
        case "browser": return $this->info['Browser'];
        break;

        case "os": return $this->info['Operating System'];
        break;

        case "version": return $this->info['Version'];
        break;

        case "all" : return array($this->info["Version"], 
          $this->info['Operating System'], $this->info['Browser']);
        break;

        default: return "Unknown";
        break;

    }
}
 }    


            $_SESSION["userName"] = $username;
            $query = "SELECT acc_id FROM admin WHERE username='$username';";
            $result= mysqli_query($connect, $query);
            $row = mysqli_fetch_assoc($result);
            $_SESSION["admin"] = $row['acc_id'];
            $obj = new OS_BR();

$browser =  $obj->showInfo('browser');
$os = $obj->showInfo('os');
$ip = $externalIp; 
$timestamp = date("m/d/Y g:i", time());
$label = "login";
 $query2 = "INSERT INTO logs(label,ip_address,browser,os,date) values('$label','$ip','$browser','$os','$timestamp')";
 $result= mysqli_query($connect, $query2) or die("Query failed.");
        
    }
  
  }
   header('Location: '.$_SERVER['HTTP_REFERER']);

?>