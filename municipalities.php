 <?php session_start(); ?>



<?php
include('check.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Faces of negros|Places</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
 <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="icon" href="logo/lg.jpg" sizes="32x32">
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="logo/lg.jpg">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="logo/lg.jpg">
  <link rel="stylesheet" type="text/css" href="fonts/themify/themify-icons.css">
  <!-- styles -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/css/bootstrap.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/css/bootstrap-responsive.css" rel="stylesheet">
  <link href="assets/css/docs.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/prettyPhoto/3.1.6/css/prettyPhoto.css" rel="stylesheet">
  <link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet">
  <link href="assets/css/camera.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300|Open+Sans:400,300,300italic,400italic" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/color/success.css" rel="stylesheet">
 

  <!-- fav and touch icons -->

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

</head>

<body data-spy="scroll" data-target=".bs-docs-sidebar">

 
  <header>
    <!-- Navbar
    ================================================== -->
 <?php include('nav.php'); ?>
  </header>

  <!-- Subhead
================================================== -->
  <section id="subintro">
    <div class="jumbotron subhead" id="overview">
      <div class="container">
        <div class="row">
          <div class="span8">
            <h3><i class="m-icon-big-swapright m-icon-white"></i><?php 
        $query = "SELECT count(*)
              FROM cities ;";
        $ratingresult = mysqli_query($link, $query);
        $cities = mysqli_fetch_row($ratingresult);


       ?><?=$cities[0]; ?>  Municipalities in Negros Occidental </h3>
        
          </div>
          <div class="span4">
            <div class="input-append">
          
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

 <section id="maincontent">
    <div class="container">
  
      <div class="row">
        <ul class="portfolio-area da-thumbs">

                     
  <?php
include('db/db_con.php');
    $sql = "select * from municipalities  ORDER BY name ASC ";
    
    $result = mysqli_query($link,$sql);
    if (mysqli_num_rows($result) > 0) 
    {
       
        while($row = mysqli_fetch_assoc($result)) {
        
           $name = $row['name'];
           $description = $row['description'];
           $image = $row['image'];
            $mun_id = $row['mun_id'];
             $caddress = $row['address'];
    ?>
 
       
          <li class="portfolio-item2" data-id="id-0" data-type="<?php echo $category ?>">
            <div class="span3">
              <div class="thumbnail">
                <div class="tooltip-demo image-wrapp">

    

          <span class="absolute-comment">
            <a href="#" data-rel="tooltip" data-placement="top" title="Places"> 
           <?php $query = "SELECT count(*)
              FROM places
              WHERE municipality = '$caddress'  GROUP BY city
              ;";

        $ratingresult = mysqli_query($link, $query);
        $ratingrow = mysqli_fetch_row($ratingresult);
      if ($ratingrow < 1)
         {
           print '0';
         }
         else {
          ?>
         <?=$ratingrow[0]; ?>
           <?php } ?><i class="icon-map-marker"></i></a>
          </span>
                  <img style ="height:200px;" src="image/<?php echo $image ?>" alt="Portfolio name" title="" />
                  <article class="da-animate da-slideFromRight" style="display: block;">
                    <a class="link_post" href="municipality.php?mun_id=<?php echo $mun_id ?>&address=<?php echo $caddress ?>"><i class = "icon-eye-open icon-white"></i></a>
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
                                
                <h6><b><a href="municipality.php?mun_id=<?php echo $mun_id ?>&address=<?php echo $caddress ?>">
                      <?php  $name = strip_tags($name);
if (strlen($name) > 25) {

    // truncate string
    $stringCut = substr($name, 0,25);
    $endPoint = strrpos($stringCut, ' ');

    //if the string doesn't contain any space then it will cut without word basis.
    $name = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);
    $name .= '... <a href="municipality.php?mun_id=<?php echo $mun_id ?>&address=<?php echo $caddress ?>"></a>';
}
echo utf8_decode($name);  ?></a></b></h6>
               
                 
              </div>
            </div>
          </li>
          <?php }} ?>
        </ul>
      </div>
      <div class="row">
        <div class="span12">
      
        </div>
      </div>
    </div>
  </section>
 
  <div class="round-button"  id="fixedbutton"><div class="round-button-circle"><a href="festival.php">Festival</a></div></div>
<?php include('footer.php');?>

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
