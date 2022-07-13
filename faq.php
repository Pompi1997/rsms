<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

?>

<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>FAQ PAGE</title>

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
  <div class="services-breadcrumb">
        <div class="container">
            <ul>
                <li><a href="index.php">Home</a><i>|</i></li>
                <li>Frequently Asked Questions</li>
            </ul>
        </div>
    </div><br>
<section class="faq-container">
    <div class="faq-one">

        <!-- faq question -->
        <h4 class="faq-page">What is an RSMS ?</h4>

        <!-- faq answer -->
        <div class="faq-body">
            <p>RSMS is a Relocation and Shifting Management System that helps the users shift bulky items relocation, home from one place to another by connecting them to drivers. </p>
        </div>
    </div>
    <hr class="hr-line">

    <div class="faq-two">

        <!-- faq question -->
        <h4 class="faq-page">Do you assist with Loading and unloading too?</h4>

        <!-- faq answer -->

        <div class="faq-body">
            <p>Yes we assist with loading, unloading and packing the items too, if you "yes" under need asisstance in the booking request form</p>
        </div>
    </div>
    <hr class="hr-line">


    <div class="faq-three">

        <!-- faq question -->
        <h4 class="faq-page">How is the cost calculated?</h4>

        <!-- faq answer -->
        <div class="faq-body">
            <p>The cost is calculated based on the distance between the source and destination location starting with 30 INR/km.</p>
        </div>
    </div>
    <div class="faq-four">

        <!-- faq question -->
        <h4 class="faq-page">Do you charge for the assitance?</h4>

        <!-- faq answer -->
        <div class="faq-body">
            <p>Yes we extra labour charge is levied if you require assistance.</p>
        </div>
    </div>

</section><br>
<script src="main.js"></script>
  <!-- //services -->

  <?php include_once('includes/foo.php'); ?>
  <!-- for bootstrap working -->
  <script src="js/bootstrap.js"></script>
  <!-- //for bootstrap working -->
</body>

</html>