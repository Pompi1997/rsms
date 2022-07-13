<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['rsmsid'] == 0)) {
  header('location:logout.php');
} else {
  if (isset($_POST['submit'])) {

    $rsmsid = $_SESSION['rsmsid'];
    $pagetitle = $_POST['pagetitle'];
    $pagedes = $_POST['pagedes'];
    $sql = "update pages set PageTitle=:pagetitle,PageDescription=:pagedes where  PageType='aboutus'";
    $query = $dbh->prepare($sql);
    $query->bindParam(':pagetitle', $pagetitle, PDO::PARAM_STR);
    $query->bindParam(':pagedes', $pagedes, PDO::PARAM_STR);

    $query->execute();
    echo '<script>alert("About us has been updated")</script>';
  }
?>
  <!DOCTYPE html>
  <html>

  <head>

    <title>Relocation and shifting Management System | About Us</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
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
            <h1 class="page-header">About Us</h1>
          </div>
          <!--end page header -->
        </div>
        <div class="row">
          <div class="col-lg-12">
            <!-- Form Elements -->
            <div class="panel ">

              <div class="panel-body">
                <div class="row">
                  <div class="col-lg-12">
                    <form method="post">
                      <?php

                      $sql = "SELECT * from  pages where PageType='aboutus'";
                      $query = $dbh->prepare($sql);
                      $query->execute();
                      $results = $query->fetchAll(PDO::FETCH_OBJ);
                      $cnt = 1;
                      if ($query->rowCount() > 0) {
                        foreach ($results as $row) {               ?>
                          <div class="form-group"> <label for="exampleInputEmail1">Page Title</label> <input type="text" name="pagetitle" value="<?php echo $row->PageTitle; ?>" class="form-control" required='true'> </div>
                          <div class="form-group"> <label for="exampleInputEmail1">Page Description</label> <textarea type="text" name="pagedes" id="pagedes" required="true" class="form-control"><?php echo $row->PageDescription; ?></textarea> </div>

                      <?php $cnt = $cnt + 1;
                        }
                      } ?>
                      <p style="padding-left: 450px"><button type="submit" class="button-85" name="submit" id="submit">Update</button></p>
                    </form>
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
    <script src="assets/scripts/siminta.js"></script>

  </body>

  </html>
<?php }  ?>