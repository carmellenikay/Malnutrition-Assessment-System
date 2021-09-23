<?php 
	session_start();
	include("Controller/DamageReportController.php");
	include("Model/Damage_report.php");
	
	$drCon = new DamageReportController();
	$datatyphoon = $drCon->showTyphoon();
	//for($ctr=0;$ctr<$datatyphoon['count'];$ctr++){
		//	echo $t_name=$datatyphoon['typhoon_name'][$ctr];
	//} 
	//$dr = new Damage_report();
	//$dr->settpname($_POST['tpname']);
	//$dataStyphoon = $drCon->showSTyphoon($dr);
	if($_POST['check'])
	{
	$dr = new Damage_report();
	$dr->settpname($_POST['tpname']);
	$dataStyphoon = $drCon->showSTyphoon($dr);	
		for($ctr1=0;$ctr1<$dataStyphoon['count'];$ctr1++){
			echo $t_name=$dataStyphoon['typhoon_name'][$ctr1];
		}
	}
	
?>
<!doctype html>

<html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Legazpi DAS - Map Locator</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="images/logo1b.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

		<style>
.left{
	float:left;
}
.right{
	float:right;
}
  html, body {
        height: 100%;
        margin: 0;
        padding: 0;
		background-color:;
      }
      #map {
        height: 100%;
	
      
    }
 #legend {
	background: #FFF;
	padding: 10px;
	margin: 5px;
	font-size: 12px;
	font-family: Arial, sans-serif;
	margin-right:30px;
	margin-top:30px;
	float:right;
	border-radius:5px;
	margin-top:30px;
	left: 26px;
}

      #legend p {
        font-weight: bold;
      }

      #legend div {
        padding-bottom: 2px;
      }

      .color {
        border: 1px solid;
        height: 12px;
        width: 12px;
        margin-right: 3px;
        float: left;
      }
	      .top{
		margin-top:60px;}

		.shout_box {
	background: #627BAE;
	width: 300px;
	overflow: hidden;
	position: fixed;
	bottom: 0;
	right: 10px;;
	z-index:9;
	float:right;
	margin-bottom:48px;
}
.shout_box .header1 .close_btn {
	background: url(images/close_btn.png) no-repeat 0px 0px;
	float: right;
	width: 15px;
	height: 15px;
}
.shout_box .header1 .close_btn:hover {
	background: url(images/close_btn.png) no-repeat 0px -16px;
	height:8px;
}

.shout_box .header1 .open_btn {
	background: url(images/close_btn.png) no-repeat 0px -32px;
	float: right;
	width: 15px;
	height: 15px;
}
.shout_box .header1 .open_btn:hover {
	background: url(images/close_btn.png) no-repeat 0px -48px;
}
.shout_box .header1{
	padding: 5px 3px 5px 5px;
	font: 11px 'lucida grande', tahoma, verdana, arial, sans-serif;
	font-weight: bold;
	color:#fff;
	border: 1px solid rgba(0, 39, 121, .76);
	border-bottom:none;
	cursor: pointer;
}
.shout_box .header1:hover{
	background-color: #627BAE;
}
.shout_box .message_box {
	background: #FFFFFF;
	height: 330px;
	overflow:auto;
	border: 1px solid #CCC;
}
.shout_msg{
	margin-bottom: 10px;
	display: block;
	border-bottom: 1px solid #F3F3F3;
	padding: 0px 5px 5px 5px;
	font: 11px 'lucida grande', tahoma, verdana, arial, sans-serif;
	color:#7C7C7C;
}
.message_box:last-child {
	border-bottom:none;
}
time{
	font: 11px 'lucida grande', tahoma, verdana, arial, sans-serif;
	font-weight: normal;
	float:right;
	color: #D5D5D5;
}
.shout_msg .username{
	margin-bottom: 10px;
	margin-top: 10px;
}
.user_info input {
	width: 98%;
	height: 25px;
	border: 1px solid #CCC;
	border-top: none;
	padding: 3px 0px 0px 3px;
	font: 11px 'lucida grande', tahoma, verdana, arial, sans-serif;
}
.shout_msg .username{
	font-weight: bold;
	display: block;
}
.color{
	background-color:#8B8989;
}


</style>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA5R6JEIiERVxCgYhl9gsGZ8GOUvnifjO4"
            type="text/javascript"></script>
    <script type="text/javascript">
	
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
	
	            <script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
				
				
	
	           
       
</head>
<body onLoad="initMap()">
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div id="main-menu" class="main-menu collapse navbar-collapse">
               <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="apsemo_index.php"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li class="menu-title">Informations</li><!-- /.menu-title -->
                     <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Barangay</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-th"></i><a href="BarangayInfo.php">View Barangay Info</a></li>
                        </ul>
                    </li>
					 
                    

                    <li class="menu-title">Reports</li><!-- /.menu-title -->
					<li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bar-chart"></i>Damage Cost Report</a>
                        <ul class="sub-menu children dropdown-menu">
						    <li><i class="menu-icon fa fa-table"></i><a href="damagereportinfo_detailed.php">Detailed Report</a></li>
                            <li><i class="menu-icon fa fa-table"></i><a href="damagereportinfo.php">Damage Cost per Barangay</a></li>
							<li><i class="menu-icon fa fa-table"></i><a href="damagereportinfo_specific.php">Damage Cost per Category</a></li>
							<li><i class="menu-icon fa fa-bar-chart"></i><a href="damagereportinfo_specific.php">Damage Graph per Damage Type</a></li>

</a></li>
                        </ul>
                    </li>
					
					<li class="menu-title">Map Locator</li><!-- /.menu-title -->
					 <li class="menu-item-has-children dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-map-o"></i>Damage Cost Map</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-map-o"></i><a href="maps-gmap.php">Assessment Map</a></li>
                        </ul>
                    </li>

					<li class="menu-title">Logout Account</li><!-- /.menu-title -->
					
					<li><i class="menu-icon fa ti-power-off"><a href="logout.php"> logout now!</a></i></li>
                      
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo"></a>
                    <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    

                    <div class="user-area dropdown float-right">
                       <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Welcome Apsemo : <?php echo $_SESSION['username'];?> &nbsp;
                            <img class="user-avatar rounded-circle" src="images/admin.png" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            

                            <a class="nav-link" href="#"><i class="fa fa-power-off"></i>Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="index.php">Dashboard</a></li>
									<li><a href="damagereportinfo.php">Damage Cost Report</a></li>
                                    <li class="active">Damage Map Locator</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">

                <div class="row">
				<div class="col-lg-6">
				<div class="card-header">
				Choose Typhoon 
						<form method="POST" action="maps-gmap.php"> 
						<select name="tpname" class="form-control" style='width:300px'>
						<option>Select Typhoon</option>
						<?php
						for($ctr=0;$ctr<$datatyphoon['count'];$ctr++){
						$t_name=$datatyphoon['typhoon_name'][$ctr];
						echo "<option value=".$t_name.">".$t_name."</option>";
						} 						
						?>
						</select>
						<input type="submit" name="check" value="check">
						</form>
				</div>		
						</div>
                    <div class="col-lg-12">
                        <div class="card">
						
                            <div class="card-header">
                                <h4>Legazpi Damage Assessment Map Locator for typhoon: <b>
								<?php 
								if($_POST['tpname']==""){
									echo "No selected Typhoon";
								}
								else{
								echo $_POST['tpname'];
								}

								?> </b></h4>
                            </div>
                            <div class="gmap_unix card-body">
							
							            <div id="panel"> 
                <div class="banner" style="width: 100%; height: 550px;">        
                    <div class='mapcon' id="map-container" style="width: 100%; height: 100%;" > </div>
					
					
                    
					 <div id="info-box"></div>
			   <div id="legend" style="z-index: 0; background:#FFF; height:auto; position:absolute; bottom: 50px; float:left; margin-top:-20px;"><p>&nbsp;Legend of Legazpi City <br />
			   <b>Typhoon Disaster Map&nbsp;</b></p>
      <div><span class="color" style="background-color: red;"></span><span>500,000.00Php Above</span></div>
	  <div><span class="color" style="background-color:blue;"></span><span> 200,000 - 499,000.00Php</span></div>
	  <div><span class="color" style="background-color:orange;"></span><span> 100,000.00 - 199,000.00Php</span></div>
	  <div><span class="color" style="background-color:yellow;"></span><span> 100,000.00Php below</span></div>
	  
	  </div>
					
                </div>
				
                
            </div>
      

                                
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
                    <!-- /# column -->
                    <!-- /# column -->
                </div>
                <!-- /# row -->




            </div><!-- .animated -->
        </div><!-- .content -->
        <div class="clearfix"></div>



    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <!-- Scripts -->
	 <script async defer
	            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA5R6JEIiERVxCgYhl9gsGZ8GOUvnifjO4">
	            </script>
  
echo "<script>
function initMap() {
       var minZoomLevel = 11;
    
     
      var map = new google.maps.Map(document.getElementById('map-container'), {
     center: new google.maps.LatLng(13.139147, 123.739587),
		zoom: 12,
         mapTypeId: 'roadmap'
        });
    
    
    
 google.maps.event.addListener(map, 'zoom_changed', function () {
     if (map.getZoom() < minZoomLevel) map.setZoom(minZoomLevel);
 });
       

var PolyBarangays = [
  <?php
 //include "xmldamage_map.php";
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

$sql3 = mysqli_query($con, "SELECT *, SUM(estimated_cost) AS total_damage FROM damage_report, barangay WHERE damage_report.brgy_id = '$id' AND YEAR(`date_added`) = YEAR(CURDATE()) AND damage_report.brgy_id = barangay.b_id and typhoon_name='".$_POST['tpname']."' GROUP BY barangay.b_id");
$row3 = mysqli_fetch_array($sql3);
$legend = $row3['total_damage'];
$id2 = $row3['b_id'];

if($legend >= 500000){
  $color = 'red';
}elseif($legend >= 200000 && $legend <= 500000){
  $color = 'blue';
}elseif($legend >= 100000  && $legend <= 199999){
  $color = 'orange';
}
elseif($legend >=10000 && $legend <=99000){
  $color = 'yellow';
}else{
	$legend=0;
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
         'brgy': 'Barangay Name: ".$row['brgy'].",".$row['municipality']."<br> Damage Cost:".$legend."' 
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
    };";
?>
   
        
 var infoWindow = new google.maps.InfoWindow;

      // Change this depending on the name of your PHP file
        downloadUrl("xmldamage_map.php", function(data) { 
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName("marker");
        for (var i = 0; i < markers.length; i++) {
          var municipality = markers[i].getAttribute("municipality");
          var barangay = markers[i].getAttribute("barangay");
          var total_accident = markers[i].getAttribute("tdamage");
          var point = new google.maps.LatLng(
              parseFloat(markers[i].getAttribute("lat")),
              parseFloat(markers[i].getAttribute("lng")));
          var html = "municipality: <b>" + municipality + "</b> <br/>Barangay:" + barangay+ "<br/><p><a href='damagereportinfo.php?id="+barangay+"'>View The Information</a></p>"; 
          var marker = new google.maps.Marker({
            map: map,
            position: point
          });
          bindInfoWindow(marker, map, infoWindow, html);
        }
      });

        

    

    }    


    function bindInfoWindow(marker, map, infoWindow, html) {
      google.maps.event.addListener(marker, 'click', function() {
        infoWindow.setContent(html);
        infoWindow.open(map, marker);
      });
    }

    function downloadUrl(url, callback) {
      var request = window.ActiveXObject ?
          new ActiveXObject('Microsoft.XMLHTTP') :
          new XMLHttpRequest;

      request.onreadystatechange = function() {
        if (request.readyState == 4) {
          request.onreadystatechange = doNothing;
          callback(request, request.status);
        }
      };

      request.open('GET', url, true);
      request.send(null);
    }

    function doNothing() {}
</script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>

    <!-- Gmaps -->
    <!--<script src="https://maps.googleapis.com/maps/api/js?v=3&sensor=false"></script>-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD2jlT6C_to6X1mMvR9yRWeRvpIgTXgddM"></script>

    <script src="assets/js/lib/gmap/gmaps.js"></script>
    <script src="assets/js/init/gmap-init.js"></script>

</body>
</html>
