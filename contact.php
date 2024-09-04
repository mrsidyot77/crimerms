<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $con = mysqli_connect("localhost", "root", "") or die(mysqli_error($con));
    mysqli_select_db($con, "crimedb") or die(mysqli_error($con));
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["phone"];
    $message = $_POST["message"];
    $sql = "INSERT INTO `tblcontact` (`name`, `email`, `phone`, `message`, `sub_time`) VALUES ('$name', '$email', '$subject', '$message', current_timestamp())";
    $result = mysqli_query($con, $sql);
    if ($result) {


        echo "<script>alert('Your message has been sent Scuccessfully');</script>";




    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>BCA Crime Record Management System | Contact US</title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Custom Theme files -->
    <!--theme-style-->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!--//theme-style-->

    <script
        type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
</head>

<body>
    <div class="header" style="height: 480px;" class="header">

    </div>
    <?php include_once ('includes/header.php'); ?>

    <!--content-->
    <div class="row gy-4 mt-1">
        <div class="content">
            <div class="container">


                <div class="content-welcome">

                    <div class="panel-body center">

                        <div class="col-lg-5">
                            <div class="panel-title-sign mt-xl text-right">

                                <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i>
                                    Contact
                                    US</h2>
                            </div>
                            <form method="post">
                                <div class="form-group mb-md">
                                    <label>Full Name</label>
                                    <input id="fname" type="text" class="form-control input-md" placeholder="Full Name"
                                        name="name" required="true">
                                </div>

                                <div class="form-group mb-md">
                                    <label>E-mail Address</label>
                                    <input id="email" type="email" class="form-control input-md" placeholder="Email"
                                        name="email" required="true" onBlur="return checkAvailability()">
                                    <span id="user-availability-status"></span>
                                </div>

                                <div class="form-group mb-md">
                                    <label>Mobile Number</label>
                                    <input id="mobno" type="text" class="form-control input-md" placeholder="Mobile"
                                        name="phone" maxlength="10" pattern="[0-9]+" required="true">
                                </div>


                                <div class="form-group mb-md">
                                    <label>Message</label>
                                    <textarea id="message" row="4" class="form-control input-md"
                                        placeholder="Leave your message here" name="message" required="true"></textarea>

                                </div>




                                <div class="row">

                                    <div class="col-sm-4 text-left">
                                        <button type="submit" class="btn btn-primary hidden-xs" id="submit"
                                            name="submit">Submit</button>

                                    </div>

                                </div>




                            </form>
                        </div>

                    </div>

                </div>

                <div class="clearfix"> </div>

            </div>
            <!---->

            <!---->
        </div>
    </div>

    <!--footer-->
    <?php include_once ('includes/footer.php'); ?>
    <!--//footer-->
</body>

</html>