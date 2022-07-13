<?php
session_start();
error_reporting(0);

include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html>

<head>
	<title>RSMS:: About Us</title>

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
	<!-- Stats-Number-Scroller-Animation-JavaScript -->
	<script src="js/waypoints.min.js"></script>
	<script src="js/counterup.min.js"></script>
	<script>
		jQuery(document).ready(function($) {
			$('.counter').counterUp({
				delay: 10,
				time: 1000
			});
		});
	</script>
	<!-- //Stats-Number-Scroller-Animation-JavaScript -->
	<!-- //js -->
	<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
</head>

<body>
<div class="services-breadcrumb">
		<div class="container">
			<ul>
				<li><h1>Relocation & Shifting MANAGEMENT SYSTEM</h1></li>
			</ul>
		</div>
	</div>
	<!-- header -->
	<?php include_once('includes/header.php'); ?>
	<!-- //header -->
	<!-- banner2 -->
	<!-- <div class="banner2">
		<div class="container">
		</div>
	</div> -->
	<div class="services-breadcrumb">
		<div class="container">
			<ul>
				<li><a href="index.php">Home</a><i>|</i></li>
				<li>About Us</li>
			</ul>
		</div>
	</div>
	<div class="container">

		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner">
				<div class="item active">
					<img src="images/same-day-courier-services-1200x675.jpg" alt="unavailable" style="width:80%; height:450px;">
				</div>

				<div class="item">
					<img src="images/d.png" alt="unavailable" style="width:80%; height:450px;">
				</div>

				<div class="item">
					<img src="images/layer-11.png" alt="unavailable" style="width:80%; height:400px;">
				</div>
			</div>

			<!-- Left and right controls -->
			<a class="left carousel-control" href="#myCarousel" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>

	<!-- //banner2 -->

	<!-- about -->
	<div class="about">
		<div class="container">

			<h3>About Us</h3>
			<p class="quia">Detailed description about Relocation and shifting Management System</p>

			<div class="agile_about_grids">
				<?php
				$sql = "SELECT * from pages where PageType='aboutus'";
				$query = $dbh->prepare($sql);
				$query->execute();
				$results = $query->fetchAll(PDO::FETCH_OBJ);

				$cnt = 1;
				if ($query->rowCount() > 0) {
					foreach ($results as $row) {               ?>
						<div class="col-md-6 agile_about_grid_left">

							<div class="clearfix"> </div>
							<img class="agile_about_grid_left_img img-responsive" src="images/istockphoto-1297202055-612x612.jpg" alt=" " />
						</div>
						<div class="col-md-6 agile_about_grid_right">
							<h4>About our relocation services</h4>
							<p><?php echo htmlentities($row->PageDescription); ?></p>

						</div>
						<div class="clearfix"> </div>
				<?php $cnt = $cnt + 1;
					}
				} ?>
			</div>
		</div>
	</div>
	<!-- //about -->

	<?php include_once('includes/foo.php'); ?>


	<script src="js/bootstrap.js"></script>

</body>

</html>