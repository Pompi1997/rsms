<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>RSMS:: Home Page</title>

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
    <!-- load-more -->
    <script>
        $(document).ready(function() {
            size_li = $("#myList li").size();
            x = 1;
            $('#myList li:lt(' + x + ')').show();
            $('#loadMore').click(function() {
                x = (x + 1 <= size_li) ? x + 1 : size_li;
                $('#myList li:lt(' + x + ')').show();
            });
            $('#showLess').click(function() {
                x = (x - 1 < 0) ? 1 : x - 1;
                $('#myList li').not(':lt(' + x + ')').hide();
            });
        });
    </script>
    <!-- //load-more -->
    <link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
</head>

<body>
    <!-- header -->
    <div class="services-breadcrumb">
		<div class="container">
			<ul>
				<li><h1>Relocation & Shifting MANAGEMENT SYSTEM</h1></li>
			</ul>
		</div>
	</div>
    <?php include_once('includes/header.php'); ?>
    <!-- //header -->
    <!-- banner -->
    <div class="banner2">
        <div class="col-md-3 w3l_services_grid">
            <div class="w3l_services_grid1">
                <br><br>
                <div class="cost">
                    <p style="padding-top: 20px">
                    <h4>Relocation-Service within city</h4>
                    </p>

                    <p style="padding-top: 10px">
                    <p>TRUCK-service - ₹ 3000</p>
                    <p>Loading & Unloading - ₹ 500</p>
                    <p>Distance charge - ₹ 30/km</p>
                    </p>
                </div>
            </div>

        </div>
        <div class="col-md-3 w3l_services_grid">
            <div class="w3l_services_grid1">
                <br><br>

                <div class="cost">
                    <p style="padding-top: 20px">
                    <h4>Relocation-Service outside city</h4>
                    </p>

                    <p style="padding-top: 10px">
                    <p> TRUCK-service - ₹ 5000</p>
                    <p>Loading & Unloading - ₹ 2500</p>
                    <p>Distance charge - ₹ 40/km</p>
                    </p>
                </div>
            </div>

        </div>

        <div class="w3ls_banner_info">
            <div class="wthree_more">
                <h5>Our Total approximate shipping cost includes labour charge + charge by vehicle type + distance</h5>
                <br><br>
                <a href="book-request.php" class="button--wayra button--border-thick button--text-upper button--size-s">Book Request</a>
            </div>
        </div>
    </div>
    <!-- //banner -->



    <!-- flexSlider -->
    <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
    <script defer src="js/jquery.flexslider.js"></script>
    <script type="text/javascript">
        $(window).load(function() {
            $('.flexslider').flexslider({
                animation: "slide",
                start: function(slider) {
                    $('body').removeClass('loading');
                }
            });
        });
    </script>
    <!-- //flexSlider -->
    </div>
    <!-- </div>  -->
    </div>
    <!-- //testimonials -->
    <!-- footer -->
    <?php include_once('includes/foo.php'); ?>
    <!-- //footer -->
    <!-- for bootstrap working -->
    <script src="js/bootstrap.js"></script>
    <!-- //for bootstrap working -->
</body>

</html>