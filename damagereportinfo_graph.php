<?php
	error_reporting(E_ALL & ~E_NOTICE);
	include("Controller/DamageReportController.php");
	include("Controller/BarangayController.php");
	include("Controller/ResidentController.php");
	include("Model/Damage_report.php");
	
	$drCon = new DamageReportController();
	$barCon = new BarangayController();
	$resCon = new ResidentController();
	$data1 = $barCon->ShowBarangaycount();
	$data2 = $drCon->ShowDamageReportcount();
	$data3 = $resCon->ShowResidentCount();
	$datadamage = $drCon->damagereportpertyphoon();	
	$databrgy = $drCon->DamageReportBrgy();
	$dataYear = $drCon->showTyphoonYear();
	
	$dr = new Damage_report();
		
		$datatyphoon = $drCon->showTyphoon();

	if($_POST['check'])
	{
	$dr = new Damage_report();
	$dr->settpname($_POST['tpname']);
	$data = $drCon->DamageReportDT($dr);	
	}
?> 
<!doctype html>
<html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Damage Report -LDAS</title>
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
    <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
			<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script type="text/javascript">
$(function () {
    var chart;
    $(document).ready(function() {
    
        var colors = Highcharts.getOptions().colors,
            categories = [
			<?php for($ctr=0;$ctr<$data['count'];$ctr++){
			echo "'";	
			echo $data['brgy'][$ctr];
			echo "',";
			}
			?>
			],
            name = 'Barangay',
            data = [
			
			<?php 
			for($ctr=0;$ctr<$data['count'];$ctr++){
				
                    echo "{ y: ".$data['damagecost'][$ctr].",
                    color: colors[".$ctr."],
                    drilldown: {
                        name: '".$data['brgy'][$ctr]."',
                        categories: [";
						$dr->setbrgy($data['brgy'][$ctr]);
						$datab = $drCon->DamageReportG($dr);	
	
					for($ctr1=0;$ctr1<$datab['count'];$ctr1++){
							echo "'";	
							echo $datab['damage_type'][$ctr1];
							echo "',";
						} 
				//echo "	'MSIE 6.0', 'MSIE 7.0', 'MSIE 8.0', 'MSIE 9.0'";
						
						
					echo "	],
                        data: [";
					for($ctr2=0;$ctr2<$datab['count'];$ctr2++){
							//echo "'";	
							echo $datab['damagecost'][$ctr2];
							echo ",";
						} 
						
						//10.85, 7.35, 33.06, 2.81
						
					echo "	],
                        color: colors[".$ctr."]
                    }
                },";
//				echo $damagecount=$data2['damagecount'][$ctr];
			} 
			?>
			
			
			];
    
        function setChart(name, categories, data, color) {
			chart.xAxis[0].setCategories(categories, false);
			chart.series[0].remove(false);
			chart.addSeries({
				name: name,
				data: data,
				color: color || 'white'
			}, false);
			chart.redraw();
        }
    
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container',
                type: 'column'
            },
            title: {
                text: 'Damage Assessment Graph per Barangay Grouped by Damage Type'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: categories
            },
            yAxis: {
                title: {
                    text: 'Total Damage Cost'
                }
            },
            plotOptions: {
                column: {
                    cursor: 'pointer',
                    point: {
                        events: {
                            click: function() {
                                var drilldown = this.drilldown;
                                if (drilldown) { // drill down
                                    setChart(drilldown.name, drilldown.categories, drilldown.data, drilldown.color);
                                } else { // restore
                                    setChart(name, categories, data);
                                }
                            }
                        }
                    },
                    dataLabels: {
                        enabled: true,
                        color: colors[0],
                        style: {
                            fontWeight: 'bold'
                        },
                        formatter: function() {
                            return 'Php '+this.y +'';
                        }
                    }
                }
            },
            tooltip: {
                formatter: function() {
                    var point = this.point,
                        s = this.x +':<b>'+ this.y +' Damage Cost</b><br/>';
                    if (point.drilldown) {
                        s += 'Click to view '+ point.category +' detailed Cost';
                    } else {
                        s += 'Click to return to General Cost';
                    }
                    return s;
                }
            },
            series: [{
                name: name,
                data: data,
                color: 'white'
            }],
            exporting: {
                enabled: false
            }
        });
    });
    
});
		</script>
</head>
<body>
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
							<li><i class="menu-icon fa fa-bar-chart"></i><a href="damagereportinfo_graph.php">Damage Graph per Damage Type</a></li>

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
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="maps-gmap.php">View Damage Assessment Map </a></li>
                                    <li class="active">Detailed Damage Cost Info</li>
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

                    <div class="col-md-12">
                        <div class="card">
						
                            <div class="card-header">
							Choose Typhoon 
						<form method="POST" action="damagereportinfo_graph.php"> 
						<select name="tpname">
						<option><?php echo $_POST['tpname']; ?></option>
						<?php
						for($ctr=0;$ctr<$datatyphoon['count'];$ctr++){
						$t_name=$datatyphoon['typhoon_name'][$ctr];
						echo "<option value=".$t_name.">".$t_name."</option>";
						} 						
						?>
						</select>
						<input type="submit" name="check" value="check">
						</form>
                                Damage Report Information for Typhoon <strong class="card-title">
								<?php if ($tpname==''){
								echo "no typhoon selected";
								}
								else{
									echo $_POST['tpname'];
								}
									?> 
									</strong>
								for the Year : <?php echo date('Y');?>
                            </div>
                            <script src="http://code.highcharts.com/highcharts.js"></script>
							<script src="http://code.highcharts.com/modules/exporting.js"></script>
							<div id="container" style="min-width: 800px; height: 400px; margin: 0 auto"></div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


        <div class="clearfix"></div>

        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright &copy; 2018-2019 APSMO Legazpi Damage Assessment
                    </div>
                    <div class="col-sm-6 text-right">
                        Designed by <a href="https://colorlib.com">Colorlib</a>
                    </div>
                </div>
            </div>
        </footer>

    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/init/datatables-init.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );
  </script>


</body>
</html>
