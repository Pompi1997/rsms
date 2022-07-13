<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['rsmsid'] == 0)) {
  header('location:driver-login.php');
}

else if (isset($_POST['update_status'])) {
  $did = $_SESSION['rsmsid'];
  $status = ($_POST['status']);
  $con = "update driver set status=:status where id=:did";
  $change_status = $dbh->prepare($con);
  $change_status->bindParam(':did', $did, PDO::PARAM_STR);
  $change_status->bindParam(':status', $status, PDO::PARAM_STR);
  $change_status->execute();
  // echo '<script>alert("Your status successully changed")</script>';
  echo "<script>window.location.href ='driver-dashboard.php'</script>";
}

if (isset($_POST['insert_trip'])) {
  $bookingid =  ($_POST['bookingid']);
  $did = $_SESSION['rsmsid'];
  $refno =  ($_POST['refno']);
  $con = "insert into courier_track(refno,driver_id,booking_id) values(:refno,:did,:bookingid)";
  $set_track = $dbh->prepare($con);
  $set_track->bindParam(':refno', $refno, PDO::PARAM_STR);
  $set_track->bindParam(':bookingid', $bookingid, PDO::PARAM_STR);
  $set_track->bindParam(':did', $did, PDO::PARAM_STR);
  $set_track->execute();
  echo "<script>window.location.href ='driver-dashboard.php'</script>";
}

else if (isset($_POST['outp'])) {
  $did = $_SESSION['rsmsid'];
  $ofp =  ($_POST['ofp']);
  // $cid = $_GET['cid'];
  $con = "update courier_track set pickup_status=:ofp where driver_id=:did";
  $set_track = $dbh->prepare($con);
  $set_track->bindParam(':did', $did, PDO::PARAM_STR);
  $set_track->bindParam(':ofp', $ofp, PDO::PARAM_STR);
  $set_track->execute();
  // echo '<script>alert("Your status successully changed")</script>';
  echo "<script>window.location.href ='driver-dashboard.php'</script>";
}

else if (isset($_POST['delisub'])) {
  $did = $_SESSION['rsmsid'];
  $dels =  ($_POST['dels']);
  $con = "update courier_track set delivery_status=:dels where driver_id=:did";
  $change_status = $dbh->prepare($con);
  $change_status->bindParam(':did', $did, PDO::PARAM_STR);
  $change_status->bindParam(':dels', $dels, PDO::PARAM_STR);
  $change_status->execute();
  // echo '<script>alert("Your status successully changed")</script>';
  echo "<script>window.location.href ='driver-dashboard.php'</script>";
}


else {

?>
  <!DOCTYPE html>
  <html>

  <head>
    <title>RSMS | Driver Dashboard</title>
    <!-- Core CSS - Include with every page -->
    <!-- <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" /> -->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="includes/style.css" rel="stylesheet" />
    <!-- <link href="assets/css/main-style.css" rel="stylesheet" /> -->

    <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">
      bkLib.onDomLoaded(nicEditors.allTextAreas);
    </script>
  </head>

  <body>
    <?php include_once('includes/header.php'); ?>
    <?php
    $did = $_SESSION['rsmsid'];
    $sql = "SELECT * from  driver where id=:did";
    $query = $dbh->prepare($sql);
    $query->bindParam(':did', $did, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    $cnt = 1;
    if ($query->rowCount() > 0) {
      foreach ($results as $driver) {
    ?>
        <br><br>
        <div class="card mx-auto" style="width: 25rem;vertical-align:middle;text-align:center;">
          <div class="card-header">
            <h4>Welcome
              <?php echo $driver->name; ?></h4>
            <?php echo $driver->phone_no; ?>
          </div>
          <div class="card-body">
            <h5 class="card-title">Current Status : <?php echo $driver->status; ?></h5>
            <form method="post">
              <p class="card-text"> Update your status :

                <select name="status">
                  <option value="Free">Free</option>
                  <option value="Engaged">Engaged</option>
                  <option value="Inactive">Inactive</option>
                </select>
              </p>
              <button type="submit" class="btn btn-primary" name="update_status" id="liveAlertBtn">Update</button>
            </form>
          </div>
        </div><br><br>
    <?php $cnt = $cnt + 1;
      }
    } ?>
    <!-- view boookings -->
    <center>
      <h1> New Bookings</h1>
      <HR style="border-top:8px solid blueviolet">

      <?php
      $did = $_SESSION['rsmsid'];
      $sql = "SELECT * from  customer_bookings where driver=:did";
      $query = $dbh->prepare($sql);
      $query->bindParam(':did', $did, PDO::PARAM_STR);
      $query->execute();
      $bookings = $query->fetchAll(PDO::FETCH_OBJ);
      $cnt = 1;

      if ($query->rowCount() > 0) {
        foreach ($bookings as $booking) { ?>
          <table class="table table-bordered">
            <thead>SL No.<?php echo $cnt ?></thead>
            <tr>
              <th>Customer Name</th>
              <td><?php echo $booking->Name; ?></td>
              <th>Customer id</th>
              <td><?php echo $booking->ID; ?></td>
              <th>Customer Email</th>
              <td><?php echo $booking->Email; ?></td>
              <th>Customer Phone Number</th>
              <td><?php echo $booking->MobileNumber; ?></td>
            </tr>
            <tr>
              <th>Pick up Location</th>
              <td><?php echo $booking->Location; ?></td>
              <th>Drop Location</th>
              <td><?php echo $booking->ShiftingLoc; ?></td>
              <th>Action</th>
              <td>
                <div class="col-md-12 text-center">
                  <button class="btn btn-primary " onclick="openForm()">SET TRIP STATUS</button>
                </div>
              </td>
            </tr>
            <tr>
              <form method="post">
                <input type="hidden" name="bookingid" value="<?php echo ($booking->ID); ?>">
                <input type="hidden" name="refno" value="<?php echo ($booking->reference_no); ?>">

                <button type="submit" class="btn btn-primary" name="insert_trip" onclick="return confirm('Are you sure?')">Start Relocation Service</button>
              </form>
            </tr>

          </table><br>

        <?php $cnt = $cnt + 1;
        }
      } else { ?>
        <CENTER>
          <h3>NONE</h3>

        <?php }  ?>
        </div>

        <div class="f" style="display: flex;align-items: center;justify-content: center;">

          <div class="form-popup" id="myForm" style="background: lightsteelblue;display: block;">
            <form class="form-group" method="post">
              <h3 style="margin-top:15px ;">SET TRIP STATUS</h3>
              <div class="b" style="display: flex;align-items: center;justify-content: center; margin-right:10px">
                <p style="margin-right:17px; margin-left:10px">set pickup status </p>
                <select name="ofp" style="border-radius:10px ;">
                  <option>set status</option>
                  <option>yes</option>
                </select>
                <button type="submit" class="btn btn-success" name="outp" style="margin-left:10px">update</button>
              </div>

              <div class="b" style="display: flex;align-items: center;justify-content: center; margin-right:10px">
                <p style="margin-right:10px; margin-left:10px">set delivery status </p>
                <select name="dels" style="border-radius:10px ;">
                  <option>set status</option>
                  <option>yes</option>
                </select>
                <button type="submit" class="btn btn-success" name="delisub" style="margin-left:10px">update</button>
              </div>
            <button type="button" class="btn btn-secondary" onclick="closeForm()" style="margin-bottom:18px;margin-top:12px";>Close</button>
            </form>
          </div>
        </div>
        <!-- <button onclick="myF()" class="btn btn-success">Move Next</button> -->


        <script>
          function openForm() {
            document.getElementById("myForm").style.display = "block";
          }

          function closeForm() {
            document.getElementById("myForm").style.display = "none";
          }
        </script>
        <script>
          const alertPlaceholder = document.getElementById('liveAlertPlaceholder')

          const alert = (message, type) => {
            const wrapper = document.createElement('div')
            wrapper.innerHTML = [
              `<div class="alert alert-${type} alert-dismissible" role="alert">`,
              `   <div>${message}</div>`,
              '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
              '</div>'
            ].join('')

            alertPlaceholder.append(wrapper)
          }
          const alertTrigger = document.getElementById('liveAlertBtn')
          if (alertTrigger) {
            alertTrigger.addEventListener('click', () => {
              alert('Status update successfull!', 'success')
            })
          }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
        </script>
  </body>

  </html>
<?php }  ?>