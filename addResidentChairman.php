<?php
	session_start();
	error_reporting(E_ALL & ~E_NOTICE);
	
	include("Model/Barangay.php");
	include("Model/Resident.php");
	include("Controller/BarangayController.php");
	include("Controller/ResidentController.php");
	$barCon = new BarangayController();
	$data = $barCon->showBarangay();
	

	if($_POST['submit'])
	{
	$res = new Resident();
	$resCon = new ResidentController();
	$res -> setfullname($_POST['fname']);
	$res -> setaddress($_POST['address']);
	$res -> setbrgy_id($_POST['barangay']);	
	$resCon->addResidentChairperson($res);		
	}
?>
<!doctype html>
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Legazpi Damage Assessment - Add Resident</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.php"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li class="menu-title">Accounts</li><!-- /.menu-title -->
                     <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Brgy Chairperson</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="addResidentChairman.php">Add Brgy Chairperson</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href="brgychairmaninfo.php">View Chairperson Accnt</a></li>
                        </ul>
                    </li>
					 <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>APSEMO</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="addAPSEMO.php">Add APSEMO info</a></li>
                            <li><i class="fa fa-table"></i><a href="apsemoinfo.php">View APSEMO Accnt</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Accounts</a>
                        <ul class="sub-menu children dropdown-menu">
							<li><i class="fa fa-table"></i><a href="AddAccountChairman.php">Create Chairman Account</a></li>
                            <li><i class="fa fa-table"></i><a href="allaccount.php">View All Accounts</a></li>
                        </ul>
                    </li>
					
					

                   <li class="menu-title">Typhoon</li><!-- /.menu-title -->
					 <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-area-chart"></i>Typhoon Info</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-map-o"></i><a href="maps-gmap.php">Add Typhoon info</a></li>
							 <li><i class="menu-icon fa fa-map-o"></i><a href="maps-gmap.php">View Typhoon List</a></li>
                                                    </ul>
                    </li>
					
					<li class="menu-title">Map Locator</li><!-- /.menu-title -->
					 <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-area-chart"></i>Damage Map</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-map-o"></i><a href="maps-gmap.php">Damage Cost Maps</a></li>
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
                    <a class="navbar-brand" href="./"><img src="images/logoindex.png" alt="Logo"></a>
                    <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Welcome Admin <?php echo $username; ?>&nbsp;
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
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="index.php">Dashboard</a></li>
                                    <li class="active">Add Resident-Chairperson</li>
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
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                Add <strong>Resident-Chairperson</strong> Information
                            </div>
                            <div class="card-body card-block">
                                <form action="addResidentChairman.php" method="POST" class="form-horizontal">
                                    
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Full Name</label></div>
                                        <div class="col-12 col-md-9">
										<input type="text" id="text-input" name="fname" placeholder="Enter Fullname" class="form-control" required=required></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="email-input" class=" form-control-label">Purok /Street</label></div>
                                        <div class="col-12 col-md-9">
										<input type="text" id="address" name="address" placeholder="Enter Address" class="form-control" required=required></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="select" class=" form-control-label">Barangay</label></div>
                                        <div class="col-12 col-md-9">
										<select id="form-field-1" placeholder="Barangay" class="form-control" name="barangay" required=required >
												<option value="" >Select Barangay</option>
												<?php for($ctr=0;$ctr<$data['count'];$ctr++)
													{
														$b_id = $data['b_id'][$ctr];
														$br_id = $data['br_id'][$ctr];
														$brgy = $data['brgy'][$ctr];
														echo "<option value=".$b_id.">Brgy. ".$br_id." - ".$brgy."</option>";

													}

											
											?>
											</select>
                                        </div>
                                    </div>
									<div class="row form-group">
                                        <div class="col col-md-3"><label for="date_added" class=" form-control-label">Added by</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="addedby" name="addedby" placeholder="" class="form-control" value="<?php echo $_SESSION['username']; ?>" disabled></div>
                                    </div>	
									<div class="row form-group">
                                        <div class="col col-md-3"><label for="date_added" class=" form-control-label">Date Added</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="email-input" name="email-input" placeholder="Enter Address" class="form-control" value="<?php echo date("Y-M-d"); ?>" disabled></div>
                                    </div>		
                                    
                            </div>
                            <div class="card-footer">
                                <input type="submit" class="btn btn-primary btn-sm" value="submit" name="submit">
                                <button type="reset" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban"></i> Reset
                                </button>
                            </div>
							</form>
                        </div>
                        
                    </div>

                    
                </div>
     
            </div>

        </div><!-- .animated -->
    </div><!-- .content -->



<!-- Right Panel -->

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="assets/js/main.js"></script>


</body>
</html>
