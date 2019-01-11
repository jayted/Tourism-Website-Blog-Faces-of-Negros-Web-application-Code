<?php session_start(); ?>


<?php
include('check.php');
?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Faces of negros|category</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  
 <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

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
  <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css' rel='stylesheet' />
    <link rel="icon" href="logo/lg.jpg" sizes="32x32">
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="logo/lg.jpg">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="logo/lg.jpg">
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
             $category = $_GET['category'];
        $query = "SELECT count(*)
              FROM places where category = '$category' ;";
        $ratingresult = mysqli_query($link, $query);
        $places = mysqli_fetch_row($ratingresult);


       ?><?=$places[0]; ?>  <?php echo  $category; ?> in Negros Occidental </h3>
        
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
     $category = $_GET['category'];


    $sql = "select *  from places where category = '$category'";
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
           
    ?>
       
          <li class="portfolio-item2" data-id="id-0" data-type="<?php echo $category ?>">
            <div class="span3">
              <div class="thumbnail">
                <div class="tooltip-demo image-wrapp">
                  <?php 
        $query = "SELECT count(*)
              FROM rating
              WHERE place_id = '$place_id'
              ;";
        $ratingresult = mysqli_query($link, $query);
        $comments = mysqli_fetch_row($ratingresult);


       ?>
                  <span class="absolute-comment"><a href="#" data-rel="tooltip" data-placement="top" title = "Comment"><?=$comments[0]; ?><i class="icon-comment"></i></a></span>
                  <img style ="height:200px;" src="image/<?php echo $image ?>" alt="Portfolio name" title="" />
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
                <h3><a href="info.php?place_id=<?php echo $place_id ?>&address=<?php echo $address ?>">
                      <?php  $name = strip_tags($name);
if (strlen($name) > 25) {

    // truncate string
    $stringCut = substr($name, 0,25);
    $endPoint = strrpos($stringCut, ' ');

    //if the string doesn't contain any space then it will cut without word basis.
    $name = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);
    $name .= '... <a href="/this/story"></a>';
}
echo utf8_decode($name);  ?></a><b></b></h3>
               
                 
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
