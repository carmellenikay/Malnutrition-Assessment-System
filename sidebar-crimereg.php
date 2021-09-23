<?php
    session_start();
    include("../server/connection.php");
            if(isset($_SESSION['account_id'])){
                $account_id=$_SESSION['account_id'];
                $query=mysqli_query($con,"SELECT * FROM accounts WHERE account_id = '{$account_id}'");
            if(mysqli_num_rows($query)){
              $row=mysqli_fetch_array($query);
            }
            } else {
             header('location:../homepage.php');
            }
?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <script>
            $(document).ready(function(){
            var $cat = $('select[name=category]'),
                $items = $('select[name=items]');
                $cat.change(function(){
                    var $this = $(this).find(':selected'),
                    rel = $this.attr('rel'),
                    $set = $items.find('option.' + rel);
                
                    if ($set.size() < 0) {
                    $items.hide();
                    return;
                    }
                    $items.show().find('option').hide();
                    $set.show().first().prop('selected', true);
                });
            });
        </script>

        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>ACRGM | ALBAY CRIME REPORT WITH GIS MAPPING</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- favicon
        ============================================ -->
        <link rel="shortcut icon" type="image/x-icon" href="../img/ppologo.ico">
        <!-- Google Fonts
        ============================================ -->
        <link href="../https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
        <!-- Bootstrap CSS
        ============================================ -->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <!-- Bootstrap CSS
        ============================================ -->
        <link rel="stylesheet" href="../css/font-awesome.min.css">
        <!-- owl.carousel CSS
        ============================================ -->
        <link rel="stylesheet" href="../css/owl.carousel.css">
        <link rel="stylesheet" href="../css/owl.theme.css">
        <link rel="stylesheet" href="../css/owl.transitions.css">
        <!-- animate CSS
        ============================================ -->
        <link rel="stylesheet" href="../css/animate.css">
        <!-- normalize CSS
        ============================================ -->
        <link rel="stylesheet" href="../css/normalize.css">
        <!-- meanmenu icon CSS
        ============================================ -->
        <link rel="stylesheet" href="../css/meanmenu.min.css">
        <!-- main CSS
        ============================================ -->
        <link rel="stylesheet" href="../css/main.css">
        <!-- educate icon CSS
        ============================================ -->
        <link rel="stylesheet" href="../css/educate-custon-icon.css">
        <!-- morrisjs CSS
        ============================================ -->
        <link rel="stylesheet" href="../css/morrisjs/morris.css">
        <!-- mCustomScrollbar CSS
        ============================================ -->
        <link rel="stylesheet" href="../css/scrollbar/jquery.mCustomScrollbar.min.css">
        <!-- metisMenu CSS
        ============================================ -->
        <link rel="stylesheet" href="../css/metisMenu/metisMenu.min.css">
        <link rel="stylesheet" href="../css/metisMenu/metisMenu-vertical.css">
        <!-- calendar CSS
        ============================================ -->
        <link rel="stylesheet" href="../css/calendar/fullcalendar.min.css">
        <link rel="stylesheet" href="../css/calendar/fullcalendar.print.min.css">
        <!-- style CSS
        ============================================ -->
        <link rel="stylesheet" href="../style.css">
        <!-- responsive CSS
        ============================================ -->
        <link rel="stylesheet" href="../css/responsive.css">
        <!-- modernizr JS
        ============================================ -->
        <script src="../js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body onLoad="initMap()">
        <!-- Start Left menu area -->
        <div class="left-sidebar-pro">
            <nav id="sidebar" class="">
                <div class="sidebar-header">
                    <a href="index.html"><img class="main-logo" src="../img/logo/logo.png" alt="" /></a>
                    <strong><a href="index.html"><img src="../img/logo/logosn.png" alt="" /></a></strong>
                </div>
                <div class="left-custom-menu-adp-wrap comment-scrollbar">
                    <nav class="sidebar-nav left-sidebar-menu-pro">
                        <ul class="metismenu" id="menu1">
                            <li class="active">
                                <a class="has-arrow" href="#">
                                    <span class="educate-icon educate-home icon-wrap"></span>
                                    <span class="mini-click-non">Home</span>
                                </a>
                                <ul class="submenu-angle" aria-expanded="true">
                                    <li><a title="My Profile" href="#"><span class="mini-sub-pro">My Profile</span></a></li>
                                    <li><a title="Change Password" href="admin-upd-pass.php"><span class="mini-sub-pro">Change Password</span></a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="has-arrow" href="#" aria-expanded="false"><span class="educate-icon educate-professor icon-wrap"></span> <span class="mini-click-non">Blotter Report</span></a>
                                <ul class="submenu-angle" aria-expanded="false">
                                    <li><a title="All Blotter Report" href="listblotter-form.php"><span class="mini-sub-pro">List of Blotter Reports</span></a></li>
                                    <li><a title="Add Blotter Report" href="blotter-report-form.php"><span class="mini-sub-pro">Add Blotter Report</span></a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="has-arrow" href="#" aria-expanded="false"><span class="educate-icon educate-course icon-wrap"></span> <span class="mini-click-non">Crime Map</span></a>
                                <ul class="submenu-angle" aria-expanded="false">
                                    <li><a title="View Crime Map" href="#"><span class="mini-sub-pro">View Crime Map</span></a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="has-arrow" href="#" aria-expanded="false"><span class="educate-icon educate-charts icon-wrap"></span> <span class="mini-click-non">Charts</span></a>
                                <ul class="submenu-angle chart-mini-nb-dp" aria-expanded="false">
                                    <li><a title="Bar Charts" href="#"><span class="mini-sub-pro">Bar Charts</span></a></li>
                                    <li><a title="Line Charts" href="#"><span class="mini-sub-pro">Line Charts</span></a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </nav>
        </div>
        <!-- End Left menu area -->
        <!-- Start Welcome area -->
        <div class="all-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="logo-pro">
                            <a href="#"><img class="main-logo" src="../img/logo/logo.png" alt="" /></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-advance-area">
                <div class="header-top-area">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="header-top-wraper">
                                    <div class="row">
                                        <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                            <div class="menu-switcher-pro">
                                                <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                                <i class="educate-icon educate-nav"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                            <div class="header-top-menu tabl-d-n">
                                                <ul class="nav navbar-nav mai-top-nav">
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                            <div class="header-right-info">
                                                <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                    <li class="nav-item">
                                                        <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                        <?php
                                                            $account_id = $_SESSION['account_id'];
                                                            $sql = mysqli_query($con, "SELECT * FROM crime_registrars WHERE account_id = '$account_id'");
                                                            $acc = mysqli_fetch_array($sql);
                                                            echo "<img src='../img/".$acc['image']."' alt='...' class='img-circle profile_img' />";
                                                        ?> 
                                                            <span class="admin-name"><?php echo $acc['fullname']?></span>
                                                            <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                                        </a>
                                                        <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                            <li><a href="#"><span class="edu-icon edu-user-rounded author-log-ic"></span>My Profile</a>
                                                            </li>
                                                            <li><a href="admin-upd-pass.php"><span class="edu-icon edu-home-admin author-log-ic"></span>Change Password</a>
                                                            </li>
                                                            <li><a href="../server/loginfunction.php?account_id=<?php echo $account_id;?>"><span class="edu-icon edu-locked author-log-ic"></span>Log Out</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="mobile-menu-nav">
                                        <li><a data-toggle="collapse" data-target="#Pagemob" href="#">Pages <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="Pagemob" class="collapse dropdown-header-top">
                                                <li><a href="login.html">Login</a></li>
                                                <li><a href="register.html">Register</a></li>
                                                <li><a href="lock.html">Lock</a></li>
                                                <li><a href="password-recovery.html">Password Recovery</a></li>
                                                <li><a href="404.html">404 Page</a></li>
                                                <li><a href="500.html">500 Page</a></li>
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
            