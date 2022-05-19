<?php
include("../includes/functions.php");
include("../includes/sessions.php");
include("../includes/head_inc.php");
$_SESSION["TRACKINGURL"] = $_SERVER["PHP_SELF"];
?>
<title>ManuTakes</title>
<style>
    header {
        background-image: url("../img/forestbridge.jpg");
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }

    .header-style {
        padding: 250px;
    }

    header h1 {
        padding: 32px;
        background-color: rgba(0, 0, 0, 0.3);
        border: 3px solid white;
    }
</style>
<!--Header Section-->
<header class="header-style text-center text-white">
    <h1>Welcome to ManuTakes</h1>
</header>

<div class="container" style="padding: 12px;">
    <div class="row">
        <div class="col-md-3 py-4 px-4">
            <h2 class="display-6">"We blog for you"</h2>
        </div>
        <div class="col-md-9">
            <p class="paragraph py-4 px-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean vitae nisi lorem.
                Ut egestas diam et leo egestas efficitur. Proin porttitor lobortis nibh, nec faucibus
                sapien porta porta. Pellentesque consectetur dui id libero molestie, at lobortis quam i
                nterdum. Donec diam leo, congue consectetur augue sit amet, vulputate tristique elit.
                Aliquam et iaculis urna, vitae dictum magna. Praesent consectetur velit at ullamcorper pulvinar.
                Mauris sit amet maximus purus, hendrerit vestibulum magna. Nullam eu odio enim. Mauris ullamcor
                per arcu vel condimentum venenatis. Suspendisse ipsum nibh, euismod ut pellentesque a, venen
                atis nec velit. Quisque rhoncus porttitor risus. Nunc congue turpis eu lobortis volutpat.
                Integer ultrices ipsum non augue tincidunt imperdiet. Nulla vel magna et nisi maximus
                sollicitudin.</p>
        </div>
    </div>
    <hr class="text-center">
    <div class="row">
        <h2 class="text-center">My Works</h2>
        <div class="col-md-4 py-4">
            <div class="card" style="border: none;">
                <img src="../img/daniel-josef-AMssSjUaTY4-unsplash.jpg" alt="">
                <div class="card-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean vitae nisi lorem.
                        Ut egestas diam et leo egestas efficitur. Proin porttitor lobortis nibh, nec faucibus
                        sapien porta porta.</p>
                    <a href="#"><button class="btn btn-info">More >></button></a>
                </div>
            </div>
        </div>
        <div class="col-md-4 py-4">
            <div class="card" style="border: none;">
                <img src="../img/austin-distel-tLZhFRLj6nY-unsplash.jpg" alt="">
                <div class="card-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean vitae nisi lorem.
                        Ut egestas diam et leo egestas efficitur. Proin porttitor lobortis nibh, nec faucibus
                        sapien porta porta.</p>
                    <a href="#"><button class="btn btn-info">More >></button></a>
                </div>
            </div>
        </div>
        <div class="col-md-4 py-4">
            <div class="card" style="border: none;">
                <img src="../img/adem-ay-Tk9m_HP4rgQ-unsplash.jpg" alt="">
                <div class="card-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean vitae nisi lorem.
                        Ut egestas diam et leo egestas efficitur. Proin porttitor lobortis nibh, nec faucibus
                        sapien porta porta.</p>
                    <a href="#"><button class="btn btn-info">More >></button></a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Blogs -->




<section id="blogs">
    <div class="container py-4">
        <div class="row">
            <div class="col-md-6 offset-3">
                <h4 class="font-rubik font-size-20">Latest Blogs</h4>
                <hr>


                <?php
                $sql = "SELECT * FROM post ORDER BY id DESC LIMIT 0,5";
                $stmt = $ConnectingDB->query($sql);


                while ($Datarows = $stmt->fetch()) {
                    $Id = $Datarows["id"];
                    $Datetime = $Datarows["datetime"];
                    $Title = $Datarows["title"];
                    $Category = $Datarows["category"];
                    $Admin = $Datarows["author"];
                    $Image = $Datarows["image"];
                    $Post = $Datarows["content"];
                ?>
                    <div class="owl-carousel owl-theme">
                        <div class="item mb-4">
                            <div class="card border-0 font-rale mr-5">
                                <h5 class="card-title font-size-16"><?php echo htmlentities($Title); ?></h5>
                                <img src="../../container admin/upload/<?php echo $Image; ?>" alt="cart image" class="card-img-top">
                                <p class="card-text font-size-14 text-black-50 py-1">
                                    <?php
                                    if (strlen($Post) > 50) {
                                        $Post = substr($Post, 0, 50) . "...";
                                    }
                                    echo nl2br($Post); ?>
                                </p>
                                <a href="fullPost.php?id=<?php echo $Id; ?>" style="float: right;">
                                    <span class="btn btn-info text-dark">Read More >></span></a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<!-- !Blogs -->

<!--footer area-->
<?php include("../includes/footer.php");
?>
<!--footer area end-->