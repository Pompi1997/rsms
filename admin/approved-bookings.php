<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['rsmsid'] == 0)) {
    header('location:logout.php');
}
if (isset($_POST['assignD'])) {
    $driver = ($_POST['driver']);
    $status = "engaged";
    $sql = "update driver set status=:status where id=:driver";
    $query = $dbh->prepare($sql);
    $query->bindParam(':driver', $driver, PDO::PARAM_STR);
    $query->bindParam(':status', $status, PDO::PARAM_STR);
    $query->execute();
    echo '<script>alert("driver assigned.")</script>';
    header('location:approved-bookings.php');
} else {

?>
    <!DOCTYPE html>
    <html>

    <head>

        <title>Relocation & Shifting | Approved Bookings</title>
        <!-- Core CSS - Include with every page -->
        <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="assets/css/style.css" rel="stylesheet" />
        <link href="assets/css/main-style.css" rel="stylesheet" />
        <!-- Page-Level CSS -->
        <link href="assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

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
                    <!--  page header -->
                    <div class="col-lg-12">
                        <h1 class="page-header">Approved Bookings</h1>
                    </div>
                    <!-- end  page header -->
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">

                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>S.NO</th>
                                                <th>Reference_no</th>
                                                <th>Customer Email</th>
                                                <th>From</th>
                                                <th>To</th>
                                                <th>Driver Name</th>
                                                <th>Contact</th>
                                                <th>Respond</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // $sql = "SELECT * from customer_bookingswhere Status='1'";
                                            $sql = "SELECT customer_bookings.ID,customer_bookings.Name,customer_bookings.reference_no,customer_bookings.Email,customer_bookings.MobileNumber,customer_bookings.Location,customer_bookings.ShiftingLoc,customer_bookings.Remark,customer_bookings.total_charge,driver.id,driver.name,driver.phone_no FROM customer_bookings INNER JOIN driver ON driver.id=customer_bookings.driver ";
                                            $query = $dbh->prepare($sql);
                                            $query->execute();
                                            $results = $query->fetchAll(PDO::FETCH_OBJ);

                                            $cnt = 1;
                                            if ($query->rowCount() > 0) {
                                                foreach ($results as $row) {               ?>
                                                    <tr>
                                                        <td><?php echo htmlentities($cnt); ?></td>
                                                        <td><?php echo htmlentities($row->reference_no); ?></td>
                                                        <td><?php echo htmlentities($row->Email); ?></td>
                                                        <td><?php echo htmlentities($row->Location); ?></td>
                                                        <td><?php echo htmlentities($row->ShiftingLoc); ?></td>
                                                        <td><?php echo htmlentities($row->name); ?>
                                                            <form method="post">
                                                                <input type="text" name="driver" value="<?php echo ($row->id); ?>" readonly> <br />
                                                                <button type="submit" class="btn btn-primary" name="assignD">Assign</button>
                                                            </form>
                                                        </td>
                                                        <td><?php echo htmlentities($row->phone_no); ?></td>
                                                        <td>
                                                            <form method="post" action="send_script.php">
                                                                <input type="hidden" name="receiver" value="<?php echo ($row->Email); ?>"> <br />
                                                                <input type="hidden" name="subject" value="<?php echo ($row->Remark); ?>"> <br /> <!-- send mail -->
                                                                <input type="hidden" name="body" value="Dear <?php echo ($row->Name); ?>, Your booking has been accepted and the cost incurred 
                                                                for the service requested is ₹ <?php echo ($row->total_charge); ?>  Your reference number 
                                                                is <?php echo ($row->reference_no); ?>. Use this reference number to track your parcel and get detailed receipt. 
                                                                Contact your driver on <?php echo ($row->phone_no); ?> to get updated status." />
                                                                <button type="submit" class="btn btn-primary" name="send_message_btn">Send Response</button>
                                                            </form>




                                                        </td>
                                                    </tr>

                                            <?php $cnt = $cnt + 1;
                                                }
                                            } ?>


                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <!--End Advanced Tables -->
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
        <!-- Page-Level Plugin Scripts-->
        <script src="assets/plugins/dataTables/jquery.dataTables.js"></script>
        <script src="assets/plugins/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function() {
                $('#dataTables-example').dataTable();
            });
        </script>

    </body>

    </html>
    <!-- <?php }  ?> -->