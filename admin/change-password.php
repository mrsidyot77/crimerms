<?php
session_start();
error_reporting(0);
include ('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['crmsaid'] == 0)) {
	header('location:logout.php');
} else {
	if (isset($_POST['submit'])) {
		$adminid = $_SESSION['crmsaid'];
		$cpassword = md5($_POST['currentpassword']);
		$newpassword = md5($_POST['newpassword']);
		$sql = "SELECT ID FROM tbladmin WHERE ID=:adminid and Password=:cpassword";
		$query = $dbh->prepare($sql);
		$query->bindParam(':adminid', $adminid, PDO::PARAM_STR);
		$query->bindParam(':cpassword', $cpassword, PDO::PARAM_STR);
		$query->execute();
		$results = $query->fetchAll(PDO::FETCH_OBJ);

		if ($query->rowCount() > 0) {
			$con = "update tbladmin set Password=:newpassword where ID=:adminid";
			$chngpwd1 = $dbh->prepare($con);
			$chngpwd1->bindParam(':adminid', $adminid, PDO::PARAM_STR);
			$chngpwd1->bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
			$chngpwd1->execute();

			echo '<script>alert("Your password successully changed")</script>';
		} else {
			echo '<script>alert("Your current password is wrong")</script>';

		}
	}
	?>
	<!doctype html>
	<html class="fixed">

	<head>
		<title>Crime Record Management System | Change Password</title>
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light"
			rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="../assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="../assets/vendor/bootstrap-datepicker/css/datepicker3.css" />
		<link rel="stylesheet" href="../assets/stylesheets/theme.css" />
		<link rel="stylesheet" href="../assets/stylesheets/skins/default.css" />
		<link rel="stylesheet" href="../assets/stylesheets/theme-custom.css">
		<script src="../assets/vendor/modernizr/modernizr.js"></script>
		<script type="text/javascript">
			function checkpass() {
				if (document.changepassword.newpassword.value != document.changepassword.confirmpassword.value) {
					alert('New Password and Confirm Password field does not match');
					document.changepassword.confirmpassword.focus();
					return false;
				}
				return true;
			}

		</script>
	</head>

	<body>
		<section class="body">

			<!-- start: header -->
			<?php include_once ('includes/header.php'); ?>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<?php include_once ('includes/sidebar.php'); ?>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Change Password</h2>

						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="dashboard.php">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Change Password</span></li>

							</ol>

							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->

					<div class="row">
						<div class="col-md-12">
							<form class="form-horizontal" method="post" onsubmit="return checkpass();"
								name="changepassword">

								<section class="panel">
									<header class="panel-heading">

										<h2 class="panel-title">Change Password</h2>

									</header>
									<div class="panel-body">
										<div class="validation-message">
											<ul></ul>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Current Password <span
													class="required">*</span></label>
											<div class="col-sm-9">
												<input type="password" class="form-control" name="currentpassword"
													id="currentpassword" required='true'>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">New Password <span
													class="required">*</span></label>
											<div class="col-sm-9">

												<input class="form-control" class="form-control" value="" type="password"
													id="password" name="newpassword"
													pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
													title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
													required>
												<div id="message">
													<h3>Password must contain the following:</h3>
													<p id="letter" class="invalid">A <b>lowercase</b> letter</p>
													<p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
													<p id="number" class="invalid">A <b>number</b></p>
													<p id="length" class="invalid">Minimum <b>8 characters</b></p>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Confirm Password<span
													class="required">*</span></label>
											<div class="col-sm-9">
												<input type="password" class="form-control" name="confirmpassword"
													id="confirmpassword" required='true'>
											</div>
										</div>
									</div>
									<footer class="panel-footer">
										<div class="row">
											<div class="col-sm-9 col-sm-offset-3">
												<button class="btn btn-sm btn-primary login-submit-cs" type="submit"
													name="submit">Update</button>

											</div>
										</div>
									</footer>
								</section>
							</form>
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
		<script src="../assets/vendor/jquery-validation/jquery.validate.js"></script>
		<script src="../assets/javascripts/theme.js"></script>
		<script src="../assets/javascripts/theme.custom.js"></script>
		<script src="../assets/javascripts/theme.init.js"></script>
		<script src="../assets/javascripts/forms/examples.validation.js"></script>
	</body>

	</html>
<?php } ?>