<?php session_start(); ?>



<?php
include('check.php');
?><!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Faces of negros</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBnfuZaF24gZR-ag3UFu7qFiaJ69z0v6o0&callback=initMap"
  type="text/javascript"></script>
    <link rel="icon" href="logo/lg.jpg" sizes="32x32">
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="logo/lg.jpg">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="logo/lg.jpg">
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
 <style type="text/css">
    .red {
    color: red;
}
  .gray {
    color: #ddd;
}
  </style>
  <style type="text/css">
          html, body, .container-fluid,#map_canvas {
    height:100%;
}
.container-fluid {
    width:100%;

    top:0;
    padding:0;
}
#map_canvas {

}
#fixedbutton {
    position: fixed;
    bottom: 12px;
    right: 40px; 
}
.round-button {
  width:70px;
}
.round-button-circle {
  width: 100%;
  height:0;
  padding-bottom: 100%;
  border-radius: 50%;
  border:10px solid #cfdcec;
  overflow:hidden;
        
  background: #51BD46; 
  box-shadow: 0 0 3px gray;
}
.round-button-circle:hover {
  background:#30588e;
}
.round-button a {
  display:block;
  float:left;
  width:100%;
  padding-top:50%;
  padding-bottom:50%;
  line-height:1em;
  margin-top:-0.5em;
        
  text-align:center;
  color:#e2eaf3;
  font-family:Verdana;
  font-size:1.2em;
  font-weight:bold;
  text-decoration:none;
}

        </style>
  <link rel="stylesheet" type="text/css" href="fonts/themify/themify-icons.css">
  <!-- styles -->
 <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="fonts/themify/themify-icons.css">
  <!-- styles -->
<link href="assets/css/bootstrap.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/css/bootstrap-responsive.css" rel="stylesheet">
  <link href="assets/css/docs.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/prettyPhoto/3.1.6/css/prettyPhoto.css" rel="stylesheet">
  <link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet">
  <link href="assets/css/camera.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300|Open+Sans:400,300,300italic,400italic" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/color/success.css" rel="stylesheet">
  <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css' rel='stylesheet' />

  <!-- fav and touch icons -->

  <!-- =======================================================
    Theme Name: Scaffold
    Theme URL: https://bootstrapmade.com/scaffold-bootstrap-metro-style-template/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body  onload="initialize()" class="animsition" data-spy="scroll" data-target=".bs-docs-sidebar">

  <header>
    <!-- Navbar
    ================================================== -->
    <?php include('nav.php'); ?>
  </header>
    <?php

    $link = mysqli_connect('localhost:3306','root','','tourist') or die("Could not connect");
    mysqli_set_charset($link,"utf8");
  
    $address = $_GET['address'];

    $sql = "select *  from municipalities where address = '$address'";
    // echo $sql;
    $result = mysqli_query($link,$sql);
    if (mysqli_num_rows($result) > 0) 
    {
        while($row = mysqli_fetch_assoc($result)) {
        
           $cname = $row['name'];
           $cdescription = $row['description'];
             $caddress = $row['address'];
              $cimage = $row['image'];
              $mun_id = $row['mun_id'];
          
         }}
         
    ?>

<script type="text/javascript">
  var geocoder;
  var map;
  var address ="<?php echo $caddress ?>";
  function initialize() {
    geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(-34.397, 150.644);
    var myOptions = {
      zoom: 8,
      center: latlng,
    mapTypeControl: true,
    mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
    navigationControl: true,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
    if (geocoder) {
      geocoder.geocode( { 'address': address}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          if (status != google.maps.GeocoderStatus.ZERO_RESULTS) {
          map.setCenter(results[0].geometry.location);

            var infowindow = new google.maps.InfoWindow(
                { content: '<b>'+address+'</b>',
                  size: new google.maps.Size(150,50)
                });

            var marker = new google.maps.Marker({
                position: results[0].geometry.location,
                map: map, 
                title:address
            }); 
            google.maps.event.addListener(marker, 'click', function() {
                infowindow.open(map,marker);
            });

          } else {
            alert("No results found");
          }
        } else {
          alert("Geocode was not successful for the following reason: " + status);
        }
      });
    }
  }
</script>
<br>
  <section id="maincontent">
    <div class="container">
      <div class="row">

        <div class="span8">

          <!-- start article full post -->
          <article class="blog-post">
            <div class="tooltip-demo headline">
                           <nav aria-label="breadcrumb">
    <div  style = "margin-top:30px;margin-bottom:-30px;" class="breadcumb-nav">
                        <ol  class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                            >
                              <li class="breadcrumb-item"><a href="#">City</a></li>
                          >  <li class="breadcrumb-item"><a href="#"><?php echo utf8_decode($cname);?></a></li>
                        </ol>
                      </div>
                    </nav>
            
            </div>
            <div class="clearfix"></div>
            <img style = "height:500px;width:100%;"  src="image/<?php echo $cimage ?>" alt="" />
   
   <br>   <h4><b><?php echo utf8_decode($cname); ?></b></h4>
   
  
            <ul class="post-meta">
               <li><i class="icon-map-marker"></i> <span><a href="#"> <b>Address:</b><?php  echo utf8_decode($caddress); ?></a></span></li>
  


            </ul>
            
            <div class="clearfix"></div>
     
      

            <p>
             <?php echo $cdescription ?>
            </p>

               
          <section id="maincontent">
    <div class="container">
      <div class="row-fluid">
        <div class="span7">
           <h3 class="heading-success">Place in <?php echo $cname; ?></h3>
 
  
            
          <div class="btn-group filter-category">
            <a class="btn btn-success" href="#"><i class="icon-list icon-white"></i> Select category</a>
            <a class="btn btn-success dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
            <ul class="dropdown-menu filter">
              <li class="all active"><a href="#"><i class="icon-picture"></i> All category</a></li>
                          <?php
    $link = mysqli_connect('localhost:3306','root','','tourist') or die("Could not connect");
    mysqli_set_charset($link,"utf8");
    $sql = "select * from categories order by name ";
    
    $result = mysqli_query($link,$sql);
    if (mysqli_num_rows($result) > 0) 
    {
       
        while($row = mysqli_fetch_assoc($result)) {
        
           $cat_name = $row['name'];
           
            $cat_id = $row['cat_id'];
    ?>
              <li class="<?php echo $cat_id; ?>"><a href="#"><?php echo $cat_name;?></a></li>
         <?php }} ?>
            </ul>
          </div>
    
        </div>
        </div>
      </div>
  
      <div class="row">
        <ul class="portfolio-area da-thumbs">

                          <?php
    $link = mysqli_connect('localhost:3306','root','','tourist') or die("Could not connect");
    mysqli_set_charset($link,"utf8");
    $sql = "select *  from places,categories where municipality = '$caddress' and categories.name = places.category order by places.name ASC";
    // echo $sql;
    $result = mysqli_query($link,$sql);
    if (mysqli_num_rows($result) > 0) 
    {
     
          $x = 0;
        while($row = mysqli_fetch_assoc($result)) {
        $x++;
           $name = $row['name'];
           $description = $row['description'];
           $image = $row['image'];
            $place_id = $row['place_id'];
             $address = $row['address'];
              $category = $row['category'];
               $cat_id = $row['cat_id'];
           
    ?>
       
          <li class="portfolio-item2" data-id="id-0" data-type="<?php echo $cat_id ?>">
            <div class="span2">
              <div class="thumbnail">
                <div class="tooltip-demo image-wrapp">
                  <span class="absolute-comment"><a href="#" data-rel="tooltip" data-placement="top" 
                    title="   comments"><?php 
        $query = "SELECT count(*)
              FROM rating
              WHERE place_id = '$place_id'
              ;";
        $ratingresult = mysqli_query($link, $query);
        $comments = mysqli_fetch_row($ratingresult);


       ?><?=$comments[0]; ?><i class="icon-comment"></i></a></span>
                  <img style ="height:150px;" src="image/<?php echo $image ?>" alt="Portfolio name" title="" />
                  <article class="da-animate da-slideFromRight" style="display: block;">
                    <a class="link_post" href="info.php?place_id=<?php echo $place_id ?>&address=<?php echo $address ?>"><i class = "icon-eye-open icon-white"></i></a>
                    <span><a class="zoom" data-pretty="prettyPhoto" href="image/<?php echo $image ?>"><i class = " icon-fullscreen icon-white"></i></a></span>
                  
                  </article>

                </div>
                                    <?php 
        $query = "SELECT ROUND(AVG(rating_no), 1)
              FROM rating
              WHERE place_id = '$place_id' 
              ;";
        $ratingresult = mysqli_query($link, $query);
        $ratingrow = mysqli_fetch_row($ratingresult);
        $rating = number_format($ratingrow[0]); 
 
       ?> 
                                <?php
                      $count =  $rating;
                      while($count!=0){?>
                      <i  class="fa fa-heart red"></i>
                      <?php $count--; }
                      $count = 5-$rating;
                      while($count!=0){?>
                         <i class="fa fa-heart gray"></i>
                      <?php $count--; } ?>
                                  <?php 
        $query = "SELECT count(*)
              FROM rating
              WHERE place_id = '$place_id'
              ;";
        $ratingresult = mysqli_query($link, $query);
        $ratingrow = mysqli_fetch_row($ratingresult);


       ?>
                <h6><b><a href="info.php?place_id=<?php echo $place_id ?>&address=<?php echo $address ?>">
                 <?php  $address = strip_tags($address);
if (strlen($address) >10) {

    // truncate string
    $stringCut = substr($address, 0,15);
    $endPoint = strrpos($stringCut, ' ');

    //if the string doesn't contain any space then it will cut without word basis.
    $address = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);
    $address .= '... <a href="info.php?place_id='.$place_id.'&address='.$address.'"></a>';
}
echo utf8_decode($address);  ?></a></b></h6>
               
                 
              </div>
            </div>
          </li>
          <?php }} ?>
        </ul>

  
  </section>
           
             
          <!-- end article full post -->
        
      
        </div>

        <div class="span4">
          <aside>

            <div class="widget">
        
               <a  data-toggle="collapse" data-parent="#accordion2" href="#map" ><span class="btn  btn-success">Show map</span></a>    <a data-toggle="collapse" data-parent="#accordion2" href="#contact_person"><span class="btn  btn-success">Hotlines</span></a>
                     <div id="map" class="collapse">
                <div class="accordion-inner">
             
      
            <div class="widget">
       <div id="map_canvas" style ="height:300px; width:100%;no-repeat center top;" class="map_canvas"></div> 
            </div>
              </div>
            </div>
           
                    
                 <div id="contact_person" class="collapse">
                <div class="accordion-inner">
         
        

       <div class="clearfix"></div>
            <div class="widget">
        <ul>
           <?php
    $link = mysqli_connect('localhost:3306','root','','tourist') or die("Could not connect");
    mysqli_set_charset($link,"utf8");
    $sql = "select * from hotlines where  id = '$mun_id' ";
    
    $result = mysqli_query($link,$sql);
    if (mysqli_num_rows($result) > 0) 
    {
       
        while($row = mysqli_fetch_assoc($result)) {
        
      
           $label = $row['label'];
           $contact_number = $row['contact_number'];
           
     
    ?>
            <li><?php echo $label ?> : <?php echo $contact_number ?></li>
       <?php }} ?>
        </ul>
         
            <form method = "POST">
                    <div id="myTabContent" class="tab-content">
        
            </form>




                <div class="tab-pane fade" id="sms">
                  <form method = "POST" action = "sendsms.php">
                              <div class="input-prepend input-append">
                  <h3>Sms</h3>
                    <input class="span2" id="appendedPrependedInput" type="hidden" name = "contact_number" value = "9661967781">
                     <input class="span2" id="appendedPrependedInput" type="text" name = "name" placeholder="please input your name"> <br>
                  <input class="span2" id="appendedPrependedInput" type="text" name = "mobile_number" placeholder="Mobile number"> <br>
                
                      <textarea rows="9" class="input-block-level" name = "sms_message" placeholder="Your message"></textarea>
                  <button class="btn btn-inverse" name = "send_sms" type="submit">Send</button>
                </div><br>

                  </form>
                
                </div>
                   </div>
            </div>
              </div>
            </div>
            
            </div>

            <?php if(isset($_POST['send_email']))
            {
                    require 'PHPMailerAutoload.php';
                    require 'cred.php';

                    $mail = new PHPMailer;
                    $t_email = $_POST['t_email'];
                    $f_email = $_POST['f_email'];
                    $message = $_POST['message'];

                    // $mail->SMTPDebug = 4;                               // Enable verbose debug output
                    // 
                    $mail->isSMTP();                                      // Set mailer to use SMTP
                    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                    $mail->SMTPAuth = true;                               // Enable SMTP authentication
                    $mail->Username = EMAIL;                 // SMTP username
                    $mail->Password = PASS;                           // SMTP password
                    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                    $mail->Port = 587;                                    // TCP port to connect to

                    $mail->setFrom($f_email);
                    $mail->addAddress($t_email);  
                    $mail->addReplyTo($f_email, 'Information');   // Add a recipient
                                 // Name is optional

                    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
                    $mail->isHTML(true);                                  // Set email format to HTML

                    $mail->Subject = 'message from provincial office';
                      $mail->Body    = '<b>Check the message below</b> <p>'.$message.'</p>';
                       


                    if(!$mail->send())
                        {
                        echo 'Message could not be sent.';
                        echo 'Mailer Error: ' . $mail->ErrorInfo;
                        } else 
                        {
                    ?>
            
                            <div class="alert fade in">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>Message has been sent</strong>
            </div>
                       <?php }
                } ?>
                     <div class="widget">
              <ul id="myTab" class="nav nav-tabs">
               
                <li class = "active"><a href="#popular" data-toggle="tab">Popular</a></li>
                <li><a href="#top_rated" data-toggle="tab">Top rated</a></li>
            
              </ul>
            
              <div id="myTabContent" class="tab-content">
            
                <div class="tab-pane fade in active" id="popular">
                  <ul class="recent">
                     <?php
    $link = mysqli_connect('localhost:3306','root','','tourist') or die("Could not connect");
    mysqli_set_charset($link,"utf8");
    $sql = "select * from places,rating where places.place_id = rating.place_id  and  municipality = '$caddress'  GROUP BY places.place_id  ORDER by count(comment) DESC  LIMIT 5   ";
    // echo $sql;
    $result = mysqli_query($link,$sql);
    if (mysqli_num_rows($result) > 0) 
    {
        // Sử dụng vòng lặp while để lặp kết quả
        while($row = mysqli_fetch_assoc($result)) {
        
           $name = $row['name'];
           $description = $row['description'];
           $image = $row['image'];
            $pplace_id = $row['place_id'];
             $paddress = $row['address'];
    ?>
           <li>
                      <a href="info.php?pplace_id=<?php echo $place_id ?>&address=<?php echo $paddress  ?>"><img style = "height:100px;width:150px;"   src="image/<?php echo $image ?>" class="alignleft" alt="" /></a>
                      <h6><a href="info.php?pplace_id=<?php echo $place_id ?>&address=<?php echo $paddress  ?>">
                                                            <?php  $name = strip_tags($name);
if (strlen($name) >10) {

    // truncate string
    $stringCut = substr($name, 0,30);
    $endPoint = strrpos($stringCut, ' ');

    //if the string doesn't contain any space then it will cut without word basis.
    $name = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);
    $name .= '... <a href="info.php?place_id=$place_id&address=$address"></a>';
}
echo utf8_decode($name);  ?>
</a></h6>
                <?php
                      $query = "SELECT ROUND(AVG(rating_no), 1)
              FROM rating
              WHERE place_id = '$place_id' 
              ;";
        $ratingresult = mysqli_query($link, $query);
        $ratingrow = mysqli_fetch_row($ratingresult);
        $rating = number_format($ratingrow[0]); 
 
       ?> 
            <?php $count =  $rating;
                      while($count!=0){?>
                        <span class="fa fa-heart red "></span>
                      <?php $count--; }
                      $count = 5-$rating;
                      while($count!=0){?>
                        <span class="fa fa-heart  gray"></span>
                      <?php $count--; } ?>

                      <p>
                                          
                      </p>
                     <a href="info.php?pplace_id=<?php echo $place_id ?>&address=<?php echo $paddress  ?>">Read more..</a>
                    </li>
                   

                   <?php }} ?>
                  </ul>
                </div>
                <div class="tab-pane fade" id="comment">
                  <ul class="recent">

                         <?php
                    $sql2 = "select * from rating where  place_id = '$pplace_id' ORDER BY rating_no DESC  ";
                    $result2 = mysqli_query($link,$sql2);
                    if(mysqli_num_rows($result2)>0){
                      while($row = mysqli_fetch_assoc($result2)) {
                        $username = $row['username'];
                        $comment = $row['comment'];
                         $rating = $row['rating_no'];
                          $acc_id = $row['acc_id'];
                           $date = $row['date'];
                        ?>
                    <li>
                      <a href="#"><img src="assets/img/icons/quote.png" class="alignleft" alt="" /></a>
                      <h6><a href="negros blog/people_profile.php?acc_id=<?php echo $row['acc_id']; ?>"><?php echo $username ?></a></h6>
                     </a></h6>
                       <?php
                      $count = $row['rating_no'];
                      while($count!=0){?>
                        <span style = "color:red;" class="fa fa-heart "></span>
                      <?php $count--; }
                      $count = 5-$row['rating_no'];
                      while($count!=0){?>
                        <span class="fa fa-heart gray"></span>
                      <?php $count--; } ?>
                      <p>
                       <?php echo $comment ?>
                      </p>
                      <span><?php echo $date ?></span>
                    </li>
                  <?php }} ?> 
                  </ul>
                </div>
                <div class="tab-pane fade" id="top_rated">
                  <ul class="recent">

                          <?php
    $link = mysqli_connect('localhost:3306','root','','tourist') or die("Could not connect");
    mysqli_set_charset($link,"utf8");
    $sql = "select * from places,rating where places.place_id = rating.place_id and municipality = '$caddress'  GROUP BY places.place_id  ORDER by AVG(rating_no)DESC  LIMIT 5   ";
    // echo $sql;
    $result = mysqli_query($link,$sql);
    if (mysqli_num_rows($result) > 0) 
    {
        // Sử dụng vòng lặp while để lặp kết quả
        while($row = mysqli_fetch_assoc($result)) {
        
           $name = $row['name'];
           $description = $row['description'];
           $image = $row['image'];
            $place_id = $row['place_id'];
             $address = $row['address'];
    ?>
                    <li>
                      <a href="info.php?place_id=<?php echo $place_id  ?>&address=<?php echo $address  ?>"><img style = "height:100px;width:150px;"  src="image/<?php echo $image ?>" class="alignleft" alt="" /></a>
                      <h6><a href="info.php?place_id=<?php echo $place_id  ?>&address=<?php echo $address  ?>"><?php echo utf8_decode($name); ?> </a></h6>
                <?php
                      $query = "SELECT ROUND(AVG(rating_no), 1)
              FROM rating
              WHERE place_id = '$place_id' 
              ;";
        $ratingresult = mysqli_query($link, $query);
        $ratingrow = mysqli_fetch_row($ratingresult);
        $rating = number_format($ratingrow[0]); 
 
       ?> 
            <?php $count =  $rating;
                      while($count!=0){?>
                        <span class="fa fa-heart red "></span>
                      <?php $count--; }
                      $count = 5-$rating;
                      while($count!=0){?>
                        <span class="fa fa-heart  gray"></span>
                      <?php $count--; } ?>

                      <p>
                    
                      </p>
                      <a href="info.php?place_id=<?php echo $place_id  ?>&address=<?php echo $address  ?>">Read more..</a>
                    </li>
                   

                   <?php }} ?>
                  </ul>
                </div>
              </div>
            </div>
            <div class="widget">
              <h4 class="heading-success"><span class="btn btn-large btn-success">Festival</h4>
              <ul>
                                    <?php
    $link = mysqli_connect('localhost:3306','root','','tourist') or die("Could not connect");
    mysqli_set_charset($link,"utf8");
         $address = $_GET['address'];
    $sql = "select * from events where address = '$address'  order by start ASC";
    
    $result = mysqli_query($link,$sql);
    if (mysqli_num_rows($result) > 0) 
    {
       
        while($row = mysqli_fetch_assoc($result)) {
        
           $title = $row['title'];
           
              $start = $row['start'];
              $startdate =  date("F d", strtotime($start))
    ?>
                <li><b><?php echo $startdate; ?></b>  :<?php echo utf8_decode($title); ?> </li>
         <?php }} ?>
              </ul>
            </div>
            <div class="clearfix"></div>
   
          </aside>
        </div>

      </div>
    </div>
  </section>
     <div class="round-button"  id="fixedbutton"><div class="round-button-circle"><a href="festival.php">Festival</a></div></div>
  <!-- Footer
 ================================================== -->
 
<?php include('footer.php'); ?>
  <script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prettify/r298/prettify.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/js/bootstrap.js"></script>
  <script src="https://www.belvest.com/cdn/scripts/jquery.elastislide.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.1/flexslider.css"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prettyPhoto/3.1.6/js/jquery.prettyPhoto.js"></script>
  <script src="assets/js/application.js"></script>
  <script src="assets/js/hover/jquery-hover-effect.js"></script>
  <script src="assets/js/hover/setting.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Camera/1.3.4/scripts/camera.min.js"></script>
  <script src="assets/js/camera/setting.js"></script>

  <!-- Template Custom JavaScript File -->
  <script src="assets/js/custom.js"></script>

  <script src="assets/js/application.js"></script>

  <script src="assets/js/portfolio/jquery.quicksand.js"></script>
  <script src="assets/js/portfolio/setting.js"></script>
  <script src="assets/js/hover/jquery-hover-effect.js"></script>
  <script src="assets/js/hover/setting.js"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js'></script>
  
</body>

</html>
