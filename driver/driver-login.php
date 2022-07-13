<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (isset($_POST['login'])) {
    $phone = $_POST['phone_no'];
    $password = ($_POST['password']);
    $sql = "SELECT id FROM driver WHERE phone_no=:phone_no and password=:password";
    $query = $dbh->prepare($sql);
    $query->bindParam(':phone_no', $phone, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    if ($query->rowCount() > 0) {
        foreach ($results as $result) {
            $_SESSION['rsmsid'] = $result->id;
        }
        $_SESSION['login'] = $_POST['phone_no'];
        echo "<script type='text/javascript'> document.location ='driver-dashboard.php'; </script>";
    } else {
        echo "<script>alert('Invalid Details');</script>";
    }
}

?>
<!DOCTYPE html>
<html>

<head>

    <title>DRIVER | Login Page</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/main-style.css" rel="stylesheet" />

</head>

<body class="body-Login-back">
<div class="banner">
		<div class="container">
			<div class="button-85 "><br>
				<h2 style="color:#fff;text-transform: uppercase;"><center>Relocation and shifting Management System</h2>
				<BR><BR>
				
			</div>
		</div>
	</div>
    <div class="container">

        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center logo-margin ">
                <strong style="color: white;font-size: 50px">RSMS Driver</strong>
            </div>
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel ">
                    <div class="panel-heading">
                        <center><h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" name="login">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Phone Number" name="phone_no" required="true"  maxlength="10" pattern="[0-9]+">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" name="password" required="true">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <a href="../index.php">Back Home!!</a>
                                    </label>

                                    <label style="padding-left: 95px">
                                        <a href="forgot-password.php">Forgot Password?</a></label>
                                </div>

                                <!-- Change this to a button or input when using this as a form -->
                                <center><button type="submit" value="Login" name="login" class="button-85 " role="button">Login</button>

                                <!-- <input type="submit" value="Login" class="btn btn-lg btn-success btn-block" name="login"> -->
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>

</body>

</html>