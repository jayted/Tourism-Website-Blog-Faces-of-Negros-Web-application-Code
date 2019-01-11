   <?php session_start(); ?>
<?php
include('check.php');
?>





<!DOCTYPE html>

<?php
require_once('bdd.php');


$sql = "SELECT id, title,address, start, end, color FROM events ";

$req = $bdd->prepare($sql);
$req->execute();

$events = $req->fetchAll();

?>



<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Faces of negros</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  
 <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="fonts/themify/themify-icons.css">
  <!-- styles -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/css/bootstrap.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/css/bootstrap-responsive.css" rel="stylesheet">
  <link rel="icon" href="logo/lg.jpg" sizes="32x32">
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="logo/lg.jpg">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="logo/lg.jpg">
  <link href="assets/css/docs.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/prettyPhoto/3.1.6/css/prettyPhoto.css" rel="stylesheet">
  <link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet">
  <link href="assets/css/camera.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300|Open+Sans:400,300,300italic,400italic" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/color/success.css" rel="stylesheet">
  <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css' rel='stylesheet' />
 
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

<body>

  <header>
    <!-- Navbar
    ================================================== -->
 <?php include('nav.php'); ?>
  </header>

  <section id="intro">
    <div class="jumbotron masthead">

      <div class="container">
        <div class="row">
          <div class="span12">
            <div class="camera_wrap camera_black_skin" id="camera_wrap_2">

                                  <?php
  include('db/db_con.php');
    $sql = "select * from places,rating where places.place_id = rating.place_id   GROUP BY places.place_id  ORDER by AVG(rating_no) + count(comment)  DESC  LIMIT 20   ";
    // echo $sql;
    $result = mysqli_query($link,$sql);
    if (mysqli_num_rows($result) > 0) 
    {
        // Sử dụng vòng lặp while để lặp kết quả
        while($row = mysqli_fetch_assoc($result)) {
        
           $name = $row['name'];
            $place_id = $row['place_id'];
           $description = $row['description'];
           $image = $row['image'];
            $place_id = $row['place_id'];
             $address = $row['address'];
             $city = $row['city'];
             $municipality = $row['municipality'];
    ?>
              <div data-thumb="image/<?php echo $image ?>" data-src="image/<?php echo $image ?>">
                <div class="camera_caption fadeFromBottom">
                  <h5><b><a href="info.php?place_id=<?php echo $place_id  ?>&address=<?php echo $address  ?>"><?php echo utf8_decode($name);?></a></b></h5>
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
                      <i style = "font-size:20px;" class="fa fa-heart red " ></i>
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
                  <div class="hidden-phone">
                      <h7>Address: <?php echo $address ?></h7> <br>
                    <h7> <?php 
                    if($city == TRUE)
                      {
                    echo "City :" .$city;
                      }
                      else
                      {
                         echo "Municipality :" .$municipality;
                      } 
                        ?>
                      </h7>
                     <br>
                  
                    <p>
             
                           <?php  $description = strip_tags($description);
if (strlen($description) >5) {

    // truncate string
    $stringCut = substr($description, 0,300);
    $endPoint = strrpos($stringCut, ' ');

    //if the string doesn't contain any space then it will cut without word basis.
    $description = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);
    $description .= '... <a href="info.php?place_id=<?php echo $place_id  ?>&address=<?php echo $address  ?>"></a>';
}
echo utf8_decode($description);  ?>
                    </p>
                  </div>
                </div>
              </div>
              <?php }} ?>
      
     
     
            </div>
            <!-- #camera_wrap_1 -->

          </div>
        </div>
      </div>
    </div>
  </section>


<!--   Top 5 rated places -->

          
   
   <section id="maincontent">
    <div class="container">
      <div class="row">
        <div class="span12">
       

          <div class="row">
            <div class="span4">
              <div class="well well-primary">
                <h4>Top 5 Rated places</h4>
               
                <ul class="check-white">


                               <?php
include('db/db_con.php');
     $sql = "select * from places,rating where places.place_id = rating.place_id   GROUP BY places.place_id  ORDER by AVG(rating_no) + count(comment) DESC  LIMIT 5   ";
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
        
                  <li> <h7 ><a   style = "color:white;" href="info.php?place_id=<?php echo $place_id  ?>&address=<?php echo $address  ?>"><?php echo $name ?> :</h7>  
              <h7>Review : <?php 
 
        $query = "SELECT count(*)
              FROM rating
              WHERE place_id = '$place_id'
              ;";
        $ratingresult = mysqli_query($link, $query);
        $ratingrow = mysqli_fetch_row($ratingresult);


       ?><?=$ratingrow[0]; ?>
     </a></h7>
   </li>
 <?php }} ?>
              

                </ul>

          
              </div>
            </div>

            <div class="span4">
              <div class="well well-warning">
                <h4>Top 5 Recommended  Municipalities</h4>
             
                <ul class="check-white">
         <?php
include('db/db_con.php');
    $sql = "select * from places where municipality !='' GROUP BY municipality ORDER by count(municipality) DESC  LIMIT 5   ";
    // echo $sql;
    $result = mysqli_query($link,$sql);
    if (mysqli_num_rows($result) > 0) 
          $exalert2=mysqli_num_rows($result);
 $ex2 = true;
    {
        // Sử dụng vòng lặp while để lặp kết quả
        while($row = mysqli_fetch_assoc($result)) {
     
            $place_id = $row['place_id'];
             $address = $row['address'];
             $municipality = $row['municipality'];

    ?>


                  <li><a  style = "color:white;" href="municipality.php?address=<?php echo $municipality; ?>"><h7>     
                        <?php  $municipality = strip_tags($municipality);
if (strlen($municipality) >5) {

    // truncate string
    $stringCut = substr($municipality, 0,70);
    $endPoint = strrpos($stringCut, ' ');

    //if the string doesn't contain any space then it will cut without word basis.
    $municipality = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);
    $municipality .= '... <a href="municipality.php?address=<?php echo $municipality; ?>"></a>';
}
echo utf8_decode($municipality);  ?></h7>  

   </a></li>
   <?php }} ?>



                </ul>

        
              </div>
            </div>

            <div class="span4">
              <div class="well well-info">
                <h4>Top 5 Recommended Cities</h4>
     
                <ul class="check-white">

     <?php
include('db/db_con.php');
    $sql = "select * from places  where city !='' GROUP BY city ORDER by count(city) DESC  LIMIT 5   ";
    // echo $sql;
    $result = mysqli_query($link,$sql);
    if (mysqli_num_rows($result) > 0)
         $exalert1=mysqli_num_rows($result);
 $ex1 = true;  
    {
        // Sử dụng vòng lặp while để lặp kết quả
        while($row = mysqli_fetch_assoc($result)) {
     
            $place_id = $row['place_id'];
             $address = $row['address'];
             $city = $row['city'];

    ?>
                  <li><a style = "color:white;" href="city.php?address=<?php echo $city; ?>">
                    <?php  $city = strip_tags($city);
if (strlen($city) >5) {

    // truncate string
    $stringCut = substr($city, 0,70);
    $endPoint = strrpos($stringCut, ' ');

    //if the string doesn't contain any space then it will cut without word basis.
    $city = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);
    $city .= '... <a href="municipality.php?address=<?php echo $municipality; ?>"></a>';
}
echo utf8_decode($city);  ?><h7>
                  </h7>  
  
   </a></li>
          <?php }} ?>
                </ul>

              </div>
            </div>

 
          </div>
        </div>
      </div>

    </div>
  </section>



 
<!-- Modal -->





  <section id="maincontent">
    <div class="container">
      <div class="row-fluid">
        <div class="span12">
              <h3 class="heading-success">Best Places To Go</h3>
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
      <div class="row">
        <ul class="portfolio-area da-thumbs">

                          <?php
  include('db/db_con.php');
    $sql = "select * from places,rating,categories where places.place_id = rating.place_id and categories.name = places.category   GROUP BY places.place_id  ORDER by AVG(rating_no) + count(comment) DESC  limit 20 ";
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
            <div class="span3">
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
                <h6><b><a href="info.php?place_id=<?php echo $place_id ?>&address=<?php echo $address ?>">
                  <?php  $address = strip_tags($address);
if (strlen($address) >20) {

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
      </div>
      <div class="row">
        <div class="span12">
      
        </div>
      </div>
    </div>
   
  </section>
  <div class="verybottom">
      <div class="container">
            <div class="row">
    
            <div class="span2">
          <a href="cities.php"><h3 class="heading-success"><span class="btn btn-large btn-success"> <?php 
        $query = "SELECT count(*)
              FROM cities ;";
        $ratingresult = mysqli_query($link, $query);
        $cities_num = mysqli_fetch_row($ratingresult);


       ?><?=$cities_num[0]; ?>
         
       </span>&nbsp;&nbsp;Cities</h3>
       </a>
        </div>
             <div class="span3">
            <a href="municipalities.php"><h3 class="heading-success"><span class="btn btn-large btn-success"> <?php 
        $query = "SELECT count(*)
              FROM municipalities ;";
        $ratingresult = mysqli_query($link, $query);
        $municipalities = mysqli_fetch_row($ratingresult);


       ?><?=$municipalities[0]; ?></span>&nbsp;&nbsp;Municipalities</h3>
     </a>
        </div>
            <div class="span2">
        <a href="places.php">  <h3 class="heading-success"><span class="btn btn-large btn-success"> <?php 
        $query = "SELECT count(*)
              FROM places ;";
        $ratingresult = mysqli_query($link, $query);
        $places = mysqli_fetch_row($ratingresult);


       ?><?=$places[0]; ?></span>&nbsp;&nbsp;Places</h3></a>
        </div>
              <div class="span2">
          <h3 class="heading-success"><span class="btn btn-large btn-success"> <?php 
        $query = "SELECT count(*)
              FROM account ;";
        $ratingresult = mysqli_query($link, $query);
        $account = mysqli_fetch_row($ratingresult);


       ?><?=$account[0]; ?></span>&nbsp;&nbsp;Users</h3>
        </div>
              <div class="span2">
          <h3 class="heading-success"><span class="btn btn-large btn-success"><?php 
        $query = "SELECT count(*)
              FROM posted ;";
        $ratingresult = mysqli_query($link, $query);
        $posted = mysqli_fetch_row($ratingresult);


       ?><?=$posted[0]; ?></i></span>&nbsp;&nbsp;Post</h3>
        </div>
   
      </div>
      </div>

    </div>
      <div class="round-button"  id="fixedbutton"><div class="round-button-circle"><a href="festival.php">Festival</a></div></div>


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
