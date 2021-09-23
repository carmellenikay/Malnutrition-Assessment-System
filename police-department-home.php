<?php
session_start();
require_once('Connections/Mapconnection.php');

function endofmonth($i,$y){
    if($i==1 ||$i ==3 || $i==5 || $i==7 || $i==8|| $i==10|| $i==12) {return 31;}
    elseif($i==2){ if($y-4==0){return 29;} else {return 28;}}
    else{ return 30;}
} 
function monwords($i){
    if($i == 1) return "January";
    if($i == 2) return "February";
    if($i == 3) return "March";
    if($i == 4) return "April";
    if($i == 5) return "May";
    if($i == 6) return "June";
    if($i == 7) return "July";
    if($i == 8) return "August";
    if($i == 9) return "September";
    if($i == 10) return "October";
    if($i == 11) return "November";
    if($i == 12) return "December";
}   

if(isset($_POST['sbtn_map'])){
    $map_date = $_POST['map_date'];
    $yr = date("Y", strtotime($map_date));
    $mon = date("m", strtotime($map_date));
    $day = date("d", strtotime($map_date));
    $map_date2 = $_POST['map_date2'];
    $yr2 = date("Y", strtotime($map_date2));
    $mon2 = date("m", strtotime($map_date2));
    $day2 = date("d", strtotime($map_date2));
}else{
    $map_date = date('Y-m-d');
    $yr = date("Y", strtotime($map_date));
    $mon = date("m", strtotime($map_date));
    $day = date("d", strtotime($map_date));
}

    $date_map_from = $yr."-".$mon."-00";
    if(isset($_POST['sbtn_map'])){
    $mon3 = $mon+11;
    $yr3 = $yr2;
    if($mon2>12){
        $mon2 = $mon2-12;
        $yr3 = $yr3+1;
    }
    $end2 = endofmonth(($mon3),$yr3);
    $date_map_to = $yr2."-".$mon2."-".$end2;
    $days = monwords($mon)." ".$yr." - ".monwords($mon2)." ".$yr2;
    }else{
    $mon2 = $mon+11;
    $yr2 = $yr;
    if($mon2>12){
        $mon2 = $mon2-12;
        $yr2 = $yr2+1;
    }
    $end = endofmonth(($mon2),$yr2);
    $date_to = $yr2."-".($mon2)."-".$end;
    $days = monwords($mon)." ".$yr." - ".monwords($mon2)." ".$yr2;
    $date_map_to = $yr2."-".$mon2."-".$end;
    }
?>
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Web GIS Road Accident Report in the 3rd District of Albay</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/logo/pnplogo.png">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- meanmenu CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu/meanmenu.min.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- jvectormap CSS
		============================================ -->
    <link rel="stylesheet" href="css/jvectormap/jquery-jvectormap-2.0.3.css">
    <!-- notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/notika-custom-icon.css">
    <!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="css/wave/waves.min.css">
    <link rel="stylesheet" href="css/wave/button.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style4.4.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body onLoad="load()">
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Start Header Top Area -->
    <div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="logo-area">
                        <a href="#" style="color: white; font-size: 21px;"><img width="21px" src="img/logo/pnplogo.png" alt="" /> Web GIS Road Accident Report</a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="header-top-menu">
                        <ul class="nav navbar-nav notika-top-nav">
                            
                            <!-- <li class="nav-item nc-al"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span><i class="notika-icon notika-alarm"></i></span></a>
                                <div role="menu" class="dropdown-menu message-dd notification-dd animated zoomIn">
                                    <div class="hd-mg-tt">
                                        <h2>Notification</h2>
                                    </div>
                                    <div class="hd-message-info">
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img">
                                                    <img src="img/post/1.jpg" alt="" />
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>David Belle</h3>
                                                    <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img">
                                                    <img src="img/post/2.jpg" alt="" />
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>Jonathan Morris</h3>
                                                    <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img">
                                                    <img src="img/post/4.jpg" alt="" />
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>Fredric Mitchell</h3>
                                                    <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img">
                                                    <img src="img/post/1.jpg" alt="" />
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>David Belle</h3>
                                                    <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img">
                                                    <img src="img/post/2.jpg" alt="" />
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>Glenn Jecobs</h3>
                                                    <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="hd-mg-va">
                                        <a href="#">View All</a>
                                    </div>
                                </div>
                            </li> -->
                            <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span><i class="fa fa-cog"></i></span><!-- <div class="spinner4 spinner-4"></div><div class="ntd-ctn"><span>2</span></div> --></a>
                                <div role="menu" class="dropdown-menu message-dd task-dd animated zoomInDown" style="padding-right: 10px; margin-left: 50px;">
                                    <div class="hd-message-info">
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img">
                                                    <img src="img/post/1.jpg" alt="" />
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>Bongyoo</h3>
                                                    <p>PNP Administrator</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-mg-ctn">
                                                    <h4 class="fa fa-lock text-primary"> Change Password</h4>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-mg-ctn">
                                                    <h4 class="fa fa-sign-out text-danger"> Logout</h4>
                                                </div>
                                            </div>
                                        </a>
                                </div>
                            </li>
                           
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top Area -->
    <!-- Mobile Menu start -->
    <div class="mobile-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul class="mobile-menu-nav">
                                <li><a data-toggle="collapse" data-target="#Charts" href="#">Home</a>
                                    <ul class="collapse dropdown-header-top">
                                        <li><a href="police-department-home.php">3rd District Map</a></li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#demodepart" href="#">List</a>
                                    <ul id="demodepart" class="collapse dropdown-header-top">
                                        <li><a href="witness-report-list.php">List of Witness Report</a></li>
                                        <li><a href="witness-account-list.php">List of Witnesses</a></li>
                                        <li><a href="accident-information-list.php">List of Accident Information</a></li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#demolibra" href="#">Reports</a>
                                    <ul id="demolibra" class="collapse dropdown-header-top">
                                        <li><a href="accident-information-m.php">Accident Information Monthly Report</a></li>
                                        <li><a href="accident-information-y.php">Accident Information Yearly Report</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu end -->
    <!-- Main Menu area start-->
    <div class="main-menu-area mg-tb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                        <li class="active"><a data-toggle="tab" href="#Home"><i class="notika-icon notika-house"></i> Home</a>
                        </li> 
                        <li><a data-toggle="tab" href="#List"><i class="notika-icon notika-windows"></i> List</a>
                        </li>
                        <li><a data-toggle="tab" href="#Reports"><i class="notika-icon notika-bar-chart"></i> Reports</a>
                        </li> 
                    </ul>
                    <div class="tab-content custom-menu-content">
                        <div id="Home" class="tab-pane in active notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a class="active" href="police-department-home.php">3rd District Map</a>
                                </li>
                            </ul>
                        </div>
                        <div id="List" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="witness-report-list.php">List of Witness Report</a>
                                </li>
                                <li><a href="witness-account-list.php">List of Witnesses</a>
                                </li>
                                <li><a href="accident-information-list.php">List of Accident Information</a>
                                </li>
                            </ul>
                        </div>
                        <div id="Reports" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="accident-information-m.php">Accident Information Monthly Report</a>
                                </li>
                                <li><a href="accident-information-y.php">Accident Information Yearly Report</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
    <!-- Main Menu area End-->
    <!-- Start Status area -->
    <div class="notika-status-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <?php
                            echo"<h4 style='padding-top: 7px;'>".$days."</h4>";
                         ?>
                    </div>
                </div>
                <form action="police-department-home.php" method="POST">
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <div class="input-group">
                            <span class="input-group-addon nk-ic-st-pro">Fr: <i class="glyphicon glyphicon-calendar"></i></span>
                            <div class="nk-int-st"> 
                                <input style="width: 170px;" name="map_date" id="map_date" type="month"  class="form-control" placeholder="Birthdate"> 
                            </div>
                        </div>                     
                    </div>
                </div>

                 <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <div class="input-group">
                            <span class="input-group-addon nk-ic-st-pro">To: <i class="glyphicon glyphicon-calendar"></i></span>
                            <div class="nk-int-st"> 
                                <input style="width: 170px;" name="map_date2" id="map_date2" type="month"  class="form-control" placeholder="Birthdate">
                                <input type="submit" name="sbtn_map" id="sbtn_map" hidden>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Status area-->
    <!-- Start Sale Statistic area-->
    <div class="sale-statistic-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-7 col-sm-6 col-xs-12">
                    <div class="sale-statistic-inner notika-shadow  mg-tb-30">
                        <div class="curved-inner-pro">
                            <div class="curved-ctn">
                                <h2>3rd District Map</h2>
                                <p>Road Accident Report</p>

                            </div>
                        </div>
                        <style>
                        #map {
                            width: 100%;
                            height:650px;
                            float: left;
                        }
                        </style>
                        <div id="map"></div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-5 col-sm-6 col-xs-12">
                    <div class="statistic-right-area notika-shadow sm-res-mg-t-30  mg-tb-30">
                        <div class="recent-items-title">
                            <h1>LEGEND</h1>
                            <p>Acccident Prone Area</p>
                        </div> <hr>
                        <div class="past-statistic-an">
                            <div class="past-statistic-ctn">
                                <h3 style="margin-left: 40px;" align="center"><span>HIGHLY ACCIDENT PRONE</span></h3>
                            </div>
                            <div class="past-statistic-graph">
                                <div class="color-single nk-red">
                                </div>
                            </div>
                        </div> <hr>
                        <div class="past-statistic-an">
                            <div class="past-statistic-ctn">
                                <h3 style="margin-left: 20px;" align="center"><span>MODERATELY ACCIDENT PRONE</span></h3>
                            </div>
                            <div class="past-statistic-graph">
                                <div class="color-single nk-deep-orange">
                                </div>
                            </div>
                        </div> <hr>
                        <div class="past-statistic-an">
                            <div class="past-statistic-ctn">
                                <h3 style="margin-left: 50px;" align="center"><span>LOW ACCIDENT PRONE</span></h3>
                            </div>
                            <div class="past-statistic-graph">
                                <div class="color-single nk-yellow">
                                </div>
                            </div>
                        </div> <hr>
                        <div class="past-statistic-an">
                            <div class="past-statistic-ctn">
                                <h3 style="margin-left: 100px;" align="center"><span>SAFE AREA</span></h3>

                            </div>
                            <div class="past-statistic-graph">
                                <div class="color-single nk-gray">
                                </div>
                            </div>
                        </div> <hr>
                    </div>
                    <div class="recent-items-wp notika-shadow sm-res-mg-t-30 mg-t-30">
                        <div class="rc-it-ltd" >
                            <div class="recent-items-ctn">
                                <div class="recent-items-title">
                                    <h2 style="margin-left: 15px; margin-top: 20px;">TOP ACCIDENT PRONE BARANGAYS</h2>
                                </div>
                            </div>
                            <div class="bsc-tbl-cls">
                                <table class="table table-inner table-vmiddle">
                                    <?php
                                        $sql4 = mysqli_query($conn, "SELECT *, COUNT(`barangay`.`b_id`) AS total FROM `barangay`, `record_incident` WHERE `barangay`.`municipality` = `record_incident`.`municipality` AND `barangay`.`brgy` = `record_incident`.`barangay` AND  (`record_incident`.`date_incident` BETWEEN '".$date_map_from."' AND '".$date_map_to."') GROUP BY `barangay`.`brgy` ORDER BY total DESC LIMIT 5");
                                    ?>
                                    <thead>
                                        <tr align='center'>
                                            <th>#</th>
                                            <th>Municipality</th>
                                            <th>Barangay</th>
                                            <th>Tot.</th>
                                            <th>Lv.</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $count = 1;
                                            while($row4 = mysqli_fetch_array($sql4)){
                                      
                                       echo "<tr align='center'>
                                                <td>".$count."</td>
                                                <td>".ucwords($row4['municipality'])."</td>
                                                <td>
                                                <input type='hidden' class='top".$row4['b_id']."' value='".$count."'>
                                                <a href='#' class='brgy' onclick='pinMarkers();' data-id='".$row4['b_id']."'>".ucwords($row4['brgy'])."</a></td>
                                                <td>".$row4['total']."</td>
                                                <td>";

                                                if($row4['total'] >= 15){
                                                 echo "<p class='nk-red'>H</p>";
                                                }elseif($row4['total']>= 10 && $row4['total'] <= 14){
                                                 echo "<p class='nk-deep-orange'>M</p>";
                                                }elseif($row4['total'] >= 5 && $row4['total'] <= 9){
                                                 echo "<p class='nk-yellow'>L</p>";
                                                }else{
                                                 echo "<p class='nk-gray'>S</p>";
                                                }

                                       echo "</td></tr>";
                                            $count++;
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Sale Statistic area-->
    <!-- Start Footer area-->
    <div class="footer-copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="footer-copy-right">
                        <p>Copyright © 2019. All rights reserved. Template by <a href="https://colorlib.com">BongSanch</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer area-->

<script src="js/jquery3.3.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $("#map_date2").change(function(){
            $("#sbtn_map").click();
        });
    });
</script>



<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA5R6JEIiERVxCgYhl9gsGZ8GOUvnifjO4" type="text/javascript"></script>
<script type="text/javascript">
var geocoder = new google.maps.Geocoder();


 

    function load() {
      var minZoomLevel = 13;
  
     var map = new google.maps.Map(document.getElementById('map'),{
      zoom: minZoomLevel,
      maxZoom: 28,
      center: new google.maps.LatLng(13.197281, 123.601912),
      mapTypeIds: [ 'hybrid','styled_map']
      });
    
    
    
 google.maps.event.addListener(map, 'zoom_changed', function () {
     if (map.getZoom() < minZoomLevel) map.setZoom(minZoomLevel);
 });
 
      <?php
echo "
var PolyBarangays = [";

$sql = mysqli_query($conn, "SELECT * FROM barangay");
$rows_two = mysqli_num_rows($sql);
$count = 0;
while($row = mysqli_fetch_array($sql)){
$count++;
$id = $row['b_id'];
$br = $row['brgy'];

$sql3 = mysqli_query($conn, "SELECT *, COUNT(barangay) as legend FROM `record_incident`, `barangay` WHERE `barangay`.`brgy` = '".$br."' AND record_incident.`municipality` = barangay.`municipality` AND record_incident.`barangay` = barangay.`brgy`  AND  (`record_incident`.`date_incident` BETWEEN '".$date_map_from."' AND '".$date_map_to."') GROUP BY record_incident.`municipality`");
$row3 = mysqli_fetch_array($sql3);
$legend = $row3['legend'];
$id2 = $row3['b_id'];

if($legend >= 15 && $id == $id2){
  $color = 'red';
}elseif($legend >= 10 && $legend <= 14 && $id == $id2){
  $color = 'orange';
}elseif($legend >= 5 && $legend <= 9 && $id == $id2){
  $color = 'yellow';
}else{
  $color = 'grey';
}

echo "  [
[";
$sql2 = mysqli_query($conn, "SELECT * FROM barangay_coor WHERE bar_id = '".$id."' ORDER BY bc_id ASC");
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
?>

for (var i = 0; i < PolyBarangays.length; i++) {
    var bounds = new google.maps.LatLngBounds();

    var poly = new google.maps.Polygon({
      fillColor: PolyBarangays[i][1].color,
      strokeColor: PolyBarangays[i][1].color,
      fillOpacity: 0.5,
      strokeOpacity: 1,
      strokeWeight: 2,
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

          infowindow.setContent(content);
        
          infowindow.setPosition(this.center);
  
          infowindow.open(map);
        }
      })(PolyBarangays[i][1].brgy));
    
   } 


      var infoWindow = new google.maps.InfoWindow;

      // Change this depending on the name of your PHP file
        downloadUrl("xmlroad_accident.php", function(data) { 
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName("marker");
        for (var i = 0; i < markers.length; i++) {
          var municipality = markers[i].getAttribute("municipality");
          var barangay = markers[i].getAttribute("barangay");
          var total_accident = markers[i].getAttribute("taccident");
          var point = new google.maps.LatLng(
              parseFloat(markers[i].getAttribute("lat")),
              parseFloat(markers[i].getAttribute("lng")));
          var html = "municipality: <b>" + municipality + "</b> <br/>Barangay:" + barangay  + "<br/> Total Accident:" + total_accident  + "<br/><p><a href='kasdjf.php'>View The Information</a></p>"; 
          var marker = new google.maps.Marker({
            map: map,
            position: point, 
            icon: 'http://maps.google.com/mapfiles/kml/pal4/icon15.png'
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

    //]]>
    
   

  </script>


    <!-- jquery
		============================================ -->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="js/jquery-price-slider.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/meanmenu/jquery.meanmenu.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src="js/counterup/jquery.counterup.min.js"></script>
    <script src="js/counterup/waypoints.min.js"></script>
    <script src="js/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- jvectormap JS
		============================================ -->
    <script src="js/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="js/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="js/jvectormap/jvectormap-active.js"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/sparkline-active.js"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="js/flot/jquery.flot.js"></script>
    <script src="js/flot/jquery.flot.resize.js"></script>
    <script src="js/flot/curvedLines.js"></script>
    <script src="js/flot/flot-active.js"></script>
    <!-- knob JS
		============================================ -->
    <script src="js/knob/jquery.knob.js"></script>
    <script src="js/knob/jquery.appear.js"></script>
    <script src="js/knob/knob-active.js"></script>
    <!--  wave JS
		============================================ -->
    <script src="js/wave/waves.min.js"></script>
    <script src="js/wave/wave-active.js"></script>
    <!--  todo JS
		============================================ -->
    <script src="js/todo/jquery.todo.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
	<!--  Chat JS
		============================================ -->
    <script src="js/chat/moment.min.js"></script>
    <script src="js/chat/jquery.chat.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
</body>

</html>