<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (isset($_GET['track'])) {
    $ref = intval($_GET['ref']);
    // $sql = "SELECT customer_bookings.Name,customer_bookings.MobileNumber,customer_bookings.remark,customer_bookings.total_charge,customer_bookings.Location,customer_bookings.ShiftingLoc,courier_track.pickup_status,courier_track.delivery_status FROM courier_track INNER JOIN customer_bookings ON courier_track.refno = customer_bookings.reference_no;";
    $sql = "SELECT * from courier_track where refno =:ref";
    $query = $dbh->prepare($sql);
    $query->bindParam(':ref', $ref, PDO::PARAM_STR);
    $query->execute();
    $trackings = $query->fetchAll(PDO::FETCH_OBJ);
}
if (isset($_POST['pay'])) {
    $ref = intval($_GET['ref']);
    $paid = $_POST['paid'];
    $sql = "update customer_bookings set payment=:paid where reference_no=:ref";
    $query = $dbh->prepare($sql);
    $query->bindParam(':ref', $ref, PDO::PARAM_STR);
    $query->bindParam(':paid', $paid, PDO::PARAM_STR);
    $query->execute();
    $trackings = $query->fetchAll(PDO::FETCH_OBJ);
}

?>

<!DOCTYPE html>
<html>

<head>

    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //for-mobile-apps -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!-- js -->
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
    <!-- //js -->
    <link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
</head>

<body>
    <div class="services-breadcrumb">
        <div class="container">
            <ul>
                <li>
                    <h1>Relocation & Shifting MANAGEMENT SYSTEM</h1>
                </li>
            </ul>
        </div>
    </div>
    <!-- header -->
    <?php include_once('includes/header.php'); ?>
    <!-- //header -->
    <!-- banner4 -->
    <!-- <div class="banner4">
        <div class="container">
        </div>
    </div> -->

    <div class="services-breadcrumb">
        <div class="container">
            <ul>
                <li><a href="index.php">Home</a><i>|</i></li>
                <li>Track Parcel</li>
            </ul>
        </div>
    </div>
    <!-- //banner4 -->
    <!-- services -->

    <div class="banner2">

        <div class="track">
            <h3 class="quia">TRACK your Shipment</h3>

            <form method="get">
                <input type="text" name="ref" maxlength="50" style="border-radius:15px; margin-right:20px;">
                <button type="submit" value="track" name="track" class="button-85" role="button">Track</button>

            </form>
        </div>

        <?php
        if ($query->rowCount() > 0) {
            foreach ($trackings as $row) {
        ?>

                <br><br>
                <center>
                    <h3>YOUR DETAILS</h3>
                </center>

                <div class="track-detail">
                    <?php
                    $ref = intval($_GET['ref']);
                    $sql = "SELECT * from  customer_bookings where reference_no=:ref";
                    $query = $dbh->prepare($sql);
                    $query->bindParam(':ref', $ref, PDO::PARAM_STR);
                    $query->execute();
                    $bookings = $query->fetchAll(PDO::FETCH_OBJ);
                    $cnt = 1;

                    if ($query->rowCount() > 0) {
                        foreach ($bookings as $booking) { ?>
                            <p>Name <?php echo ($booking->Name); ?> | Contact No - <?php echo ($booking->MobileNumber); ?></p>
                            <p> Admin Remark -<?php echo ($booking->Remark); ?> | Total Amount - ₹<?php echo ($booking->total_charge); ?></p>
                            <p> Relocation Source - <?php echo ($booking->Location); ?></p>
                            <p> Relocation Destination - <?php echo ($booking->ShiftingLoc); ?></p>
                            <form method="post">
                                <input type="hidden" value="<?php echo ($booking->total_charge); ?>">
                                <input type="hidden" value="<?php echo ($booking->ID); ?>">
                                <input type="hidden" value="<?php echo ($booking->Email); ?>">

                            </form>

                    <?php }
                    } ?>


                    <?php if ($row->payment == "") { ?>
                        <form>
                            <script src="https://checkout.razorpay.com/v1/payment-button.js" data-payment_button_id="pl_JpkNGpavKhgYsv" async> </script>
                        </form>


                    <?php } else {
                    ?><p>payment status - ✔️completed</p>
                    <?php } ?>
                </div>


                <br><br>
                <div class="e" style="display: flex;align-items: center;justify-content: center;">
                    <h1>Relocation Status</h1>
                </div>
                <div class="e" style="display: flex;align-items: center;justify-content: center;">
                    <p>Picked up ?? ->

                        <?php if ($row->pickup_status == "") { ?>
                        <p>Not Yet</p>
                         <?php } else {
                            echo ($row->pickup_status);
                        } ?>
                        </p>
                </div>

                <div class="e" style="display: flex;align-items: center;justify-content: center;">
                    <p>Delivered ?? ->
                        <?php if ($row->delivery_status == "") { ?>
                    <p>Not Yet</p>
                     <?php } else {
                            echo ($row->delivery_status);
                        } ?>
                     </p>
                </div>


            <?php }
        } else { ?>
            <center><br><br>
                <p><b> 🙁 No results Found !!</p></b>
            </center>
        <?php
        } ?>

    </div>

    <?php include_once('includes/foo.php'); ?>

    <!-- //services -->

    <!-- for bootstrap working -->
    <script src="js/bootstrap.js"></script>
    <!-- //for bootstrap working -->

</body>

</html>