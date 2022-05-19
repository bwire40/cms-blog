<?php
include("../includes/DB.php");
include("../includes/functions.php");
include("../includes/sessions.php");
include("../includes/head_inc.php");
$_SESSION["TRACKINGURL"] = $_SERVER["PHP_SELF"];
?>
<title>About</title>
<!--main content area-->
<div class="container mb-4">
    <div class="row mt-4">
        <!--main area-->
        <div class="col-sm-8">
            <div class="card mb-4">
                <div class="card-body">
                    <h2>My Story</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Aenean vitae nisi lorem. Ut egestas diam et leo egestas efficitur.
                        Proin porttitor lobortis nibh, nec faucibus sapien porta porta.
                        Pellentesque consectetur dui id libero molestie, at lobortis quam interdum.
                        Donec diam leo, congue consectetur augue sit amet, vulputate tristique elit.
                        Aliquam et iaculis urna, vitae dictum magna. Praesent consectetur velit at ullamcorper pulvinar.
                        Mauris sit amet maximus purus, hendrerit vestibulum magna. Nullam eu odio enim.
                        Mauris ullamcorper arcu vel condimentum venenatis. Suspendisse ipsum nibh, euismod ut pellentesque a,
                        venenatis nec velit. Quisque rhoncus porttitor risus. Nunc congue turpis eu lobortis volutpat.
                        Integer ultrices ipsum non augue tincidunt imperdiet. Nulla vel magna et nisi maximus sollicitudin.</p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h2>What i do</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Aenean vitae nisi lorem. Ut egestas diam et leo egestas efficitur.
                        Proin porttitor lobortis nibh, nec faucibus sapien porta porta.
                        Pellentesque consectetur dui id libero molestie, at lobortis quam interdum.
                        Donec diam leo, congue consectetur augue sit amet, vulputate tristique elit.
                        Aliquam et iaculis urna, vitae dictum magna. Praesent consectetur velit at ullamcorper pulvinar.
                        Mauris sit amet maximus purus, hendrerit vestibulum magna. Nullam eu odio enim.
                        Mauris ullamcorper arcu vel condimentum venenatis. Suspendisse ipsum nibh, euismod ut pellentesque a,
                        venenatis nec velit. Quisque rhoncus porttitor risus. Nunc congue turpis eu lobortis volutpat.
                        Integer ultrices ipsum non augue tincidunt imperdiet. Nulla vel magna et nisi maximus sollicitudin.</p>
                </div>
            </div>
        </div>
        <!--main area end-->

        <!--Side area-->
        <?php include("../includes/sidenav.php"); ?>
        <!--Side area end-->

    </div>
</div>