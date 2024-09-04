<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['crmsaid']==0)) {
  header('location:logout.php');
  } else{



  ?>
<!doctype html>
<html class="fixed">
	<head>

		
		<title>Crime Record Mgmt System | Admin-Dashboard</title>
		
		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="../assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="../assets/vendor/bootstrap-datepicker/css/datepicker3.css" />
		<link rel="stylesheet" href="../assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
		<link rel="stylesheet" href="../assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
		<link rel="stylesheet" href="../assets/vendor/morris/morris.css" />
		<link rel="stylesheet" href="../assets/stylesheets/theme.css" />
		<link rel="stylesheet" href="../assets/stylesheets/skins/default.css" />
		<link rel="stylesheet" href="../assets/stylesheets/theme-custom.css">
		<script src="../assets/vendor/modernizr/modernizr.js"></script>

	</head>
	<body>
		<section class="body">

		<?php include_once('includes/header.php');?>
		

			<div class="inner-wrapper">
				<!-- start: sidebar -->
			<?php include_once('includes/sidebar.php');?>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Dashboard</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="dashboard.php">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Dashboard</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

						

					<!-- start: page -->
					<div class="row">
						
						<div class="col-md-6 col-lg-12 col-xl-6">
							<div class="row">
								<div class="col-md-12 col-lg-6 col-xl-6">
									<section class="panel panel-featured-left panel-featured-primary">
										<div class="panel-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-primary">
														<i class="fa fa-users"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Total Criminals</h4>
														<?php 
$sql4 ="SELECT ID from tblcriminal";
$query4 = $dbh -> prepare($sql4);
$query4->execute();
$results4=$query4->fetchAll(PDO::FETCH_OBJ);
$totalcrm=$query4->rowCount();
?>
														<div class="info">
															<strong class="amount"><?php echo htmlentities($totalcrm);?></strong>
														</div>
													</div>
													<div class="summary-footer">
														<a href="view-criminals.php">(view all)</a>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>
								<div class="col-md-12 col-lg-6 col-xl-6">
									<section class="panel panel-featured-left panel-featured-secondary">
										<div class="panel-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-secondary">
														<i class="fa fa-user"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Total Police</h4>
														<?php 
$sql5 ="SELECT ID from tblpolice";
$query5 = $dbh -> prepare($sql5);
$query5->execute();
$results5=$query5->fetchAll(PDO::FETCH_OBJ);
$totpol=$query5->rowCount();
?>
														<div class="info">
															<strong class="amount"><?php echo htmlentities($totpol);?></strong>
														</div>
													</div>
													<div class="summary-footer">
														<a href="manage-police.php">(View All)</a>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>
								<div class="col-md-12 col-lg-6 col-xl-6">
									<section class="panel panel-featured-left panel-featured-tertiary">
										<div class="panel-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-tertiary">
														<i class="fa fa-file"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Total Crime Categories</h4>

														<?php 
$sql6 ="SELECT ID from tblcategory";
$query6 = $dbh -> prepare($sql6);
$query6->execute();
$results6=$query6->fetchAll(PDO::FETCH_OBJ);
$totcat=$query6->rowCount();
?>
														<div class="info">
															<strong class="amount"><?php echo htmlentities($totcat);?></strong>
														</div>
													</div>
													<div class="summary-footer">
														<a href="manage-category.php">(View All)</a>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>
														<?php 
$sql7 ="SELECT ID from tblpolicestation";
$query7 = $dbh -> prepare($sql7);
$query7->execute();
$results7=$query7->fetchAll(PDO::FETCH_OBJ);
$totalps=$query7->rowCount();
?>

								<div class="col-md-12 col-lg-6 col-xl-6">
									<section class="panel panel-featured-left panel-featured-quartenary">
										<div class="panel-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-quartenary">
														<i class="fa fa-building"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Total Police Stations</h4>
														<div class="info">
															<strong class="amount"><?php echo htmlentities($totalps);?></strong>
														</div>
													</div>
													<div class="summary-footer">
														<a href="manage-police-stations.php">(view all)</a>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>


				<div class="col-md-12 col-lg-6 col-xl-6">
									<section class="panel panel-featured-left panel-featured-tertiary">
										<div class="panel-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-quartenary">
														<i class="fa fa-file"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Total FIRS</h4>

														<?php 
$sql8 ="SELECT ID from tblfir";
$query8 = $dbh -> prepare($sql8);
$query8->execute();
$results8=$query8->fetchAll(PDO::FETCH_OBJ);
$totfirs=$query8->rowCount();
?>
														<div class="info">
															<strong class="amount"><?php echo htmlentities($totfirs);?></strong>
														</div>
													</div>
													<div class="summary-footer">
														<a href="view-fir.php">(View All)</a>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>







							</div>
						</div>
					</div>

					<!-- end: page -->
				</section>
			</div>

		</section>

		<!-- Vendor -->
		<script src="../assets/vendor/jquery/jquery.js"></script>
		<script src="../assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="../assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="../assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="../assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="../assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="../assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		<script src="../assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
		<script src="../assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>
		<script src="../assets/vendor/jquery-appear/jquery.appear.js"></script>
		<script src="../assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
		<script src="../assets/vendor/jquery-easypiechart/jquery.easypiechart.js"></script>
		<script src="../assets/vendor/flot/jquery.flot.js"></script>
		<script src="../assets/vendor/flot-tooltip/jquery.flot.tooltip.js"></script>
		<script src="../assets/vendor/flot/jquery.flot.pie.js"></script>
		<script src="../assets/vendor/flot/jquery.flot.categories.js"></script>
		<script src="../assets/vendor/flot/jquery.flot.resize.js"></script>
		<script src="../assets/vendor/jquery-sparkline/jquery.sparkline.js"></script>
		<script src="../assets/vendor/raphael/raphael.js"></script>
		<script src="../assets/vendor/morris/morris.js"></script>
		<script src="../assets/vendor/gauge/gauge.js"></script>
		<script src="../assets/vendor/snap-svg/snap.svg.js"></script>
		<script src="../assets/vendor/liquid-meter/liquid.meter.js"></script>
		<script src="../assets/javascripts/theme.js"></script>
		<script src="../assets/javascripts/theme.custom.js"></script>
		<script src="../assets/javascripts/theme.init.js"></script>
		<script src="../assets/javascripts/dashboard/examples.dashboard.js"></script>
	</body>
</html><?php }  ?>