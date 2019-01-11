    <?php
include('db/db_con.php');
?>


<?php
$id = $_POST['id'];
if(!empty($_POST["id"])){

    
    // Count all records except already displayed
    $query = $db->query("SELECT COUNT(*) as num_rows FROM  rating where  place_id <'$id'  ORDER BY rating_no ASC");
    $row = $query->fetch_assoc();
    $totalRowCount = $row['num_rows'];
    
    $showLimit = 2;
    
    // Get records from the database
    $query = $db->query("SELECT * FROM rating where  place_id < '$id'  ORDER BY rating_no DESC LIMIT $showLimit");

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
    <?php } ?>
    <?php if($totalRowCount > $showLimit){ ?>
        <div class="show_more_main" id="show_more_main<?php echo $place_id; ?>">
            <span id="<?php echo $place_id; ?>" class="show_more" title="Load more posts">Show more</span>
            <span class="loding" style="display: none;"><span class="loding_txt">Loading...</span></span>
        </div>
   <?php } ?>
<?php
    }
}
?>
