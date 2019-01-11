<?php session_start(); ?>
 

 <?php
include('check.php');
?>


<?php
require_once('bdd.php');


$sql = "SELECT id, title,address, start, end, color FROM events ";

$req = $bdd->prepare($sql);
$req->execute();

$events = $req->fetchAll();

?>




<!DOCTYPE html>
<html lang="en">

<head>
     <link rel="stylesheet" href="css/foundation.min.css">
             <script type="text/javascript" src="js/bootstrap-filestyle.min.js"> </script>
             <link rel="stylesheet" type="text/css" href="css/sweetalert2.min.css">
        <script src="https://cdn.jsdelivr.net/sweetalert2/4.0.4/sweetalert2.min.js"></script>
  <link rel="stylesheet" type="text/css" href="negros blog/css/review.css">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Faces of negros</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="icon" href="logo/lg.jpg" sizes="32x32">
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="logo/lg.jpg">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="logo/lg.jpg">
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBnfuZaF24gZR-ag3UFu7qFiaJ69z0v6o0&callback=initMap"
  type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

 <style type="text/css">
 .show_more_main {
    margin: 15px 25px;
}
.show_more {
    background-color: #f8f8f8;
    background-image: -webkit-linear-gradient(top,#fcfcfc 0,#f8f8f8 100%);
    background-image: linear-gradient(top,#fcfcfc 0,#f8f8f8 100%);
    border: 1px solid;
    border-color: #d3d3d3;
    color: #333;
    font-size: 12px;
    outline: 0;
}
.show_more {
    cursor: pointer;
    display: block;
    padding: 10px 0;
    text-align: center;
    font-weight:bold;
}
.loding {
    background-color: #e9e9e9;
    border: 1px solid;
    border-color: #c6c6c6;
    color: #333;
    font-size: 12px;
    display: block;
    text-align: center;
    padding: 10px 0;
    outline: 0;
    font-weight:bold;
}
.loding_txt {
    background-image: url(loading.gif);
    background-position: left;
    background-repeat: no-repeat;
    border: 0;
    display: inline-block;
    height: 16px;
    padding-left: 20px;
}
    .red {
    color: red;
}
  .gray {
    color:#f0f2ed;
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

        </style>
          <link href='css/fullcalendar.css' rel='stylesheet' />
  <style type="text/css">
    .red {
    color: red;
}
  #calendar {
    max-width: 1280px;
  }
  .col-centered{
    float: none;
    margin: 0 auto;
  }
  select {
  font-family: 'FontAwesome', 'Second Font name'
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
   <link href="css/rating.css" rel="stylesheet">
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
  <link rel="icon" href="images/favicon/ec98824ea2dacb618e95f750be66e52b.jpg" sizes="32x32">
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="images/favicon/ec98824ea2dacb618e95f750be66e52b.jpg">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="images/favicon/ec98824ea2dacb618e95f750be66e52b.jpg">

  <script src="=lib/jquery.js" type="text/javascript"></script>
  <script src="=src/facebox.js" type="text/javascript"></script>
    <link href="/src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
  <link href="css/example.css" media="screen" rel="stylesheet" type="text/css" />
  <script src="/lib/jquery.js" type="text/javascript"></script>
  <script src="/src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : '/src/loading.gif',
        closeImage   : '/src/closelabel.png'
      })
    })
  </script>
</head>

<body  onload="initialize()" class="animsition" data-spy="scroll" data-target=".bs-docs-sidebar">

  <header>
    <!-- Navbar
    ================================================== -->
    <?php include('nav.php'); ?>
  </header>

  <!-- Subhead
================================================== -->
 <?php
include('db/db_con.php');
  $address = $_GET['address'];
  $sql = "select * from places where  address = '$address' ";
  // echo $sql;
  $result = mysqli_query($link,$sql);
  if (mysqli_num_rows($result) > 0) 
  {
  
      while($row = mysqli_fetch_assoc($result)) {
         $ID = $row['ID'];
         $name = $row['name'];
         $address = $row['address'];
         $image = $row['image'];
         $category = $row['category'];
          
     
     
          $pplace_id = $row['place_id'];
    $cost = $row['cost'];
         $city = $row['city'];
         $municipality = $row['municipality'];
         $des = $row['description'];
         $contact_person = $row['contact_person'];
         $contact_email = $row['contact_email'];
          $contact_no = $row['contact_no'];
         $contact_img = $row['contact_img'];
         $contact_address = $row['contact_address'];
         $position = $row['position'];
        $_SESSION['ID'] = $ID;
 ?> 

<script type="text/javascript">
  var geocoder;
  var map;
  var address ="<?php echo $address ?>";
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
<?php }} ?>
<br>
  <section id="maincontent">
    <div class="container">
      <div class="row">

        <div class="span8">

          <!-- start article full post -->
          <article class="blog-post">
            <div class="tooltip-demo headline">
                           <nav aria-label="breadcrumb">
    <div  class="breadcumb-nav" style = "margin-top:30px;margin-bottom:-30px;">
                        <ol  class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                            >
                              <li class="breadcrumb-item"><a href="#">Info</a></li>
                          >  <li class="breadcrumb-item"><a href="#"><?php echo utf8_decode($name);?></a></li>
                        </ol>
                      </div>
                    </nav>
            
            </div>
            <div class="clearfix"></div>
            <img style = "height:500px;width:100%;" src="image/<?php echo $image ?>" alt="" />
                      <div id="latest-work" class="carousel btleft">
            <div class="carousel-wrapper">

              <ul class="portfolio-home da-thumbs">


  <?php
  include('db/db_con.php');
    $sql = "select * from posted where address = '$address'  ";
    // echo $sql;
    $result = mysqli_query($link,$sql);
    if (mysqli_num_rows($result) > 0) 
    {
     
          $x = 0;
        while($row = mysqli_fetch_assoc($result)) {
        $x++;
           $content = $row['content'];
           $image = $row['image'];
         
             $acc_id = $row['acc_id'];
      
            $post_id = $row['post_id'];
    ?>
                <li style = "height:100px;width:150px;margin-right:-40px;"  >
                 
               <a rel = "facebox" href="show_post_image.php?id=<?php echo $post_id ?>">
                     <img src="image/<?php echo $image ?>" style = "height:100px;width:150px;margin-right:-80px;"  title="" />
                 </a>
             
             

           
                </li>
           
<?php }} ?>



              </ul>
            </div>
          </div>
   
   <br>   <h4><b><?php echo utf8_decode($name); ?></b></h4>
    <?php 
        $query = "SELECT ROUND(AVG(rating_no), 1)
              FROM rating
              WHERE place_id = '$pplace_id' 
              ;";
        $ratingresult = mysqli_query($link, $query);
        $ratingrow = mysqli_fetch_row($ratingresult);
        $rating = number_format($ratingrow[0]); 
 
       ?> 

                      <?php
                      $count =  $rating;
                      while($count!=0){?>
                      <i style = "font-size:30px" class="fa fa-heart red"></i>
                      <?php $count--; }
                      $count = 5-$rating;
                      while($count!=0){?>
                         <i class="fa fa-heart gray"></i>
                      <?php $count--; } ?>
                                  <?php 
        $query = "SELECT count(*)
              FROM rating
              WHERE place_id = '$pplace_id'
              ;";
        $ratingresult = mysqli_query($link, $query);
        $ratingrow = mysqli_fetch_row($ratingresult);


       ?>

     <span class="comment"><a href="#" data-rel="tooltip" data-placement="top" title="Comments"> <i class = "fa fa-comment"></i><?php 
        $query = "SELECT count(*)
              FROM rating
              WHERE place_id = '$pplace_id'
              ;";
        $ratingresult = mysqli_query($link, $query);
        $ratingrow = mysqli_fetch_row($ratingresult);


       ?><?=$ratingrow[0]; ?>  comments</a></span>
            <ul class="post-meta">
               <li><i class="icon-map-marker"></i> <span><a href="#"> <b>Address:</b><?php  echo utf8_decode($address); ?></a></span></li>
        <li><i class="icon-list-alt"></i> <span><a href="#"><?php if($city == TRUE)
                      {
                    echo  "<b>City</b>:&nbsp".$city;
                      }
                      else
                      {
                         echo "<b>Municipality</b>:&nbsp" .$municipality;
                      }  ?></a></span></li>
              <li><i class="icon-list-alt"></i> <span><a href="#"> <b>Category:</b><?php echo utf8_decode($category); ?></a></span></li>
         


            </ul>
            
            <div class="clearfix"></div>
     
      

            <p>
             <?php echo utf8_decode($des); ?>
            </p>
    
                 <div class="pagination pagination-Left">
            <ul>

              
                    <li><a class="btn btn-success" data-toggle="collapse" data-parent="#accordion2" href="#where_to_eat">
          <b>Where to eat</b>
          <i class="m-icon-swapdown m-icon-white"></i>
            </a>
               </li>
                    <li><a class="btn btn-success" data-toggle="collapse" data-parent="#accordion2" href="#what_to_do">
         <b>What to do</b>
         <i class="m-icon-swapdown m-icon-white"></i>
            </a>
               </li>
                      <li><a class="btn btn-success" data-toggle="collapse" data-parent="#accordion2" href="#where_to_stay">
       <b>Where to stay</b> 
        <i class="m-icon-swapdown m-icon-white"></i>
            </a>
               </li>
                       <li><a class="btn btn-success" data-toggle="collapse" data-parent="#accordion2" href="#post">
        <b>Post :<?php    $query = "SELECT count(*)
              FROM posted
              WHERE address = '$address'
              ;";
        $ratingresult = mysqli_query($link, $query);
        $ratingrow = mysqli_fetch_row($ratingresult);


       ?>  <?=$ratingrow[0]; ?></b> 
     
        <i class="m-icon-swapdown m-icon-white"></i>
            </a>
               </li>

           
            
            </ul>
          </div>
          
            <div id="where_to_eat" class="collapse">
          <section id="maincontent">
    <div class="container">
      <div class="row-fluid">
        <div class="span7">
            <h3><a class="btn btn-large btn-success" data-toggle="collapse" data-parent="#accordion2" href="#where_to_eat"><i class="m-icon-swapup m-icon-white"></i></a> <b>Where to eat</b> </h3>
 

        </div>
      </div>
      <div class="row">
        <ul class="portfolio-area da-thumbs">
          <li class="portfolio-item2" data-id="id-0" data-type="web">



              <!--   end of span2 -->

              <!-- start of span2 -->

                          <?php
  include('db/db_con.php');
    $sql = "select * from places where category = 'Restaurant' and city = '$city' and place_id != '$pplace_id' and city != ''   ORDER by name ASC ";
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
           
    ?>
            <div class="span2">
              <div class="thumbnail">
                <div class="tooltip-demo image-wrapp">
                  <span class="absolute-comment"><a href="#" data-rel="tooltip" data-placement="top" title="<?php 
        $query = "SELECT count(*)
              FROM rating
              WHERE place_id = '$place_id'
              ;";
        $ratingresult = mysqli_query($link, $query);
        $comments = mysqli_fetch_row($ratingresult);


       ?><?=$comments[0]; ?>"><i class="icon-comment"></i></a></span>
                  <img style ="height:120px;width:1220px;" src="image/<?php echo $image; ?>"  title="" />
                  <article class="da-animate da-slideFromRight" style="dsplay: block;">
                     <a class="link_post" href="info.php?place_id=<?php echo $place_id ?>&address=<?php echo $address ?>"><i class = "icon-eye-open icon-white"></i></a>
                    <span><a class="zoom" data-pretty="prettyPhoto" href="image/<?php echo $image ?>"><i class = " icon-fullscreen icon-white"></i></a></span>
                  </article>

                </div>
                  <a href=""><h7><?php echo utf8_decode($name); ?></h7></a>
              </div>
            </div>
            <?php }}else{


             ?>
            <?php 
            $sql = "select * from places where category = 'Restaurant'  and place_id != '$pplace_id' and municipality != '' ORDER by name ASC ";
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
           
    ?>
            <div class="span2">
              <div class="thumbnail">
                <div class="tooltip-demo image-wrapp">
                  <span class="absolute-comment"><a href="#" data-rel="tooltip" data-placement="top" title="<?php 
        $query = "SELECT count(*)
              FROM rating
              WHERE place_id = '$place_id'
              ;";
        $ratingresult = mysqli_query($link, $query);
        $comments = mysqli_fetch_row($ratingresult);


       ?><?=$comments[0]; ?>"><i class="icon-comment"></i></a></span>
                  <img style ="height:120px;width:1220px;" src="image/<?php echo $image; ?>"  title="" />
                  <article class="da-animate da-slideFromRight" style="dsplay: block;">
                     <a class="link_post" href="info.php?place_id=<?php echo $place_id ?>&address=<?php echo $address ?>"><i class = "icon-eye-open icon-white"></i></a>
                    <span><a class="zoom" data-pretty="prettyPhoto" href="image/<?php echo $image ?>"><i class = " icon-fullscreen icon-white"></i></a></span>
                  </article>

                </div>
                  <a href=""><h7><?php echo utf8_decode($name); ?></h7></a>
              </div>
            </div>
            <?php }}
          }?>

              <!--   end of span2 -->

 
              <!--   end of span2 -->



          </li>
      
        </ul>
      </div>
 
    </div>
  </section>
            </div>
              <div id="what_to_do" class="collapse">
                      <h3><a class="btn btn-large btn-success" href="#"><i class="m-icon-swapdown m-icon-white"></i></a> <b>What to do</b> </h3>
                <div class="accordion-inner">
                <div class="tag_list">
                  <ul>
                      <h5>What to do</h5>
                          <?php
include('db/db_con.php');
    $sql = "select * from posted where address = '$address'  GROUP by address order by count(address)  ";
    // echo $sql;
    $result = mysqli_query($link,$sql);
    if (mysqli_num_rows($result) > 0) 
    {
     
          $x = 0;
        while($row = mysqli_fetch_assoc($result)) {
        $x++;
           $activity = $row['activity'];
      
           
    ?>
                    <li><?php echo $activity ?></li>
                  <?php }} ?>
                  </ul>
            
                </div>
              </div>
            </div>
             <div id="post" class="collapse">
                      <h3><a class="btn btn-large btn-success" href="#"><i class="m-icon-swapdown m-icon-white"></i></a> <b>Post</b> </h3>
                <div class="accordion-inner">
                <div class="tag_list">
                  <ul>
                      <h5>Post</h5>
                           <div class="row">
        <ul class="portfolio-area da-thumbs">
          <li class="portfolio-item2" data-id="id-0" data-type="web">
 
              <!--   end of span2 -->
                     <?php
 include('db/db_con.php');
    $sql = "select * from posted where address = '$address'  ";
    // echo $sql;
    $result = mysqli_query($link,$sql);
    if (mysqli_num_rows($result) > 0) 
    {
     
          $x = 0;
        while($row = mysqli_fetch_assoc($result)) {
        $x++;
           $content = $row['content'];
           $image = $row['image'];
            $name = $row['name'];
             $acc_id = $row['acc_id'];
      
           
    ?>
    <div class="span2">
              <div class="thumbnail">
                <div class="tooltip-demo image-wrapp">
                  <span class="absolute-comment"><a href="#" data-rel="tooltip" data-placement="top" title="<?php 
        $query = "SELECT count(upvote_no)
              FROM upvote
              WHERE acc_id = '$acc_id'
              ;";
        $ratingresult = mysqli_query($link, $query);
        $comments = mysqli_fetch_row($ratingresult);


       ?><?=$comments[0]; ?>">like</a></span>
                  <img style ="height:120px;width:1220px;" src="image/<?php echo $image; ?>"  title="" />
                  <article class="da-animate da-slideFromRight" style="dsplay: block;">
                     <a class="link_post" href="info.php?place_id=<?php echo $place_id ?>&address=<?php echo $address ?>"><i class = "icon-eye-open icon-white"></i></a>
                    <span><a class="zoom" data-pretty="prettyPhoto" href="image/<?php echo $image ?>"><i class = " icon-fullscreen icon-white"></i></a></span>
                  </article>

                </div>
                  <a href=""><h8><?php echo utf8_decode($name); ?></h8></a>
              </div>
            </div>
            <?php }}

             ?>
          
             
          </li>
         
        </ul>
      </div>
                
                  </ul>
            
                </div>
              </div>
            </div>
          </article>
        <div id="where_to_stay" class="collapse">
        <section id="maincontent">
    <div class="container">
      <div class="row-fluid">
        <div class="span7">
                  <h3><a class="btn btn-large btn-success" href="#"><i class="m-icon-big-swapdown m-icon-white"></i></a> <b>Where to stay</b> </h3>
 

        </div>
      </div>
      <div class="row">
        <ul class="portfolio-area da-thumbs">
          <li class="portfolio-item2" data-id="id-0" data-type="web">
 
              <!--   end of span2 -->

      <?php
  include('db/db_con.php');
    $sql = "select * from places where category = 'Hotel' and city = '$city' and place_id != '$pplace_id' and city != ''   ORDER by name ASC ";
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
           
    ?>
            <div class="span2">
              <div class="thumbnail">
                <div class="tooltip-demo image-wrapp">
                  <span class="absolute-comment"><a href="#" data-rel="tooltip" data-placement="top" title="<?php 
        $query = "SELECT count(*)
              FROM rating
              WHERE place_id = '$place_id'
              ;";
        $ratingresult = mysqli_query($link, $query);
        $comments = mysqli_fetch_row($ratingresult);


       ?><?=$comments[0]; ?>"><i class="icon-comment"></i></a></span>
                  <img style ="height:120px;width:1220px;" src="image/<?php echo $image; ?>"  title="" />
                  <article class="da-animate da-slideFromRight" style="dsplay: block;">
                     <a class="link_post" href="info.php?place_id=<?php echo $place_id ?>&address=<?php echo $address ?>"><i class = "icon-eye-open icon-white"></i></a>
                    <span><a class="zoom" data-pretty="prettyPhoto" href="image/<?php echo $image ?>"><i class = " icon-fullscreen icon-white"></i></a></span>
                  </article>

                </div>
                  <a href=""><h7><?php echo utf8_decode($name); ?></h7></a>
              </div>
            </div>
            <?php }}else{


             ?>
            <?php
             include('db/db_con.php'); 
            $sql = "select * from places where category = 'Hotel' and municipality = '$municipality'  and place_id != '$pplace_id' and municipality != ''   ORDER by name ASC ";
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
           
    ?>
            <div class="span2">
              <div class="thumbnail">
                <div class="tooltip-demo image-wrapp">
                  <span class="absolute-comment"><a href="#" data-rel="tooltip" data-placement="top" title="<?php 
        $query = "SELECT count(*)
              FROM rating
              WHERE place_id = '$place_id'
              ;";
        $ratingresult = mysqli_query($link, $query);
        $comments = mysqli_fetch_row($ratingresult);


       ?><?=$comments[0]; ?>"><i class="icon-comment"></i></a></span>
                  <img style ="height:120px;width:1220px;" src="image/<?php echo $image; ?>"  title="" />
                  <article class="da-animate da-slideFromRight" style="dsplay: block;">
                     <a class="link_post" href="info.php?place_id=<?php echo $place_id ?>&address=<?php echo $address ?>"><i class = "icon-eye-open icon-white"></i></a>
                    <span><a class="zoom" data-pretty="prettyPhoto" href="image/<?php echo $image ?>"><i class = " icon-fullscreen icon-white"></i></a></span>
                  </article>

                </div>
                  <a href=""><h7><?php echo utf8_decode($name); ?></h7></a>
              </div>
            </div>
            <?php }}
          }?>

             
          </li>
         
        </ul>
      </div>
 
    </div>
  </section>

            </div>
          <!-- end article full post -->
          <h4> <span class="label"><?php 
           include('db/db_con.php');
        $query = "SELECT count(comment)
              FROM rating
              WHERE place_id = '$pplace_id'
              ;";
        $ratingresult = mysqli_query($link, $query);
        $ratingrow = mysqli_fetch_row($ratingresult);


       ?><?=$ratingrow[0]; ?> </span> Comments </h4>
         <ul class="media-list">
          <div class="postList">

        <?php
 include('db/db_con.php');
$date = ('M-d-Y');
    $query = $db->query("SELECT * from rating where  place_id = '$pplace_id' ORDER BY rating_no DESC");
    
    if($query->num_rows > 0){ 
        while($row = $query->fetch_assoc()){ 
                     $username = $row['username'];
                        $comment = $row['comment'];
                         $rating = $row['rating_no'];
                          $acc_id = $row['acc_id'];
                           $date = $row['date'];
                                $place_id = $row['place_id'];
                        ?>
            <li class="media">
              <a class="pull-left" href="#">
              <img class="img-thumbnail"  style = "height:120px;width:120px;" src = "negros blog/images/profile_pic_img/acc_id_<?php echo $row['acc_id']; ?>.jpg" onerror = "this.src = 'negros blog/images/default_profile.png'"  alt="" />
            </a>
              <div class="media-body">   <?php
                      $count = $row['rating_no'];
                      while($count!=0){?>
                        <span style = "color:red;" class="fa fa-heart "></span>
                      <?php $count--; }
                      $count = 5-$row['rating_no'];
                      while($count!=0){?>
                        <span style = "color:#f0f2ed;" class="fa fa-heart gray"></span>
                      <?php $count--; } ?>
                <h5 class="media-heading"><a href="negros blog/people_profile.php?acc_id=<?php echo $row['acc_id']; ?>"><?php echo $row['username']; ?></a></h5>
                <span>Posted :<?php echo $date ?></span>
                <p><?= $comment = $row['comment'];?></p>
                
              </div>
            </li>

<?php }

?>

    <?php }?>
</div>
          </ul>
          <div class="comment-post">
            <h4>Leave a comment</h4>


                    <div class="review" >
                                   <form name="reviewform" method="post" action="review.php" onsubmit="return validateReview(this)">
                                         <?php  if(isset($_SESSION['userID'])){ ?>
                                            <div class="btn-group filter-category">
                                              <label>Type of comment:</label>

              <select name = "type">
                <option value = "feedback">Feedback</option>
                 <option value = "question">Question</option>
              </select>

          </div>
                     <?php }
                                           ?>
    
           <?php  

                       if(isset($_SESSION['userID'])){
include('db/db_con.php');
  $sql = "select * from account where acc_id = '".$_SESSION['userID']."'";
   $result = mysqli_query($link,$sql);
  if (mysqli_num_rows($result) > 0) 
  {

      while($row = mysqli_fetch_assoc($result)) {
      
       $username =  $row['username'];
        
   }
}
?>
 

      <?php } ?>
<input type="hidden" name="username" value = "<?php  echo $username; ?>">

<input type="hidden" value = "<?php echo $user_id; ?>" name="user_id">
            
             
         <center>   <?php  if(isset($_SESSION['userID'])){    
          $query = "SELECT * FROM rating WHERE acc_id = '$userID' AND place_id = '$pplace_id';"; 
            $result = mysqli_query($link, $query);
            if(mysqli_affected_rows($link)){ ?>
          
            <?php } else { ?>
                
            <?php } ?>
                     </center>

                                  
                                        <div class="form-group">
                                          <?php  if(isset($_SESSION['userID'])){ ?>
                                      <textarea  name = "comment" rows="9" class="input-block-level" placeholder="Your comment"></textarea>
                                               <?php }
                                           ?>
                                        </div>
                                               
                 <?php  if(isset($_SESSION['userID'])){ ?>
                  <div id="like" class=" rating pull-left">
  <!-- FIFTH HEART -->
  <input type="radio" id="heart_5"   name="rating" value="5" />
  <label style = "font-size:40px;margin-left:5px;" for="heart_5" title="Five">&#10084;</label>
  <!-- FOURTH HEART -->
  <input type="radio" id="heart_4" name="rating" value="4" />
  <label  style = "font-size:40px;margin-left:5px;" for="heart_4" title="Four">&#10084;</label>
  <!-- THIRD HEART -->
  <input type="radio" id="heart_3" name="rating" value="3" />
  <label  style = "font-size:40px;margin-left:5px;" for="heart_3" title="Three">&#10084;</label>
  <!-- SECOND HEART -->
  <input type="radio" id="heart_2" name="rating" value="2" />
  <label style = "font-size:40px;margin-left:5px;"  for="heart_2" title="Two">&#10084;</label>
  <!-- FIRST HEART -->
  <input type="radio" id="heart_1" name="rating" value="1" />
  <label style = "font-size:40px;margin-left:5px;" for="heart_1" title="One">&#10084;</label>
  <br>
</div> 
<br>
<br>
                    <input type="hidden" value = "<?php echo $pplace_id; ?>" name="place" >
                     <input type="hidden" value = "<?php echo $_GET['address']; ?>" name="address" >
                      <input type="hidden" value = "<?php echo $userID ?>" name="user" >
                  <?php 
            $query = "SELECT * FROM rating WHERE acc_id = '$userID' AND place_id = '$pplace_id';"; 
            $result = mysqli_query($link, $query);
            if(mysqli_affected_rows($link)){ ?>
          <center>
             <button name="reviewagain"  class = "btn btn-lg btn-danger" type="submit" onclick="return validateReview();">
           Review Again</button>
          </center>
            <?php } else { ?>
              <center>
                 <button name="review" class = "btn btn-lg btn-success"  type="submit" onclick="return validateReview();">Review</button> 
              </center>
              
            <?php } } ?>

           
                                    </form>
                                                    <?php  

                       if(isset($_SESSION['userID'])){ ?>

           <?php } ?> 
                           <?php }     else{  ?>
                                               <a   href=""><h4 style = "color:#ff5200;font-size:20px"  class="" ><b>Please LogIn or SignUp to give review</b></h4></a>

            <form action="pending_comment.php" method="post" class="comment-form" name="comment-form">
         
              <div class="row">
                  <input type="hidden" value = "<?php echo $pplace_id; ?>" name="place" >
                     <input type="hidden" value = "<?php echo $_GET['address']; ?>" name="address" >
   
                <div class="span3">
                  <label>Email <span>*</span></label>
                  <input type="text" name = "pend_email" class="input-block-level" placeholder="Your email" />
                </div>
                <div class="span8">
                  <label>Comment <span>*</span></label>
                  <textarea rows="9" class="input-block-level" name = "pend_comment" placeholder="Your comment"></textarea>
                  <button class="btn btn-medium btn-success"  name="anonymous" class = "btn btn-success"  type="submit">Submit comment</button>
                </div>
              </div>
            </form>
                                               <?php } ?>
                                </div>


















     
          </div>
        </div>

        <div class="span4">
          <aside>

            <div class="widget">
                 <div class="input-append">
            
            </div>
                <a  data-toggle="collapse" data-parent="#accordion2" href="#map" ><span class="btn  btn-success">Show map</span></a>    <a data-toggle="collapse" data-parent="#accordion2" href="#contact_person"><span class="btn  btn-success">Contact Details</span></a>
                     <div id="map" class="collapse">
                <div class="accordion-inner">
             
      
            <div class="widget">
       <div id="map_canvas" style ="height:300px; width:100%;no-repeat center top;" class="map_canvas"></div> 
            </div>
              </div>
            </div>
           
                 <div id="contact_person" class="collapse">
                <div class="accordion-inner">
              <img style = "height:50px;width:70px;" src="image/<?php echo $contact_img ?>" onerror = "this.src = 'assets/img/avatar.png"  class="alignleft" alt="" />
              <h5><?php echo $contact_person ?></h5>
              <p>
              <?php echo $position ?>
              </p>

       <div class="clearfix"></div>
            <div class="widget">
               <h7><b>Email:&nbsp;<?php echo $contact_email ?></h7></b> <br>
               <h7><b>Contact Number:&nbsp;<?php echo $contact_no ?></h7></b> 
              <h4>Send message</h4>
              <ul id="myTab" class="nav nav-tabs">
                <li class="active"><a href="#email" data-toggle="tab">Via Email</a></li>
            
              
              </ul>
            <form method = "POST">
                    <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade in active" id="email">
                    <div class="input-prepend input-append">
                      <input type="hidden" value = "<?php echo $contact_email ?>"  name="t_email">
                  <h3>Email</h3>
                  <input type = "email" class="span2" id="appendedPrependedInput" name = "f_email" type="text"> 
                  <br>
                      <textarea rows="9" class="input-block-level" name = "message"  placeholder="Your message"></textarea>
                  <button class="btn btn-inverse"  name = "send_email" type="submit">Send</button>
                </div><br>
                </div>
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
                <li class="active"><a href="#recent" data-toggle="tab">Recommended</a></li>
              
                <li><a href="#top_rated" data-toggle="tab">Top rated</a></li>
                <li><a href="#comment" data-toggle="tab">Comment</a></li>
              </ul>
            
              <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade in active" id="recent">
                  <ul class="recent">
                      <?php
  include('db/db_con.php');
    $sql = "select * from places where  city = '$city'  and place_id != '$pplace_id' and  city != '' order by name ASC ";
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
                      <a href="info.php?place_id=<?php echo $place_id  ?>&address=<?php echo $address  ?>"><img style = "height:100px;width:150px;" src="image/<?php echo $image ?>" class="alignleft" alt="" /></a>
                      <h6><a href="info.php?place_id=<?php echo $place_id  ?>&address=<?php echo $address  ?>"><?php echo utf8_decode($name);; ?> </a></h6>
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

                   
                       <p>Reviews: <?php 
        $query = "SELECT count(comment)
              FROM rating
              WHERE place_id = '$place_id'
              ;";
        $ratingresult = mysqli_query($link, $query);
        $reviews = mysqli_fetch_row($ratingresult);


       ?><?=$reviews[0]; ?>
          </p>

                
                      <a href="info.php?place_id=<?php echo $place_id  ?>&address=<?php echo $address  ?>">View more..</a>
                    </li>
                   

                   <?php }} ?>
                   <?php
include('db/db_con.php');
    $sql = "select * from places where  municipality = '$municipality'  and place_id != '$pplace_id'  and municipality != '' ";
    // echo $sql;
    $result = mysqli_query($link,$sql);
    if (mysqli_num_rows($result) > 0) 
    {
  
        while($row = mysqli_fetch_assoc($result)) {
        
           $name = $row['name'];
           $description = $row['description'];
           $image = $row['image'];
            $place_id = $row['place_id'];
             $address = $row['address'];
    ?>
                    <li>
                      <a href="info.php?place_id=<?php echo $place_id  ?>&address=<?php echo $address  ?>"><img style = "height:100px;width:150px;" src="image/<?php echo $image ?>" class="alignleft" alt="" /></a>
                      <h6><a href="info.php?place_id=<?php echo $place_id  ?>&address=<?php echo $address  ?>"><?php echo utf8_decode($name);; ?> </a></h6>
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
                                           <?php  $description = strip_tags($description);
if (strlen($description) >40) {

    // truncate string
    $stringCut = substr($description, 0,40);
    $endPoint = strrpos($stringCut, ' ');

    //if the string doesn't contain any space then it will cut without word basis.
    $description = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);
    $description .= '... <a href="info.php?place_id=<?php echo $place_id  ?>&address=<?php echo $address  ?>"></a>';
}
echo utf8_decode($description);  ?>
                      </p>
                      <a href="info.php?place_id=<?php echo $place_id  ?>&address=<?php echo $address  ?>">View more..</a>
                    </li>
                   

                   <?php }} ?>
                  </ul>
                </div>
                <div class="tab-pane fade" id="popular">
                  <ul class="recent">
                     <?php
  include('db/db_con.php');
    $sql = "select * from places,rating where places.place_id = rating.place_id   GROUP BY places.place_id  ORDER by count(comment) DESC  LIMIT 5   ";
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
                      <a href="info.php?place_id=<?php echo $place_id ?>&address=<?php echo $paddress  ?>"><img style = "height:100px;width:150px;" src="image/<?php echo $image ?>" class="alignleft" alt="" /></a>
                      <h6><a href="info.php?place_id=<?php echo $place_id ?>&address=<?php echo $paddress  ?>"><?php echo utf8_decode($name); ?> </a></h6>
                        <p>
                <?php
                      $query = "SELECT ROUND(AVG(rating_no), 1)
              FROM rating
              WHERE place_id = '$pplace_id' 
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

                    </p>
                        <p>Reviews: <?php 
        $query = "SELECT count(comment)
              FROM rating
              WHERE place_id = '$pplace_id'
              ;";
        $ratingresult = mysqli_query($link, $query);
        $reviews = mysqli_fetch_row($ratingresult);


       ?><?=$reviews[0]; ?>
          </p>
     
   
                   
                      <a href="info.php?place_id=<?php echo $place_id ?>&address=<?php echo $paddress  ?>">View more...</a>
                    </li>
                   

                   <?php }} ?>
                  </ul>
                </div>
                <div class="tab-pane fade" id="comment">
                  <ul class="recent">
                
                         <?php
                         $pplace_id = $_GET['place_id'];
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
 include('db/db_con.php');
   $sql = "select * from places,rating where places.place_id = rating.place_id GROUP BY places.place_id  ORDER by AVG(rating_no) + count(comment) DESC  limit 5 ";
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
                      <a href="info.php?place_id=<?php echo $place_id  ?>&address=<?php echo $address  ?>"><img  style = "height:100px;width:150px;"  src="image/<?php echo $image ?>" class="alignleft" alt="" /></a>
                      <h6><a href="info.php?place_id=<?php echo $place_id  ?>&address=<?php echo $address  ?>"><?php echo utf8_decode($name); ?> </a></h6>
                      <p>
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
</p>
               
                    
 <p>Reviews: <?php 
        $query = "SELECT count(comment)
              FROM rating
              WHERE place_id = '$place_id'
              ;";
        $ratingresult = mysqli_query($link, $query);
        $reviews = mysqli_fetch_row($ratingresult);


       ?><?=$reviews[0]; ?>
          </p>
                      <a href="info.php?place_id=<?php echo $place_id  ?>&address=<?php echo $address  ?>">View more..</a>
                    </li>
                   

                   <?php }} ?>
                  </ul>
                </div>
              </div>
            </div>
            <div class="widget">
              <h4 class="heading-success">Festival</h4>
              <ul>
                                   <?php
  include('db/db_con.php');
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
   
  <!-- Footer
 ================================================== -->
 
<?php include('footer.php'); ?>

  
  <script src="assets/js/modernizr.js"></script>
  <script src="assets/js/bootstrap.js"></script>
  
  
  
 

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
