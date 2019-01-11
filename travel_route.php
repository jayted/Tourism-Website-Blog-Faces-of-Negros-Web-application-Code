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
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <!-- styles -->
    <style type="text/css">
        .red {
    color: red;
}
    #results  {width: 990px; height: 500px }
    div#results #map_canvas   { width: 65%; height: 100%; float: left; }
    div#results #directions_panel { width: 35%; height: 100%; overflow: auto; float: right; }
    select{
        width: 189px;
        border-radius: 5px;
        padding: 10px;
      }
      input[type=text]{
            border-radius: 5px;
            height: 25px;
            padding: 0px;
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
  <link rel="icon" href="logo/lg.jpg" sizes="32x32">
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="logo/lg.jpg">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="logo/lg.jpg">
   <script type="text/javascript" src=" https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>


  <script type="text/javascript">
  var map = null;
  var directionsDisplay = null;
  var directionsService = null;
  function initialize() {
      var myLatlng = new google.maps.LatLng(10.640739,122.968956);
      var myOptions = {
          zoom: 7,
          center: {lat:10.640739, lng:122.968956},
          mapTypeId: google.maps.MapTypeId.ROADMAP
      };
      map = new google.maps.Map($("#map_canvas").get(0), myOptions);
    directionsDisplay = new google.maps.DirectionsRenderer();
    directionsService = new google.maps.DirectionsService();
    var input = document.getElementById('start');
    var searchBox = new google.maps.places.SearchBox(input);
    var input2 = document.getElementById('end');
    var searchBox2 = new google.maps.places.SearchBox(input2);
  }

  function getDirections(){
    var start = $('#start').val();
    var end = $('#end').val();
    if(!start || !end){
      alert("Origin and destination are required");
      return;
    }
    var request = {
            origin: start,
            destination: end,
            travelMode: google.maps.DirectionsTravelMode[$('#travelMode').val()],
            unitSystem: google.maps.DirectionsUnitSystem[$('#unitSystem').val()],
            provideRouteAlternatives: true
      };
    directionsService.route(request, function(response, status) {
          if (status == google.maps.DirectionsStatus.OK) {
              directionsDisplay.setMap(map);
              directionsDisplay.setPanel($("#directions_panel").get(0));
              // console.log(response)
              directionsDisplay.setDirections(response);
              var summaryPanel = ($("#distance_panel").get(0));
        summaryPanel.innerHTML = '';
        var x = document.getElementById("rutaS");
        $('#rutaS option').remove();
              for (var j = 0; j < response.routes.length; j++){
        var option = document.createElement("option");
                var route = response.routes[j];
                // console.log(response.routes[j]);
                console.log(route)
          var routeSegment = j + 1;
          summaryPanel.innerHTML += '<b>Route ' + routeSegment + ': ';
          summaryPanel.innerHTML += route.legs[0].distance.text;
          option.text = route.legs[0].distance.text;
          option.value =route.legs[0].distance.text.substring(0,(route.legs[0].distance.text.length - 2));
          x.add(option);
          summaryPanel.innerHTML += ' (' + route.legs[0].distance.value + 'm)<br><br>';
              }
          } else {
              alert("Please place the origin and destine correctly");
          }
      });
  }
  function c(){
    var price = $('#type').val();
    var km = $('#rutaS').val();
    $('#costo').val('0');
    if (price != "" && km != "") {
          var nkm;
          if (parseFloat(km)>3) {
            nkm = parseInt(km);
            var neto = nkm * 1;
              document.getElementById('costo').value = Math.round(price) + Math.round(neto);
          }else{
            nkm = parseInt(km); // xd 3 km o menos
            document.getElementById('costo').value = price;  
          }
        }else{
          console.log("")
        }
  }
  $('#type').live('change',function(){
    c();
  });
  $('#rutaS').live('change',function(){
    c();
  });
  $('#search').live('click', function(){ getDirections(); });
  $('.routeOptions').live('change', function(){ getDirections(); });
  
  $(document).ready(function() {
      initialize();
  });



  function printPage(id) {
    var html="<html>";
    html+= document.getElementById(id).innerHTML;
    html+="</html>";
    var printWin = window.open('','','left=0,top=0,width=1,height=1,toolbar=0,scrollbars=0,status =0');
    printWin.document.write(html);
    printWin.document.close();
    printWin.focus();
    printWin.print();
    printWin.close();
}
  </script>
</head>
     




  
 
<body >

     
  <header>
    <!-- Navbar
    ================================================== -->
 <?php include('nav.php'); ?>
  </header>
 <div class="span8">
<section id="subintro" class = "jumbotron">
  <form class = "form-inline">
    
  <input type="text" style ="margin-right:40px" id="start" placeholder="From address or coordinates" />
   
    <input type="text" id="end"  placeholder=" To address or coordinates" />
      <button type="button" class = "pull-right btn-lg btn-warning"   id="search" style="width: 225px; height: 30px;margin-right:20px;">Seach Route</button>
       <select id="rutaS" style ="margin-right:40px">
        <option value="">-- Select Distance--</option>
       </select>
         <select id="type" name="type" style ="margin-right:40px">
            <option value="">--Trasportation mode--</option>
            <option value="317">Taxi : ₱ 13/km</option>
            <option value="22">Bus : ₱ 1.75/km</option>
            <option value="20">Jeep : ₱ 1.50/km</option>
       

          </select>

       
        
        <input type="text" disabled id="costo" placeholder="Cost" > <b>₱</b> </input>
    
   


 
 

      </form>
        <p style="display: none;">Route Options 
    <select id="travelMode" class="routeOptions">
      <option value="DRIVING" selected="selected">Driving</option>
            <option value="BICYCLING">Bicycling</option>
            <option value="WALKING">Walking</option>
        </select>
        <select id="unitSystem" class="routeOptions">
            <option value="METRIC" selected="selected">Metric</option>
            <option value="IMPERIAL">Imperial</option>
        </select>

  </section>
  <input type="button" value="Print" class = "btn btn-lg btn-primary" onclick="printPage('map_canvas');"></input>
  <div id="results" style="width: 990px; height: 500px;display: inline-block;">
 
    <div id="map_canvas" style="width: 80%; height: 100%; float: left;"></div>
  </div>
  </div>
 <div class="span4">
          <aside>

            <div class="widget">
                 <div class="input-append">
              <form class="form-search">
                <input style = "border-color:green;border-radius:10px 10px 10px 10px;" type="hide" class="input-medium search-query">
                <button type="submit" class="btn btn-inverse pull-right">Search</button>
              </form>
            </div>
          </div>
            <div class="widget">
                 <div id="routes_panel" >
      <div id="distance_panel" ></div>
      <div id="directions_panel"></div>
    </div>
            </div>
              
                     <div class="widget">
              <ul id="myTab" class="nav nav-tabs">
                  <li class = " active success" ><a href="#top_rated" data-toggle="tab">Best Places To go</a></li>
                <li><a href="#popular" data-toggle="tab">Popular Places</a></li>
             
            
              </ul>
            
              <div id="myTabContent" class="tab-content">
            
                <div class="tab-pane fade in " id="popular">
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
                      <a href="info.php?pplace_id=<?php echo $place_id ?>&address=<?php echo $paddress  ?>"><img style = "height:100px;width:150px;" src="image/<?php echo $image ?>" class="alignleft" alt="" /></a>
                      <h6><a href="info.php?pplace_id=<?php echo $place_id ?>&address=<?php echo $paddress  ?>"><?php echo utf8_decode($name); ?> </a></h6>
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

                      <p>
                           <a href="info.php?pplace_id=<?php echo $place_id ?>&address=<?php echo $paddress  ?>">
                      <?php  $description = strip_tags($description);
if (strlen($description) >20) {

    // truncate string
    $stringCut = substr($description, 0,40);
    $endPoint = strrpos($stringCut, ' ');

    //if the string doesn't contain any space then it will cut without word basis.
    $description = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);
    $description .= '... <a href="info.php?place_id=<?php echo $place_id  ?>&address=<?php echo $address  ?>"></a>';
}
echo utf8_decode($description);  ?>
                      </p>
            
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
                      <a href="#"><img  src="assets/img/icons/quote.png" class="alignleft" alt="" /></a>
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
                <div class="tab-pane fade in active" id="top_rated">
                  <ul class="recent">

                          <?php
include('db/db_con.php');
    $sql = "select * from places,rating where places.place_id = rating.place_id   GROUP BY places.place_id  ORDER by AVG(rating_no) + count(comment) DESC  limit 5 ";
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
                      <h6><a href="info.php?place_id=<?php echo $place_id  ?>&address=<?php echo $address  ?>">        <?php  $name = strip_tags($name);
if (strlen($name) >20) {

    // truncate string
    $stringCut = substr($name, 0,10);
    $endPoint = strrpos($stringCut, ' ');

    //if the string doesn't contain any space then it will cut without word basis.
    $name = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);
    $name .= '... <a href="info.php?place_id=<?php echo $place_id  ?>&address=<?php echo $address  ?>"></a>';
}
echo utf8_decode($name);  ?> </a></h6>
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
                          <a href="info.php?place_id=<?php echo $place_id  ?>&address=<?php echo $address  ?>">
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
                </a>
                    </li>
                   

                   <?php }} ?>
                  </ul>
                </div>
              </div>
            </div>
      
            <div class="clearfix"></div>
   
          </aside>
        </div>

      </div>
    </div>
      <div class="round-button"  id="fixedbutton"><div class="round-button-circle"><a href="festival.php">Festival</a></div></div>
    <script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          mapTypeControl: false,
     center: {lat:10.640739, lng:122.968956},
          zoom: 2
        });

        new AutocompleteDirectionsHandler(map);
      }

       /**
        * @constructor
       */
      function AutocompleteDirectionsHandler(map) {
        this.map = map;
        this.originPlaceId = null;
        this.destinationPlaceId = null;
        this.travelMode = 'DRIVING';
        var originInput = document.getElementById('origin-input');
        var destinationInput = document.getElementById('destination-input');
        var modeSelector = document.getElementById('mode-selector');
        this.directionsService = new google.maps.DirectionsService;
        this.directionsDisplay = new google.maps.DirectionsRenderer;
        this.directionsDisplay.setMap(map);

        var originAutocomplete = new google.maps.places.Autocomplete(
            originInput, {placeIdOnly: true});
        var destinationAutocomplete = new google.maps.places.Autocomplete(
            destinationInput, {placeIdOnly: true});

        this.setupClickListener('changemode-walking', 'WALKING');
        this.setupClickListener('changemode-transit', 'TRANSIT');
        this.setupClickListener('changemode-driving', 'DRIVING');

        this.setupPlaceChangedListener(originAutocomplete, 'ORIG');
        this.setupPlaceChangedListener(destinationAutocomplete, 'DEST');

        this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(originInput);
        this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(destinationInput);
        this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(modeSelector);
      }

      // Sets a listener on a radio button to change the filter type on Places
      // Autocomplete.
      AutocompleteDirectionsHandler.prototype.setupClickListener = function(id, mode) {
        var radioButton = document.getElementById(id);
        var me = this;
        radioButton.addEventListener('click', function() {
          me.travelMode = mode;
          me.route();
        });
      };

      AutocompleteDirectionsHandler.prototype.setupPlaceChangedListener = function(autocomplete, mode) {
        var me = this;
        autocomplete.bindTo('bounds', this.map);
        autocomplete.addListener('place_changed', function() {
          var place = autocomplete.getPlace();
          if (!place.place_id) {
            window.alert("Please select an option from the dropdown list.");
            return;
          }
          if (mode === 'ORIG') {
            me.originPlaceId = place.place_id;
          } else {
            me.destinationPlaceId = place.place_id;
          }
          me.route();
        });

      };

      AutocompleteDirectionsHandler.prototype.route = function() {
        if (!this.originPlaceId || !this.destinationPlaceId) {
          return;
        }
        var me = this;

        this.directionsService.route({
          origin: {'placeId': this.originPlaceId},
          destination: {'placeId': this.destinationPlaceId},
          travelMode: this.travelMode
        }, function(response, status) {
          if (status === 'OK') {
            me.directionsDisplay.setDirections(response);
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      };

    </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTanm_xZQi4_RHeCAxerOqXN96NUwrbZU&libraries=places">
  </script>
  
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
  
  
  <script>


</body>
</html>
