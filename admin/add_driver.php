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
$name=$_POST['driver_name'];
$status=$_POST['status'];
$phone=$_POST['phone_no'];

$image=$_FILES["image"]["name"];
$extension = substr($image,strlen($image)-4,strlen($image));
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Pics has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{
$img=md5($image).time().$extension;
 move_uploaded_file($_FILES["image"]["tmp_name"],"images/".$img);
$sql="insert into driver(name, status,phone_no,image)values(:driver_name,:status,:phone_no,:img)";
$query=$dbh->prepare($sql);
$query->bindParam(':driver_name',$name,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->bindParam(':phone_no',$phone,PDO::PARAM_STR);

$query->bindParam(':img',$img,PDO::PARAM_STR);

 $query->execute();

   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Driver has been added.")</script>';
echo "<script>window.location.href ='add_driver.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}
}
?>

<!DOCTYPE html>
<html>

<head>
    
    <title>Relocation and shifting Management System | Add Services</title>
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
                    <h1 class="page-header">Add Drivers</h1>
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
                                    
    <div class="form-group"> <label for="exampleInputEmail1">Driver Name</label> <input type="text" name="driver_name" value="" class="form-control" required='true'> </div>
    <div class="form-group"> <label for="driverimg">Driver Photo</label><input type="file" name="image" value=""  class="form-control" required='true'> </div>

    <div class="form-group"> <label for="mobile number">Contact Number</label>  <input type="text" name="phone_no" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'phone_no*';}" required="true" maxlength="10" pattern="[0-9]+">
    </div>

    <div class="form-group"> <label for="driverstatus">Assign Driver Status</label>
    <select name="status">

 
  <!-- <option value="">Assign status</option> -->
  <option value="free">Free</option>
  <option value="engaged">Engaged</option>
  <option value="inactive">Inactive</option>
 
</select></div>
    <!-- <div class="form-group"> <label for="exampleInputEmail1">Description</label> <textarea type="text" name="description" value="" class="form-control" required='true'></textarea> </div> -->
    
     
     <p style="padding-left: 450px"><button type="submit" class="button-85" name="submit" id="submit">Add</button></p> </form>
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