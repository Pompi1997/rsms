<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <link href='//foo.phps.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<link href='//foo.phps.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>

</head>

<body><style>
@import url(https://fonts.googleapis.com/css?family=Open+Sans:400,500,300,700);

* {
  font-family: Open Sans;
}

/* section {
  width: 100%;
  display: inline-block;
  background: #333;
  height: 50vh;
  text-align: center;
  font-size: 22px;
  font-weight: 700;
  text-decoration: underline;
} */

.footer-distributed{
	background: #e6e6fa;
	box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.12);
	box-sizing: border-box;
	width: 100%;
	text-align: left;
	font: bold 16px sans-serif;
	padding: 55px 50px;
}

.footer-distributed .footer-left,
.footer-distributed .footer-center,
.footer-distributed .footer-right{
	display: inline-block;
	vertical-align: top;
}

/* Footer left */

.footer-distributed .footer-left{
	width: 40%;
}

/* The company logo */

.footer-distributed h3{
	color:  #ffffff;
	font: normal 36px 'Open Sans', cursive;
	margin: 0;
}

.footer-distributed h3 span{
	color:  blueviolet;
}

/* Footer links */

.footer-distributed .footer-links{
	color:  blueviolet;
	margin: 20px 0 12px;
	padding: 0;
}

.footer-distributed .footer-links a{
	display:inline-block;
	line-height: 1.8;
  font-weight:400;
	text-decoration: none;
	color:  inherit;
}

.footer-distributed .footer-company-name{
	color:  #222;
	font-size: 14px;
	font-weight: normal;
	margin: 0;
}

/* Footer Center */

.footer-distributed .footer-center{
	width: 35%;
}

.footer-distributed .footer-center i{
	background-color:  #33383b;
	color: blueviolet;
	font-size: 25px;
	width: 38px;
	height: 30px;
	border-radius: 50%;
	text-align: center;
	line-height: 42px;
	margin: 10px 15px;
	vertical-align: middle;
}

.footer-distributed .footer-center i.fa-envelope{
	font-size: 17px;
	line-height: 38px;
}

.footer-distributed .footer-center p{
	display: inline-block;
	color: blueviolet;
  font-weight:400;
	vertical-align: middle;
	margin:0;
}

.footer-distributed .footer-center p span{
	display:block;
	font-weight: normal;
	font-size:14px;
	line-height:2;
}

.footer-distributed .footer-center p {
	color:  blueviolet;
	text-decoration: none;;
}

.footer-distributed .footer-links a:before {
  content: "|";
  font-weight:300;
  font-size: 20px;
  left: 0;
  color: blueviolet;
  display: inline-block;
  padding-right: 5px;
}

.footer-distributed .footer-links .link-1:before {
  content: none;
}

/* Footer Right */

.footer-distributed .footer-right{
	width: 20%;
}

.footer-distributed .footer-company-about{
	line-height: 20px;
	color:  black;
	font-size: 13px;
	font-weight: normal;
	margin: 0;
}

.footer-distributed .footer-company-about span{
	display: block;
	color:  blueviolet;
	font-size: 14px;
	font-weight: bold;
	margin-bottom: 20px;
}

.footer-distributed .footer-icons{
	margin-top: 25px;
}

.footer-distributed .footer-icons a{
	display: inline-block;
	width: 35px;
	height: 35px;
	cursor: pointer;
	background-color:  white;
	border-radius: 2px;

	font-size: 20px;
	color: white;
	text-align: center;
	line-height: 35px;

	margin-right: 3px;
	margin-bottom: 5px;
}

/* If you don't want the footer to be responsive, remove these media queries */

@media (max-width: 880px) {

	.footer-distributed{
		font: bold 14px sans-serif;
	}

	.footer-distributed .footer-left,
	.footer-distributed .footer-center,
	.footer-distributed .footer-right{
		display: block;
		width: 100%;
		margin-bottom: 40px;
		text-align: center;
	}

	.footer-distributed .footer-center i{
		margin-left: 0;
	}

}


</style>
<!-- <section>Footer Example 4</section> -->
<footer class="footer-distributed">

			<div class="footer-left">

				<h3 style="color:black"><b>RS</b><span>MS</span></h3>

				<p class="footer-links">
					<a href="index.php" class="link-1">Home</a>
					
					<a href="about.php">About</a>
				
					<a href="services.php">Services</a>
				
					<a href="price-list.php">Prices</a>
					
					<a href="faq.php">Faq</a>
					
					<a href="contact.php">Contact</a>
				</p>

				<p class="footer-company-name">Relocation & Shifting Management System © 2022</p>
			</div>

			<div class="footer-center">
            <?php
                    $sql = "SELECT * from pages where PageType='contactus'";
                    $query = $dbh->prepare($sql);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);

                    $cnt = 1;
                    if ($query->rowCount() > 0) {
                        foreach ($results as $row) {               ?>
                         
                
        
                <div>
					<i class="fa fa-map-marker"></i>
					<p><b>Address:</b><span style="color:black ;">  <?php echo htmlentities($row->PageDescription); ?></span></p>
				</div>

				<div>
					<i class="fa fa-phone"></i>
					<p><b>Contact: </b> <span style="color:black ;"> <?php echo htmlentities($row->MobileNumber); ?></span></p>
				</div>

				<div>
					<i class="fa fa-envelope"></i>
					<p><b>Mail </b> : <span style="color:black ;"> <?php echo htmlentities($row->Email); ?></span></p>
				</div>
                <?php 
                        }
                    } ?>


			</div>

			<div class="footer-right">

				<p class="footer-company-about">
					<span>About the company</span>
                     We at RSMS shift items in bulk from your source location to requested destination location . Forget the struggle of manually finding the drivers and helpers to help to you move , pack, load and unload.
    				</p>

				<div class="footer-icons">
                
					<a href="#"><img src="images/facebook.png" style="height:20px;width:20px ;"></a>
					<a href="#"><img src="images/instagram.png" style="height:20px;width:20px ;"></a>
					<a href="#"><img src="images/linkedin.png" style="height:20px;width:20px ;"></a>
					<a href="#"><img src="images/github.png" style="height:20px;width:20px ;"></a>

				</div>

			</div>

		</footer>
		<div class="header">
        <div class="container">


            <div class="w3l_header_left">
                <ul>
                    <li><a href="admin/login.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Admin</a></li>
                    <li><a href="driver/driver-login.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Driver</a></li>
                </ul>
            </div>
            <div class="clearfix"> </div>
            <script type="text/javascript" src="js/demo.js"></script>
        </div>
</body>

</html>