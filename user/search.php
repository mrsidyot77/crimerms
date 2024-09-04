<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['crmsuid']==0)) {
  header('location:logout.php');
  } else{
  	
?>
<!doctype html>
<html class="fixed">
	<head>

		<title>Crime Record Management System | Search FIR</title>
		
		<!-- Web Fonts  -->
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
						<h2>Search FIR </h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="dashboard.php">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Search</span></li>
								<li><span>FIR</span></li>
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
								<h3>Search <span class="table-project-n">FIR</span></h3>
								<form class="form-horizontal" method="post">
								<div class="form-group">
											<label class="col-sm-3 control-label">Search by FIR Number <span class="required">*</span></label>
											<div class="col-sm-9">
												<input type="text" class="form-control" name="searchdata" value="" required='true' placeholder="Enter FIR Number">
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
                                <thead style="color: red;font-size: 16px">
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Fir No.</th>
                                        <th class="d-none d-sm-table-cell">Name(s)</th>
                                        <th class="d-none d-sm-table-cell">Mobile Number</th>
                                        <th class="d-none d-sm-table-cell">Email</th>
                                        <th class="d-none d-sm-table-cell">FIR Date</th>
                                        <th class="d-none d-sm-table-cell">Status</th>
                                        <th class="d-none d-sm-table-cell" style="width: 15%;">Action</th>
                                       </tr>
                                </thead>
                                <tbody>
                                    <?php

$sql="SELECT tbluser.FullName,tbluser.MobileNumber,tbluser.Email,tblfir.FIRNo,tblfir.ID,tblfir.Status,tblfir.DateofFIR from tblfir join tbluser on tblfir.UserID=tbluser.ID where tblfir.FIRNo like '$sdata%'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                                    <tr style="font-size: 15px">
                                        <td class="text-center"><?php echo htmlentities($cnt);?></td>
                                        <td class="font-w600"><?php  echo htmlentities($row->FIRNo);?></td>
                                        <td class="font-w600"><?php  echo htmlentities($row->FullName);?></td>
                                        <td class="font-w600"><?php  echo htmlentities($row->MobileNumber);?></td>
                                        <td class="font-w600"><?php  echo htmlentities($row->Email);?></td>
                                        <td class="font-w600"><?php  echo htmlentities($row->DateofFIR);?> </td>
    <td>                             <?php if($row->Status==""){ ?>

<span class="btn btn-danger btn-xs"><?php echo "Not Updated Yet"; ?></span>
<?php } elseif($row->Status=="Cancelled") { ?>
<span class="btn btn-danger btn-xs">Cancelled/Rejected</span>
<?php } elseif($row->Status=="Approved") { ?>
<span class="btn btn-success btn-xs">Approved</span>
<?php } elseif($row->Status=="Charge Sheet Completed") { ?>
<span class="btn btn-warning btn-xs">Charge Sheet Completed</span>
<?php } ?></td>
                                         <td class="d-none d-sm-table-cell"><a href="fir-details.php?editid=<?php echo htmlentities ($row->ID);?>" class="btn btn-primary btn-sm">View Details</td>
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