<?php include('includes/dbconnection.php'); ?>
<?php
{
    $id=$_GET['delete_id'];
    $sql = "delete from driver where id=:delete_id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':delete_id',$id,PDO::PARAM_STR);
    $query->execute();
    echo '<script>alert("Driver has been deleted.")</script>';
    header("location:manage_drivers.php");
}
?>