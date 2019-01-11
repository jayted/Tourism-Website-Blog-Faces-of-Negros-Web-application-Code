<footer class="footer">
    <div class="container">
      <div class="row">

    <div class="span4">
        
                <h4>Top 5 Popular places</h4>
               
                <ul class="check-white">


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

            <div class="span4">
        
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

            <div class="span4">

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

    <div class="verybottom">
      <div class="container">

            <div class="row">
    
            <div class="span2">
          <h3 class="heading-success"><span class="btn btn-large btn-success"> <?php 
        $query = "SELECT count(*)
              FROM cities ;";
        $ratingresult = mysqli_query($link, $query);
        $cities_num = mysqli_fetch_row($ratingresult);


       ?><?=$cities_num[0]; ?>
         
       </span>&nbsp;&nbsp;Cities</h3>
        </div>
             <div class="span3">
          <h3 class="heading-success"><span class="btn btn-large btn-success"> <?php 
        $query = "SELECT count(*)
              FROM municipalities ;";
        $ratingresult = mysqli_query($link, $query);
        $municipalities = mysqli_fetch_row($ratingresult);


       ?><?=$municipalities[0]; ?></span>&nbsp;&nbsp;Municipalities</h3>
        </div>
            <div class="span2">
          <h3 class="heading-success"><span class="btn btn-large btn-success"> <?php 
        $query = "SELECT count(*)
              FROM places ;";
        $ratingresult = mysqli_query($link, $query);
        $places = mysqli_fetch_row($ratingresult);


       ?><?=$places[0]; ?></span>&nbsp;&nbsp;Places</h3>
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
  </footer>

