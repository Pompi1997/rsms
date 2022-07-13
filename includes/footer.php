    
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
    </div>
    <div class="agileinfo_copy_right">    
        <div class="container">
            <div class="agileinfo_copy_right_left">
                <p>Relocation and Shifting Management System</p>
            </div>
            <div class="agileinfo_copy_right_right">
                <ul class="social">
                    <li><a class="social-linkedin" href="https://www.linkedin.com/">
                        <i></i>
                        <div class="tooltip"><span>Facebook</span></div>
                        </a></li>
                    <li><a class="social-twitter" href="https://twitter.com">
                        <i></i>
                        <div class="tooltip"><span>Twitter</span></div>
                        </a></li>
                    <!-- <li><a class="social-pinterest" href="https://www.pinterest.com/">
                        <i></i>
                        <div class="tooltip"><span>pinterest+</span></div>
                        </a></li> -->
                    <li><a class="social-facebook" href="https://www.facebook.com/">
                        <i></i>
                        <div class="tooltip"><span>Instagram</span></div>
                        </a></li>
                    <li><a class="social-instagram" href="https://www.instagram.com/">
                        <i></i>
                        <div class="tooltip"><span>Instagram</span></div>
                        </a></li>
                </ul>
                
                <p style="color:white;">Address🏢     <p><?php echo htmlentities($row->PageDescription); ?></p>

                
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="w3l_header">
                <ul>
                    <?php
                    $sql = "SELECT * from pages where PageType='contactus'";
                    $query = $dbh->prepare($sql);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);

                    $cnt = 1;
                    if ($query->rowCount() > 0) {
                        foreach ($results as $row) {               ?>
                            <p>Give a call at       <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span><?php echo htmlentities($row->MobileNumber); ?></p>
                            <p>Mail us  At        <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span><?php echo htmlentities($row->Email); ?></p>
                </ul>
        <?php $cnt = $cnt + 1;
                        }
                    } ?>
            </div>
    </div>
    