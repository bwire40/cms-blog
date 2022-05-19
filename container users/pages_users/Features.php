<?php
include("../includes/DB.php");
include("../includes/functions.php");
include("../includes/sessions.php");
include("../includes/head_inc.php");
$_SESSION["TRACKINGURL"] = $_SERVER["PHP_SELF"];
confirm_login();
?>
<title>Features</title>
<!--main content area-->
<div class="container mb-4">
    <div class="row mt-4">
         <!--main area-->
         <div class="col-sm-8">
             <h4>Features</h4>
         </div>
         <!--main area end-->

             <!--Side area-->
             <?php include("../includes/sidenav.php");?>
             <!--Side area end-->
         
    </div>
</div>
