<?php

error_reporting(0);

include('includes/dbconnection.php');
?>
<nav class="navbar-default navbar-static-side" role="navigation">
    <!-- sidebar-collapse -->
    <div class="sidebar-collapse">
        <!-- side-menu -->
        <ul class="nav" id="side-menu">
            <li>
                <!-- user image section-->
                <div class="user-section">

                    <div class="user-section-inner">
                        <img src="assets/img/admin.jpg" alt="">
                    </div>
                    <div class="user-info">
                        <?php
                        $aid = $_SESSION['rsmsid'];
                        $sql = "SELECT AdminName from  admin where ID=:aid";
                        $query = $dbh->prepare($sql);
                        $query->bindParam(':aid', $aid, PDO::PARAM_STR);
                        $query->execute();
                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                        $cnt = 1;
                        if ($query->rowCount() > 0) {
                            foreach ($results as $row) {               ?>
                                <div><strong><?php echo $row->AdminName; ?></strong></div>
                                <div class="user-text-online">
                                    <span class="user-circle-online btn btn-success btn-circle "></span>&nbsp;Online
                                </div>
                    </div>
            <?php $cnt = $cnt + 1;
                            }
                        } ?>

            </div>

            <li class="selected">
                <a href="dashboard.php"><i class="fa fa-dashboard fa-fw"></i>Dashboard</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Services<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="add-services.php">Add Services</a>
                    </li>
                    <li>
                        <a href="manage-services.php">Manage Services</a>
                    </li>
                </ul>
                <!-- second-level-items -->
            </li>
            <!-- driver section -->
            <li>
                <a href="#"> 🚚 Drivers<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="add_driver.php">Add Drivers</a>
                    </li>
                    <li>
                        <a href="manage_drivers.php">Manage Drivers</a>
                    </li>
                </ul>
            </li>
            <!-- driver section end -->



            <li>
                <a href="#">🖨️ Pages<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="aboutus.php">About Us</a>
                    </li>
                    <li>
                        <a href="contactus.php">Contact Us</a>
                    </li>
                </ul>
                <!-- second-level-items -->
            </li>
            <li>
                <a href="#">☎️ Contact Us Queries<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="unread-queries.php">Unread Queries</a>
                    </li>
                    <li>
                        <a href="read-queries.php">Read Queries</a>
                    </li>
                </ul>
                <!-- second-level-items -->
            </li>
            <li>
                <a href="#">🤵 Booking<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="new-booking.php">New Booking</a>
                    </li>
                    <li>
                        <a href="approved-bookings.php">Approved Bookings</a>
                    </li>
                    <li>
                        <a href="denied-requests.php">Cancelled Bookings</a>
                    </li>
                </ul>
                <!-- second-level-items -->
            </li>
            <li>
                <a href="search-booking.php"><i class="fa fa-search"></i> Search <span class="fa arrow"></span></a>

            </li>
            <li>
                <a href="#">📆 Reports <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="queries-bwdates-report.php">Queries b/w dates</a>
                    </li>
                    <li>
                        <a href="booking-bwdates-report.php">Booking b/w dates</a>
                    </li>
                </ul>
                <!-- second-level-items -->
            </li>

        </ul>
        <!-- end side-menu -->
    </div>
    <!-- end sidebar-collapse -->
</nav>