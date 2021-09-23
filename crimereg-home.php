<html>

			<head>
	            <script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
	           
        	</head>
<body onLoad="initMap()">              
            <div id="panel"> 
                <div class="banner" style="width: 100%; height: 550px;">         
                    <div class='mapcon' id="map-container" style="width: 100%; height: 100%;" > 
                    </div>
                    <div id="info-box"></div>          
                </div>
                <div class="footer">
                    <p>Copyrights © 2019 Location All rights reserved | DRRMC OF Legazpi City</p>
                </div>
            </div>
        </div>

       <script async defer
	            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA5R6JEIiERVxCgYhl9gsGZ8GOUvnifjO4">
	            </script>
    <?php
echo "<script>
function initMap() {
       var minZoomLevel = 12;
    
     
      var map = new google.maps.Map(document.getElementById('map-container'), {
     zoom: minZoomLevel,
   maxZoom: 22,
     center: new google.maps.LatLng(13.139147, 123.739587),
    
         mapTypeId: 'satellite'
        });
    
    
    
 google.maps.event.addListener(map, 'zoom_changed', function () {
     if (map.getZoom() < minZoomLevel) map.setZoom(minZoomLevel);
 });
       

var PolyBarangays = [";

define('DB_HOST', 'localhost'); 
define('DB_NAME', 'legazpidamageassessment'); 
define('DB_USER', 'root'); 
define('DB_PASSWORD',''); 
$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die("Failed to connect to MySQL: " . mysqli_error()); 



$sql = mysqli_query($con, "SELECT * FROM barangay");
$rows_two = mysqli_num_rows($sql);
$count = 0;
while($row = mysqli_fetch_array($sql)){
$count++;
$id = $row['b_id'];
$br = $row['brgy'];

$sql3 = mysqli_query($con, "SELECT *, COUNT(barangay) AS legend FROM crime_details,barangay WHERE barangay.`brgy` = '".$br."' AND crime_details.`municipality` = barangay.`municipality` AND crime_details.`barangay` = barangay.`brgy` GROUP BY crime_details.`municipality`");
$row3 = mysqli_fetch_array($sql3);
$legend = $row3['legend'];
$id2 = $row3['b_id'];

if($legend == 2 && $id == $id2){
  $color = 'red';


}else{
  $color = 'white';

}
echo "  [
[";
$sql2 = mysqli_query($con, "SELECT * FROM barangay_coor WHERE bar_id = '".$id."' ORDER BY bc_id ASC");
$rows_one = mysqli_num_rows($sql2);
$ctr = 0;
while($row2 = mysqli_fetch_array($sql2)){
$ctr++;
$string = "
    { 
      'lat': ".$row2['lat'].",
      'lng': ".$row2['lng']." 
    }"; 
echo $string;
    if($rows_one == $ctr){
        echo ' ';
    }else{
        echo ', ';
    }

 }
$string2 = "
    ],{
         'color': '".$color."',
         'brgy': 'Barangay Name: ".$row['brgy'].",".$row['municipality']."' 
        }
    ]";
  echo $string2;
    if($rows_two == $count){
        echo ' ';
    }else{
        echo ', ';
    }
  }
echo "];";

echo "
for (var i = 0; i < PolyBarangays.length; i++) {
    var bounds = new google.maps.LatLngBounds();

    var poly = new google.maps.Polygon({
      fillColor: PolyBarangays[i][1].color,
      strokeWeight: 0.5,
      path: PolyBarangays[i][0],
      map: map
    });

    for (var pathidx = 0; pathidx < poly.getPath().getLength(); pathidx++) {
      bounds.extend(poly.getPath().getAt(pathidx));
    }
    // store the computed center as a property of the polygon for easy access
    poly.center = bounds.getCenter();
    var infowindow = new google.maps.InfoWindow();
    var title = PolyBarangays[i][1].brgy;
    // use function closure to associate the infowindow with the polygon
    poly.addListener('click', (function(content) {
        return function() {
          // set the content
          infowindow.setContent(content);
          // set the position
          infowindow.setPosition(this.center);
          // open it
          infowindow.open(map);
        }
      })(PolyBarangays[i][1].brgy));
    };
   
        
  
  
}
</script>";
?>
		<!-- jquery 
			============================================ -->
	    <script src="../js/vendor/jquery-1.12.4.min.js"></script>
	        <!-- bootstrap JS
	            ============================================ -->
	        <script src="../js/bootstrap.min.js"></script>
	        <!-- wow JS
	            ============================================ -->
	        <script src="../js/wow.min.js"></script>
	        <!-- price-slider JS
	            ============================================ -->
	        <script src="../js/jquery-price-slider.js"></script>
	        <!-- meanmenu JS
	            ============================================ -->
	        <script src="../js/jquery.meanmenu.js"></script>
	        <!-- owl.carousel JS
	            ============================================ -->
	        <script src="../js/owl.carousel.min.js"></script>
	        <!-- sticky JS
	            ============================================ -->
	        <script src="../js/jquery.sticky.js"></script>
	        <!-- scrollUp JS
	            ============================================ -->
	        <script src="../js/jquery.scrollUp.min.js"></script>
	        <!-- mCustomScrollbar JS
	            ============================================ -->
	        <script src="../js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
	        <script src="../js/scrollbar/mCustomScrollbar-active.js"></script>
	        <!-- metisMenu JS
	            ============================================ -->
	        <script src="../js/metisMenu/metisMenu.min.js"></script>
	        <script src="../js/metisMenu/metisMenu-active.js"></script>
	        <!-- morrisjs JS
	            ============================================ -->
	        <script src="../js/sparkline/jquery.sparkline.min.js"></script>
	        <script src="../js/sparkline/jquery.charts-sparkline.js"></script>
	        <!-- calendar JS
	            ============================================ -->
	        <script src="../js/calendar/moment.min.js"></script>
	        <script src="../js/calendar/fullcalendar.min.js"></script>
	        <script src="../js/calendar/fullcalendar-active.js"></script>
	        <!-- maskedinput JS
	            ============================================ -->
	        <script src="../js/jquery.maskedinput.min.js"></script>
	        <script src="../js/masking-active.js"></script>
	        <!-- datepicker JS
	            ============================================ -->
	        <script src="../js/datepicker/jquery-ui.min.js"></script>
	        <script src="../js/datepicker/datepicker-active.js"></script>
	        <!-- form validate JS
	            ============================================ -->
	        <script src="../js/form-validation/jquery.form.min.js"></script>
	        <script src="../js/form-validation/jquery.validate.min.js"></script>
	        <script src="../js/form-validation/form-active.js"></script>
	        <!-- dropzone JS
	            ============================================ -->
	        <script src="../js/dropzone/dropzone.js"></script>
	        <!-- tab JS
	            ============================================ -->
	        <script src="../js/tab.js"></script>
	        <!-- plugins JS
	            ============================================ -->
	        <script src="../js/plugins.js"></script>
	        <!-- main JS
	            ============================================ -->
	        <script src="../js/main.js"></script>
    </body>
</html>