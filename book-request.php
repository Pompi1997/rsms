<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$mobnum = $_POST['mobnum'];
	$email = $_POST['email'];
	$location = $_POST['location'];
	$lat_from = $_POST['lat_from'];
	$lng_from = $_POST['lng_from'];
	$sloc = $_POST['slocation'];
	$lat_to = $_POST['lat_to'];
	$lng_to = $_POST['lng_to'];
	$assistance = $_POST['assistance'];
	$items = $_POST['items'];

	$sql = "insert into customer_bookings(Name,MobileNumber,Email,Location,lat_from,lng_from,ShiftingLoc,lat_to,lng_to,assistance,Items) values(:name,:mobnum,:email,:location,:lat_from,:lng_from,:sloc,:lat_to,:lng_to,:assistance,:items)";
	$query = $dbh->prepare($sql);
	$query->bindParam(':name', $name, PDO::PARAM_STR);
	$query->bindParam(':mobnum', $mobnum, PDO::PARAM_STR);
	$query->bindParam(':email', $email, PDO::PARAM_STR);
	$query->bindParam(':location', $location, PDO::PARAM_STR);
	$query->bindParam(':lat_from', $lat_from, PDO::PARAM_STR);
	$query->bindParam(':lng_from', $lng_from, PDO::PARAM_STR);
	$query->bindParam(':sloc', $sloc, PDO::PARAM_STR);
	$query->bindParam(':lat_to', $lat_to, PDO::PARAM_STR);
	$query->bindParam(':lng_to', $lng_to, PDO::PARAM_STR);
	$query->bindParam(':assistance', $assistance, PDO::PARAM_STR);
	$query->bindParam(':items', $items, PDO::PARAM_STR);
	$query->execute();

	$LastInsertId = $dbh->lastInsertId();
	// if ($LastInsertId > 0) {
	// 	echo '<script>alert("Booking Request Successful")</script>';
	// 	echo "<script>window.location.href ='book-request.php'</script>";
	// } else {
	// 	echo '<script>alert("Something Went Wrong. Please try again")</script>';
	// }
}

?>
<!DOCTYPE html>
<html>

<head>
	<title>Relocation & Shifting :: Request Booking</title>
	<!-- for-mobile-apps -->

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
	<script type="text/javascript"></script>

	<!-- SweetAlert -->
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="sweetalert2.min.js"></script>
	<link rel="stylesheet" href="sweetalert2.min.css">
	<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
	<!-- //js -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAOnr-xvMyqD6u8G_7PVNEDHdF3Gor1xLQ&libraries=places&callback=initMap">
	</script>
	<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<script>
		var searchInput1 = 'search_input1';
		$(document).ready(function() {
			var autocomplete;
			autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput1)), {
				types: ["geocode"]

			});
			google.maps.event.addListener(autocomplete, 'place_changed', function() {
				var near_place = autocomplete.getPlace();
				var lat1 = jQuery("#lat_from").val(near_place.geometry.location.lat());
				var lng2 = jQuery("#lng_from").val(near_place.geometry.location.lng());
				// var lat = near_place.geometry.location.lat();
				// var long = near_place.geometry.location.lng();
			});
		});
	</script>
	<script>
		var searchInput2 = 'search_input2';
		$(document).ready(function() {
			var autocomplete;
			autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput2)), {
				types: ["geocode"]

			});
			google.maps.event.addListener(autocomplete, 'place_changed', function() {
				var near_place2 = autocomplete.getPlace();
				var lat2 = jQuery("#lat_to").val(near_place2.geometry.location.lat());
				var lng2 = jQuery("#lng_to").val(near_place2.geometry.location.lng());
			});
		});
	</script>

</head>

<body>
	<div class="services-breadcrumb">
		<div class="container">
			<ul>
				<li>
					<h3> Relocation & Shifting MANAGEMENT SYSTEM</h3>
				</li>
			</ul>
		</div>
	</div>
	<!-- header -->
	<?php include_once('includes/header.php'); ?>
	<!-- banner2 -->
	<div class="banner2">
		<div class="container">
			<div class="request_info">
				<h2>Relocation and shifting Management System</h2>
			</div>
		</div>
	</div>

	<div class="services-breadcrumb">
		<div class="container">
			<ul>
				<li><a href="index.php">Home</a><i>|</i></li>
				<li>Book Service request</li>
			</ul>
		</div>
	</div>
	<!-- //banner2 -->

	<!-- mail -->
	<div class="mail">
		<div class="container">

			<div class="col-md-12 wthree_contact_left">
				<h4>Book Service</h4>
				<form method="post" onsubmit="return false">
					<div class="col-md-12 wthree_contact_left_grid">
						<strong>Name </strong><input type="text" name="name" value="Name*" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name*';}" required="true" style="border-radius:15px; background:linear-gradient(62deg, #8EC5FC 0%, #E0C3FC 100%);">
					</div>
					<div class="col-md-12 wthree_contact_left_grid">
						<strong>Email:</strong><input type="email" name="email" value="Email*" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email*';}" required="true" style="border-radius:15px; background:linear-gradient(62deg, #8EC5FC 0%, #E0C3FC 100%);">
					</div>
					<div class="col-md-12 wthree_contact_left_grid" style="padding-top: 20px">
						<strong>Mobile Number </strong><input type="text" name="mobnum" value="Mobile Number*" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Telephone*';}" required="true" maxlength="10" pattern="[0-9]+" style="border-radius:15px;  background:linear-gradient(62deg, #8EC5FC 0%, #E0C3FC 100%);">
					</div>
					<div class="col-md-12 wthree_contact_left_grid" style="padding-top: 20px">
						<strong style="padding-right: 20px">Need help with loading/unloading and packaging ??</strong><select type="text" name="assistance" value="Need  assistance ??*" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Need Assistnace ??*';}" required="true">
							<option value="">Choose from below</option>
							<option value="yes">Yes</option>
							<option value="no">No</option>
						</select>
						<p>Disclaimer* : This will include extra charge</p>
					</div>



					<div class="col-md-12 wthree_contact_left_grid" style="padding-top: 20px">
						<strong>Pickup Location</strong><input type="text" id="search_input1" name="location" value="Pickup Location*" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Source address*';}" required="true" style="border-radius:15px;  background:linear-gradient(62deg, #8EC5FC 0%, #E0C3FC 100%);">
						<input type="hidden" id="lat_from" name="lat_from" />
						<input type="hidden" id="lng_from" name="lng_from" />
					</div>

					<div class="col-md-12 wthree_contact_left_grid" style="padding-top: 20px">
						<strong>Destination Location</strong><input type="text" id="search_input2" name="slocation" value="Destination Location*" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Destination address*';}" required="true" style="border-radius:15px;  background:linear-gradient(62deg, #8EC5FC 0%, #E0C3FC 100%);"></strong>
						<input type="hidden" id="lat_to" name="lat_to" />
						<input type="hidden" id="lng_to" name="lng_to" />
					</div>

					<!-- <div class="col-md-12 wthree_contact_left_grid" style="padding-top: 20px">
						<strong style="padding-right: 20px">Date of Shifting</strong><input type="date" name="sdate" value="Where do you want the Packers & Movers service?*" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Subject*';}" required="true">
					</div> -->

					<div class="col-md-12 wthree_contact_left_grid" style="padding-top: 20px">
						<strong>Mention the items that you are willing to send</strong> <textarea name="items" required="true"></textarea>
					</div>

					<div class="clearfix"> </div>

					<input type="submit" value="Submit" name="submit">
					<input type="reset" value="Clear">
				</form>

			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!-- //mail -->
	<!-- footer -->
	<?php include_once('includes/foo.php'); ?>
	<!-- //footer -->
	<!-- for bootstrap working -->
	<script src="js/bootstrap.js"></script>
	<!-- //for bootstrap working -->
	<?php
	if ($LastInsertId > 0) { ?>
		<script>
			Swal.fire({
				position: 'center',
				icon: 'success',
				title: 'Booking Request Successful. We will contact you soon',
				showConfirmButton: false,
				timer: 1500
			})
		</script>
	<?php } ?>

</body>

</html>

<!-- AIzaSyAOnr-xvMyqD6u8G_7PVNEDHdF3Gor1xLQ -->