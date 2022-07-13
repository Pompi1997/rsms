<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['rsmsid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$rsmsid=$_SESSION['rsmsid'];
$helper_name=$_POST['helper_name'];
$status=$_POST['status'];
$phone=$_POST['phone_no'];

$sql="insert into helpers(name,status,phone_no)values(:helper_name,:status,:phone_no)";
$query=$dbh->prepare($sql);
$query->bindParam(':helper_name',$helper_name,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->bindParam(':phone_no',$phone,PDO::PARAM_STR);

 $query->execute();

   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Helper has been added.")</script>';
echo "<script>window.location.href ='add-helper.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}
?>

<!DOCTYPE html>
<html>
<head>
    
    <title>Relocation and shifting Management System| Add Helpers</title>
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
      <?php include_once('includes/header.php');?>
        <!-- end navbar top -->

        <!-- navbar side -->
        <?php include_once('includes/sidebar.php');?>
        <!-- end navbar side -->
        <!--  page-wrapper -->
          <div id="page-wrapper">
            <div class="row">
                 <!-- page header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Add Helpers</h1>
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
                                    <form method="post" enctype="multipart/form-data"> 
                                    
    <div class="form-group"> <label for="exampleInputEmail1">Helper Name</label> <input type="text" name="helper_name" value="" class="form-control" required='true'> </div>
    <div class="form-group"> <label for="mobile number">Contact Number</label>  <input type="text" name="phone_no" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'phone_no*';}" required="true" maxlength="10" pattern="[0-9]+">
    </div>

    <div class="form-group"> <label for="helperstatus">Assign Helper Status</label>
    <select name="status">

 
  <!-- <option value="">Assign status</option> -->
  <option value="free">Free</option>
  <option value="engaged">Engaged</option>
  <option value="inactive">Inactive</option>
 
</select></div>
   
     <p style="padding-left: 450px"><button type="submit" class="btn btn-primary" name="submit" id="submit">Add</button></p> </form>
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