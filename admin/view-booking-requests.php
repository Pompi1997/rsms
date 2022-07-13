<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['rsmsid'] == 0)) {
  header('location:logout.php');
}

if (isset($_POST['denied'])) {
  $viewid = intval($_GET['viewid']);
  $remark = "Request cannot be approved";
  $status = 0;
  $sql = "update customer_bookings set Remark=:remark ,Status=:status where ID=:viewid";
  $query = $dbh->prepare($sql);
  $query->bindParam(':viewid', $viewid, PDO::PARAM_STR);
  $query->bindParam(':remark', $remark, PDO::PARAM_STR);
  $query->bindParam(':status', $status, PDO::PARAM_STR);
  $query->execute();
  echo '<script>alert("Service Denied.")</script>';
  header('location:denied-requests.php');
}

if (isset($_POST['update'])) {
  $viewid = intval($_GET['viewid']);
  $remark = $_POST['remark'];
 $total_charge = $_POST['total_charge'];
  $ref = $_POST['ref'];
  $driver = $_POST['driver'];
  $status = 1;
  $sql = "update customer_bookings set Remark=:remark,total_charge=:total_charge,driver=:driver,Status=:status,reference_no=:ref where ID=:viewid";

  $query = $dbh->prepare($sql);
  $query->bindParam(':viewid', $viewid, PDO::PARAM_STR);
  $query->bindParam(':remark', $remark, PDO::PARAM_STR);
  $query->bindParam(':total_charge', $total_charge, PDO::PARAM_STR);
  $query->bindParam(':ref', $ref, PDO::PARAM_STR);
  $query->bindParam(':status', $status, PDO::PARAM_STR);
  $query->bindParam(':driver', $driver, PDO::PARAM_STR);

  $query->execute();

  echo '<script>alert("weight_charge has been updated successfully.")</script>';
  header('location:approved-bookings.php');
}
?>

<!DOCTYPE html>
<html>

<head>

  <title>Relocation and shifting Management System | View Users</title>
  <!-- Core CSS - Include with every page -->
  <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
  <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
  <link href="assets/css/style.css" rel="stylesheet" />
  <link href="assets/css/main-style.css" rel="stylesheet" />

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
          <h1 class="page-header">View Booking Request</h1>
        </div>
        <!--end page header -->
      </div>
      <div class="row">
        <div class="col-lg-12">
          <!-- Form Elements -->
          <div class="panel panel-default">

            <div class="panel-body">
              <div class="row">
                <div class="col-lg-12">

                  <?php
                  $vid = $_GET['viewid'];
                  $sql = "SELECT Name,MobileNumber,Email,Location,ShiftingLoc,assistance,Items,RequestDate, ROUND((6371 * acos( cos( radians(lat_to) ) * cos( radians( lat_from ) ) * cos( radians( lng_from ) - radians(lng_to) ) + sin( radians(lat_to) ) * sin( radians( lat_from ) ) ) ) ,1)as distance from customer_bookings  where ID =$vid;";
                  // "SELECT * from  customer_bookingswhere ID=$vid";

                  $query = $dbh->prepare($sql);
                  $query->execute();
                  $results = $query->fetchAll(PDO::FETCH_OBJ);
                  $cnt = 1;
                  if ($query->rowCount() > 0) {
                    foreach ($results as $row) {               ?>

                      <table border="1" class="table table-bordered">
                        <tr align="left">
                          <td colspan="6" style="font-size:20px;color:blue">
                            User Details</td>
                        </tr>

                        <tr>
                          <th scope>Name</th>
                          <td><?php echo ($row->Name); ?></td>
                          <th scope>Mobile Number</th>
                          <td><?php echo ($row->MobileNumber); ?></td>
                          <th scope>Email</th>
                          <td><?php echo ($row->Email); ?></td>

                        </tr>
                      </table>
                      <table border="1" class="table table-bordered">
                        <tr align="left">
                          <td colspan="6" style="font-size:20px;color:blue">
                            Shifting Details</td>
                        </tr>
                        <tr>
                          <th>Pickup At</th>
                          <td><?php echo ($row->Location); ?></td>
                          <th>Deliver To</th>
                          <td><?php echo ($row->ShiftingLoc); ?></td></tr>
                          <th>Assistance request</th>
                          <td><?php echo ($row->assistance); ?></td>
                          
                        </tr>

                        <tr>

                          <th>What to relocate</th>
                          <td><?php echo ($row->Items); ?></td>
                          <th>Request Date</th>
                          <td><?php echo ($row->RequestDate); ?></td>
                        </tr>

                      </table>
<center> <h1 style="background-color:cornflowerblue; color:azure"><b> COST Estimation </b></h1>
<div class="inline"><h4> Distance between requested source and destination :-<span style="color:red;font-weight:bold">  <?php echo ($row->distance); ?> kms</span></h4></div>
<div class="inline"><h4> Total charge without assistance is :-<span style="color:red;font-weight:bold"> ₹ <?php echo ($row->distance*30); ?></span> </h4></div>
<div class="inline"><h4> Assistance charge :- <span style="color:red;font-weight:bold">₹ <?php echo ($row->distance*10); ?> </span></h4></div>
<div class="inline"><h4> Total charge including assistance is :- <span style="color:red;font-weight:bold">₹ <?php echo ($row->distance*10 + $row->distance*30); ?></span> </h4></div>


                      <table border="1" class="table table-bordered">
                        <?php if ($row->Remark == "") { ?>
                          <form name="query" method="post">
                            <tr>
                              <th>Admin Remark</th>
                              <td> <select name="remark">
                                  <option>Select Action</option>
                                  <option value="approved">Approve</option>
                                  <option value="on hold">On Hold</option>
                                </select></td>
                              <!-- <input name="remark" class="form-control" required="true"></textarea></td> -->
                              <th>Enter Reference Number</th>

                              <td><input name="ref" class="form-control" required="true"></input>

                             

                              <th>Total Cost (₹)</th>

                              <td><input type="number" name="total_charge" class="form-control" required="true"></input></td>



                            </tr>
                            <tr>
                              <th>select from free Drivers</th>
                              <td>
                                <?php

                                $sql = "SELECT * from  driver WHERE status='free' ";
                                $query = $dbh->prepare($sql);
                                $query->execute();
                                $drivers = $query->fetchAll(PDO::FETCH_OBJ);
                                ?>
                                <select name="driver" required="true">
                                  <option>Select Driver</option>
                                  <?php foreach ($drivers as $driver) { ?>
                                    <option value="<?php echo $driver->id; ?>"><?php echo $driver->name; ?></option>
                                  <?php } ?>
                                </select>

                              </td>
                              <th>Action</th>
                              <td colspan="3">
                                <button type="submit" class="btn btn-primary pull-left" name="update">
                                  Approve <i class="fa fa-arrow-circle-right"></i>
                                </button>

                              </td>
                            </tr>

                          </form>
                          <form method="post">
                            <div class="deny-button">

                              <button type="submit" class="btn btn-danger " name="denied" onclick="return confirm('Are you sure?');"> Deny </button>
                            </div>

                          </form><br>

                        <?php } else { ?>

                          <tr>
                            <th>Admin Remark</th>
                            <td colspan="4"><?php echo $row->Remark; ?></td>
                            <th>Weight </th>
                            <td colspan="4"><?php echo $row->weight_charge; ?></td>
                            <th>Charge</th>
                            <td colspan="4"><?php echo $row->total_charge; ?></td>
                            <th>Service charge</th>
                            <td colspan="4"><?php echo $row->service_charge; ?></td>
                            <th>Driver id</th>
                            <td colspan="4"><?php echo $row->driver; ?></td>
                            <th>Last Updation Date</th>
                            <td><?php echo $row->UpdationDate; ?></td>
                          </tr>
                      <?php $cnt = $cnt + 1;
                        }
                      } ?>

                </div>

              </div>
            </div>
          </div>
          <!-- End Form Elements -->
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
  <script src="assets/plugins/pace/pace.js"></script>
  <script src="assets/scripts/siminta.js"></script>

</body>

</html>
<?php   } ?>