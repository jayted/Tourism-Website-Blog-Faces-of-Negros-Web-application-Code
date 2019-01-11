         <ul class="media-list">
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
        <?php
 
    
    // Get records from the database
    $query = $db->query("SELECT * from rating where  place_id = '$pplace_id' ORDER BY rating_no DESC LIMIT 2");
    
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
   <div class="show_more_main" id="show_more_main<?php echo $pplace_id; ?>">
        <span id="<?php echo $pplace_id; ?>" class="show_more" title="Load more posts">Show more</span>
        <span class="loding" style="display: none;"><span class="loding_txt">Loading...</span></span>
    </div>
    <?php ?>

          </ul>
