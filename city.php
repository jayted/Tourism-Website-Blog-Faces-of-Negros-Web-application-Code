<?php 
session_start(); ?>



<?php
include('check.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Faces of negros</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBnfuZaF24gZR-ag3UFu7qFiaJ69z0v6o0&callback=initMap"
  type="text/javascript"></script>
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
  <link href="assets/css/bootstrap.css" rel="stylesheet">

  <link href="assets/css/docs.css" rel="stylesheet">
 
     <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/css/bootstrap.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/css/bootstrap-responsive.css" rel="stylesheet">
  <link href="assets/css/docs.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/prettyPhoto/3.1.6/css/prettyPhoto.css" rel="stylesheet">
  <link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet">
  <link href="assets/css/camera.css" rel="stylesheet">
  <link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet">
  <link href="assets/css/flexslider.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300|Open+Sans:400,300,300italic,400italic" rel="stylesheet">
    <link rel="icon" href="logo/lg.jpg" sizes="32x32">
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="logo/lg.jpg">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="logo/lg.jpg">
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/color/success.css" rel="stylesheet">
</head>

<body  onload="initialize()" class="animsition" data-spy="scroll" data-target=".bs-docs-sidebar">

  <header>
    <!-- Navbar
    ================================================== -->
    <?php include('nav.php'); ?>
  </header>
    <?php

  include('db/db_con.php');
  
    $address = $_GET['address'];

    $sql = "select *  from cities where address = '$address'";
    // echo $sql;
    $result = mysqli_query($link,$sql);
    if (mysqli_num_rows($result) > 0) 
    {
        while($row = mysqli_fetch_assoc($result)) {
        
           $cname = $row['name'];
           $cdescription = $row['description'];
             $caddress = $row['address'];
              $cimage = $row['image'];
                 $cities_id = $row['cities_id'];
      
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
              <li class="all active"><a href="#">All category</a></li>
                          <?php
include('db/db_con.php');
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
   include('db/db_con.php');
    $sql = "select *  from places,categories where city = '$caddress'  and categories.name = places.category order by places.name ASC";
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
if (strlen($address) >40) {

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
          
              <a data-toggle="collapse" data-parent="#accordion2" href="#map"><span class="btn  btn-success">Show map</span></a>    <a data-toggle="collapse" data-parent="#accordion2" href="#contact_person"><span class="btn  btn-success">Hotlines</span></a>
                     <div id="map" class="collapse">
                <div class="accordion-inner">
             
      
            <div class="widget">
       <div id="map_canvas" style ="height:300px; width:100%;no-repeat center top;" class="map_canvas"></div> 
            </div>
              </div>
            </div>
          
                 <div id="contact_person" class="collapse">
                <div class="accordion-inner">
               <img src="image/<?php echo $contact_img ?>" onerror = "this.src = 'assets/img/avatar.png"  class="alignleft" alt="" />
                     <ul>
           <?php
include('db/db_con.php');
    $sql = "select * from hotlines where  id = '$cities_id' ";
    
    $result = mysqli_query($link,$sql);
    if (mysqli_num_rows($result) > 0) 
    {
       
        while($row = mysqli_fetch_assoc($result)) {
        
           $label = $row['label'];
           $contact_number = $row['contact_number'];
           
     
    ?>
          <li><b> <?php echo  $label ?> </b> <br> <?php echo $contact_number ?></li><br>
       <?php }} ?>
        </ul>

       <div class="clearfix"></div>
            <div class="widget">
           
            <form method = "POST">
                    <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade in active" id="email">
              
                </div>
            </form>




           
                   </div>
            </div>
              </div>
            </div>
            
            </div>

                     <div class="widget">
              <ul id="myTab" class="nav nav-tabs">
               
                <li class = "active"><a href="#popular" data-toggle="tab">Popular Places</a></li>
                <li><a href="#top_rated" data-toggle="tab">Top rated Places</a></li>
            
              </ul>
            
              <div id="myTabContent" class="tab-content">
            
                <div class="tab-pane fade in active" id="popular">
                  <ul class="recent">
     <?php
 include('db/db_con.php');
    $sql = "select * from places,rating where places.place_id = rating.place_id and city = '$caddress' GROUP BY places.place_id  ORDER by count(comment) DESC  LIMIT 5   ";
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
                      <a href="info.php?place_id=<?php echo $place_id  ?>&address=<?php echo $address  ?>"><img src="image/<?php echo $image ?>"  style = "height:100px;width:150px;"  class="alignleft" alt="" /></a>
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
                      <a href="info.php?place_id=<?php echo $place_id  ?>&address=<?php echo $address  ?>">Read more..</a>
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
 include('db/db_con.php');
    $sql = "select * from places,rating where places.place_id = rating.place_id and city = '$caddress' GROUP BY places.place_id  ORDER by AVG(rating_no)DESC  LIMIT 5   ";
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
                      <a href="info.php?place_id=<?php echo $place_id  ?>&address=<?php echo $address  ?>"><img src="image/<?php echo $image ?>"  style = "height:100px;width:150px;"  class="alignleft" alt="" /></a>
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
  include('db/db_con.php');
      $address = $_GET['address'];
    $sql = "select * from events where address = '$address'";
    
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

   <script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prettify/r298/prettify.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/js/bootstrap.js"></script>
  <script src="https://www.belvest.com/cdn/scripts/jquery.elastislide.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.1/flexslider.css"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prettyPhoto/3.1.6/js/jquery.prettyPhoto.js"></script>

  

  <script src="assets/js/application.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.1/jquery.flexslider.js"></script>
  <script src="assets/js/flexslider/setting.js"></script>
  <script src="assets/js/jquery.elastislide.js"></script>
  <script src="assets/js/jquery.prettyPhoto.js"></script>
  <script src="assets/js/application.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nivoslider/3.2/jquery.nivo.slider.js"></script>
  <!-- Template Custom JavaScript File -->
  <script src="assets/js/portfolio/jquery.quicksand.js"></script>
  <script src="assets/js/portfolio/setting.js"></script>
  <script src="assets/js/hover/jquery-hover-effect.js"></script>
  <script src="assets/js/hover/setting.js"></script>

  <!-- Template Custom JavaScript File -->
  <script src="assets/js/custom.js"></script>
</body>

</html>
