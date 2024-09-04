<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['crmspid']==0)) {
  header('location:logout.php');
  } else{
  	
?>
<!doctype html>
<html class="fixed">
	<head>

		<title>Crime Record Management System | Search Criminals</title>
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="../assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="../assets/vendor/bootstrap-datepicker/css/datepicker3.css" />
		<link rel="stylesheet" href="../assets/vendor/select2/select2.css" />
		<link rel="stylesheet" href="../assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />
		<link rel="stylesheet" href="../assets/stylesheets/theme.css" />
		<link rel="stylesheet" href="../assets/stylesheets/skins/default.css" />
		<link rel="stylesheet" href="../assets/stylesheets/theme-custom.css">
		<script src="../assets/vendor/modernizr/modernizr.js"></script>

	</head>
	<body>
		<section class="body">

			<!-- start: header -->
			<?php include_once('includes/header.php');?>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<?php include_once('includes/sidebar.php');?>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Search Criminals</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="dashboard.php">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Search</span></li>
								<li><span>Criminals</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
						<section class="panel">
							<header class="panel-heading">
								<div class="panel-actions">
									<a href="#" class="fa fa-caret-down"></a>
									<a href="#" class="fa fa-times"></a>
								</div>
								<h3>Search <span class="table-project-n">Criminals</span></h3>
								<form class="form-horizontal" method="post">
								<div class="form-group">
											<label class="col-sm-3 control-label">Search by Criminals ID / Name<span class="required">*</span></label>
											<div class="col-sm-9">
												<input type="text" class="form-control" name="searchdata" value="" required='true' placeholder="Enter Criminal ID / Name">
											</div>
										</div>
										
										<div class="row">
											<div class="col-sm-9 col-sm-offset-3">
												<button class="btn btn-sm btn-primary login-submit-cs" type="submit" name="search">Submit</button>
											
											</div>
										</div>
									
						</form>
								
							</header>
							<div class="panel-body">
							 <?php
if(isset($_POST['search']))
{ 

$sdata=$_POST['searchdata'];
  ?>
  <h4 align="center">Result against "<?php echo $sdata;?>" keyword </h4>	
								 <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                                <thead style="font-size: 16px">
                                    <tr>
                                       <th>S.No</th>
											<th>Police Station</th>
											<th>Criminals ID</th>
											<th>Name(s)</th>
											<th>Mobile Number</th>
											<th>Actions</th>
                                       </tr>
                                </thead>
                                <tbody>
             <?php
$sql="SELECT * from tblcriminal where CriminalID like '$sdata%' or Name like '$sdata%'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                                    <tr style="font-size: 15px">
                                       	<td><?php echo htmlentities($cnt);?></td>
											<td><?php  echo htmlentities($row->PoliceStation);?>
											</td>
											<td><?php  echo htmlentities($row->CriminalID);?>
											</td>
											<td><?php  echo htmlentities($row->Name);?></td>
											<td>
												<?php  echo htmlentities($row->ContactNumber);?>
											</td>
											
											<td>
												<a href="view-search-criminal.php?editid=<?php echo htmlentities ($row->ID);?>" class="btn btn-primary btn-sm" target="_blank"> View Details</a>
											
											</td>
                                    </tr>
                                  
                                
                                
                                  
                                </tbody>
                                <?php 
$cnt=$cnt+1;
} } else { ?>
  <tr>
    <td colspan="8"> No record found against this search</td>

  </tr>
  <?php } }?>
                            </table>
							</div>
						</section>
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
		<script src="../assets/vendor/select2/select2.js"></script>
		<script src="../assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
		<script src="../assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
		<script src="../assets/javascripts/theme.js"></script>
		<script src="../assets/javascripts/theme.custom.js"></script>
		<script src="../assets/javascripts/theme.init.js"></script>
		<script src="../assets/javascripts/tables/examples.datatables.editable.js"></script>
	</body>
</html><?php }  ?>