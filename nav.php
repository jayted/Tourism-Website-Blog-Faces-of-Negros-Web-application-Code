<style type="text/css">
   .hit-the-floor {
    color: #1dbb14;

}

.hit-the-floor {
  text-align: center;
}
</style>







   <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <!-- logo -->
          
     <a class="brand logo" href="index.php">   <b>  
      
   <div class="hit-the-floor">Faces Of Negros Occidental</div>

          </a>
          </b>
          <!-- end logo -->

          <!-- top menu -->
          <div>
                <div id="login" class="collapse">
                <div class="accordion-inner">
            <form method="post" action = "log.php" class="form-inline pull-right">
  <input  type="text" class="input-small" name="userName" placeholder="Username">
  <input type="password" class="input-small"  name = "password" placeholder="Password">

  <button   type="submit" name="submit" class="btn" value="LOGIN">Sign in</button>

</form>
</div>
</div>
            <nav>
            <form method="GET" action = "search_r.php" class="form-inline pull-right">
  <input  type="text" style ="margin-top:5px;width:200px;" class="input-small" name="search"  placeholder="Search">

  <button   type="submit" name="submit" class="btn btn-success" value="search">Search</button>

</form>
              <ul class="nav topnav">
                <li>
   
                </li>

                  <li class="hover dropdown success class="dropdown">
                  <a  href="index.php">Home</a>
            
                </li>

                   <li  class="dropdown">
                  <a  href="travel_route.php">Travel Route</a>
            
                </li>
            
          <li class="dropdown ">
                  <a href="cities.php">Cities</a>
                  <ul class="dropdown-menu">
                  <?php
 include('db/db_con.php');
    $sql = "select * from cities order by name ";
    
    $result = mysqli_query($link,$sql);
    if (mysqli_num_rows($result) > 0) 
    {
       
        while($row = mysqli_fetch_assoc($result)) {
        
           $name = $row['name'];
           $description = $row['description'];
           $image = $row['image'];
            $cities_id = $row['cities_id'];
              $caddress = $row['address'];
    ?>
                    <li class="dropdown"><a href="city.php?city_id=<?php echo $cities_id ?>&address=<?php echo $caddress ?>"><?php echo utf8_decode($name);?></a>
                       <?php }} ?>
                      <ul class="dropdown-menu sub-menu">
                             <?php
include('db/db_con.php');
  


    $sql = "select *  from places where city = '$caddress' order by name";
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
                        <li><a href="info.php?place_id=<?php echo $place_id  ?>&address=<?php echo $address  ?>"><?php echo utf8_decode($name); ?></a></li>
                        <?php }} ?>
                      </ul>
                    </li>
                   
             
                  </ul>
                </li>
                <li class="dropdown ">
                  <a href="municipalities.php">Municipalities</a>
                  <ul class="dropdown-menu">
                                                 <?php
 include('db/db_con.php');
    $sql = "select * from municipalities order by name ";
    
    $result = mysqli_query($link,$sql);
    if (mysqli_num_rows($result) > 0) 
    {
       
        while($row = mysqli_fetch_assoc($result)) {
        
         $name = $row['name'];
           $description = $row['description'];
           $image = $row['image'];
            $mun_id = $row['mun_id'];
              $maddress = $row['address'];
    ?>
                    <li class="dropdown"><a href="municipality.php?mun_id=<?php echo $mun_id ?>&address=<?php echo $maddress ?>"><?php echo utf8_decode($name);?></a>
                       <?php }} ?>
                      <ul class="dropdown-menu sub-menu">
                             <?php

  include('db/db_con.php');
  


    $sql = "select *  from places where municipality = '$maddress'";
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
                        <li><a href="info.php?place_id=<?php echo $place_id  ?>&address=<?php echo $address  ?>"><?php echo utf8_decode($name);?></a></li>
                        <?php }} ?>
                      </ul>
                    </li>
                   
             
                  </ul>
                </li>
                    <li class="dropdown ">
                  <a href="places.php">Places</a>
                  <ul class="dropdown-menu">
                    <?php
include('db/db_con.php');
    $sql = "select * from places order by name  ";
    
    $result = mysqli_query($link,$sql);
    if (mysqli_num_rows($result) > 0) 
    {
       
        while($row = mysqli_fetch_assoc($result)) {
        
           $name = $row['name'];
            $address = $row['address'];
            $place_id = $row['place_id'];
    ?>
                    <li><a href="info.php?place_id=<?php echo $place_id ?>&address=<?php echo $address ?>"><?php echo utf8_decode($name);?></a></li>
                    <?php }} ?>
                  </ul>
                </li>
                         <li class="dropdown">
                  <a href="#">Categories</a>
                  <ul class="dropdown-menu">
                     <?php
  include('db/db_con.php');
    $sql = "select * from categories order by name";
    
    $result = mysqli_query($link,$sql);
    if (mysqli_num_rows($result) > 0) 
    {
       
        while($row = mysqli_fetch_assoc($result)) {
        
           $name = $row['name'];
           
            $cat_id = $row['cat_id'];
    ?>
                    <li><a href="category.php?category=<?php echo $name ?>"><?php echo utf8_decode($name);?></a></li>
                   <?php }} ?>
                  </ul>
                </li>
               







                <li class="dropdown">
                   




                     
                  <a href="#">Account</a>
                  <ul class="dropdown-menu">
                        <?php  if(isset($_SESSION['userID'])){ ?>
                         
                    <li><a href="negros blog/my_profile.php?acc_id=<?=$_SESSION['userID']?>">Profile </a></li>
                   <li><a href="negros blog/">Home</a></li>
                   <li><a href="logout.php">LogOut</a></li>
                     <?php }elseif(isset($_SESSION['admin'])) {
                      ?>
                     <li><a href="admin/">Admin</a></li>
                   <li><a href="admin/logout.php">LogOut</a></li>
                    <?php } 
                      else{?>

                    <li><a class="btn btn-success" data-toggle="collapse" data-parent="#accordion2" href="#login">LogIn</a></li>
                    <li><a href="negros blog/registration.php">Register</a></li>
                   <?php } ?>
                  </ul>
                </li>
          
              </ul>
            </nav>
          </div>
          <!-- end menu -->
        </div>
      </div>
    </div>