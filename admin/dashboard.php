<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['rsmsid'] == 0)) {
    header('location:logout.php');
} else {

?>
    <!DOCTYPE html>
    <html>

    <head>

        <title>Relocation and shifting Management System | Dashboard</title>
        <!-- Core CSS - Include with every page -->
        <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="assets/css/style.css" rel="stylesheet" />
        <link href="assets/css/main-style.css" rel="stylesheet" />

        <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
        <script type="text/javascript">
            bkLib.onDomLoaded(nicEditors.allTextAreas);
        </script>

    </head>

    <body>
        <!--  wrapper -->
        <div id="wrapper">
            <!-- navbar top -->
            <?php include_once('includes/header.php'); ?>
            <!-- end navbar top -->

            <!-- navbar side -->
            <?php include_once('includes/sidebar.php'); ?>
            <!-- end navbar side -->
            <!--  page-wrapper -->
            <div id="page-wrapper">
                <div class="row">
                    <!-- page header -->
                    <div class="col-lg-12">
                        <h1 class="page-header">Dashboard</h1>
                    </div>
                    <!--end page header -->
                </div>

                <div class="row">
                    <!--quick info section -->
                    <div class="col-lg-3">

                        <div class="alert alert-info text-center">
                            <?php
                            $sql = "SELECT ID from services ";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            $totalserv = $query->rowCount();
                            ?><div class="panel-body red">
                                <i class="fa fa-calendar fa-3x"></i>&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo htmlentities($totalserv); ?> </b><a href="manage-services.php">Total Services</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">

                        <div class="alert alert-info text-center">
                            <?php
                            $sql = "SELECT ID from driver ";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            $totaldriver = $query->rowCount();
                            ?><div class="panel-body green">
                                <i class="fa fa-user fa-3x"></i>&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo htmlentities($totaldriver); ?> </b><a href="manage_drivers.php">Total Drivers </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">

                        <div class="alert alert-info text-center">
                            <?php
                            $sql = "SELECT ID from driver where status='free'";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            $freedrivers = $query->rowCount();
                            ?><div class="panel-body green">
                                <i class="fa fa-user fa-3x"></i>&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo htmlentities($freedrivers); ?> </b><a href="manage_drivers.php">Free Drivers </a>
                            </div>
                        </div>
                    </div>

                   

                    <div class="col-lg-3">

                        <div class="alert alert-info text-center">
                            <?php
                            $sql = "SELECT ID from queries where IsRead is null ";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            $totalunreadquery = $query->rowCount();
                            ?><div class="panel-body yellow">
                                <i class="fa  fa-beer fa-3x"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo htmlentities($totalunreadquery); ?></b><a href="unread-queries.php"> Total Unread Queries</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="alert alert-info text-center">
                            <?php
                            $sql = "SELECT ID from queries where IsRead='1' ";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            $totalreadquery = $query->rowCount();
                            ?><div class="panel-body green">
                                <i class="fa fa-pencil-square-o fa-3x"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo htmlentities($totalreadquery); ?></b> <a href="read-queries.php">Total Read Queries</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="alert alert-info text-center">
                            <?php
                            $sql = "SELECT ID from customer_bookings where Status is null ";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            $totalnewbooking = $query->rowCount();
                            ?><div class="panel-body yellow">
                                <i class="fa  fa-pencil fa-3x"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo htmlentities($totalnewbooking); ?></b><a href="new-booking.php"> Total New Booking</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="alert alert-info text-center">
                            <?php
                            $sql = "SELECT ID from customer_bookings where Status='1' ";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            $totaloldbooking = $query->rowCount();
                            ?><div class="panel-body green">
                                <i class="fa  fa-pencil fa-3x"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo htmlentities($totaloldbooking); ?></b><a href="approved-bookings.php"> Approved Bookings</a>
                            </div>
                        </div>
                    </div>
                    <!--end quick info section -->
                    <div class="col-lg-3">
                        <div class="alert alert-info text-center">
                            <?php
                            $sql = "SELECT ID from customer_bookings where Status='0' ";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            $cancelledbooking = $query->rowCount();
                            ?><div class="panel-body green">
                                <i class="fa  fa-pencil fa-3x"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo htmlentities($cancelledbooking); ?></b><a href="denied-requests.php"> Cancelled Bookings</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page-wrapper -->

        </div>
        <!-- end wrapper -->
        <!-- Core Scripts - Include with every page -->
        <script src="assets/plugins/jquery-1.10.2.js"></script>
        <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
        <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>
        <script src="assets/scripts/siminta.js"></script>

    </body>

    </html>
<?php }  ?>