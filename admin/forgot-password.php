<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['submit']))
  {
    $email=$_POST['email'];
$mobile=$_POST['mobile'];
$newpassword=md5($_POST['newpassword']);
  $sql ="SELECT Email FROM tbladmin WHERE Email=:email and MobileNumber=:mobile";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
$con="update tbladmin set Password=:newpassword where Email=:email and MobileNumber=:mobile";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':email', $email, PDO::PARAM_STR);
$chngpwd1-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();
echo "<script>alert('Your Password succesfully changed');</script>";
}
else {
echo "<script>alert('Email id or Mobile no is invalid');</script>"; 
}
}

?>
<!doctype html>
<html class="fixed">
	<head>
<title>Forgot Password | Crime Record Management System</title>
		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="../assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="../assets/vendor/bootstrap-datepicker/css/datepicker3.css" />
		<link rel="stylesheet" href="../assets/stylesheets/theme.css" />
		<link rel="stylesheet" href="../assets/stylesheets/skins/default.css" />
		<link rel="stylesheet" href="../assets/stylesheets/theme-custom.css">
		<script src="../assets/vendor/modernizr/modernizr.js"></script>
<script type="text/javascript">
function valid()
{
if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("New Password and Confirm Password Field do not match  !!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>
	</head>
	<body>
	<a href="../index.php" class="logo pull-left"><h2 style="padding-top: 30px;padding-left: 30px;color: blue"><i class="fa fa-home"></i></h2></a>
		<section class="body-sign">
			<div class="center-sign">
				<a href="sigin.php" class="logo pull-left">
					<strong style="font-size: 18px">Crime Record Management System</strong>
				</a><hr />

				<div class="panel panel-sign">
					<div class="panel-title-sign mt-xl text-right">
						<h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Sign In</h2>
					</div>
					<div class="panel-body">
						<form method="post" name="chngpwd" onSubmit="return valid();">
							<div class="form-group mb-md">
								<label>Email</label>
								<div class="input-group input-group-icon">
									<input type="email" class="form-control input-md" required="true" name="email">
									<span class="input-group-addon">
										<span class="icon icon-md">
											<i class="fa fa-envelope"></i>
										</span>
									</span>
								</div>
							</div>

							<div class="form-group mb-md">
								<div class="clearfix">
									<label class="pull-left">Mobile Number</label>
									
								</div>
								<div class="input-group input-group-icon">
									
									<input type="text" class="form-control input-md"  name="mobile" required="true" maxlength="10" pattern="[0-9]+">
									<span class="input-group-addon">
										<span class="icon icon-md">
											<i class="fa fa-phone"></i>
										</span>
									</span>
								</div>
							</div>
							<div class="form-group mb-md">
								<label>New Password</label>
								<div class="input-group input-group-icon">
									<input class="form-control input-md" type="password" name="newpassword" required="true"/>
									<span class="input-group-addon">
										<span class="icon icon-md">
											<i class="fa fa-lock"></i>
										</span>
									</span>
								</div>
							</div>
							<div class="form-group mb-md">
								<label>Confirm Password</label>
								<div class="input-group input-group-icon">
									<input class="form-control input-md" type="password" name="confirmpassword" required="true"/>
									<span class="input-group-addon">
										<span class="icon icon-md">
											<i class="fa fa-lock"></i>
										</span>
									</span>

								</div>
							</div>

							<div class="row">
								
								<div class="col-sm-8 text-left">
									<button type="submit" class="btn btn-primary hidden-xs" name="submit">Reset</button>
									
								</div>
								<a href="signin.php" class="pull-right" style="font-size:15px">Signin</a>
							</div>
							

						</form>
					</div>
				</div>
			</div>
		</section>
		<!-- end: page -->

		<!-- Vendor -->
		<script src="../assets/vendor/jquery/jquery.js"></script>
		<script src="../assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="../assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="../assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="../assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="../assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="../assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		<script src="../assets/javascripts/theme.js"></script>
		<script src="../assets/javascripts/theme.custom.js"></script>
		<script src="../assets/javascripts/theme.init.js"></script>
	</body>
</html>