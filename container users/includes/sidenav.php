
<div class="col-sm-4">
    <div class="card mt-4">
        <div class="card body">
            <img src="../img/austin-distel-tLZhFRLj6nY-unsplash.jpg" class="img-fluid d-block mb-3">
            <div class="text-center px-4">
                <p>Lorem ipsum dolor sit amet, consectetur
                    adipiscing elit. Aenean vitae nisi lorem. Ut eges
                    tas diam et leo egestas efficitur. Proin porttito
                    r lobortis nibh, nec faucibus sapien porta port
                    a. Pellentesque consectetur dui id libero molestie, at lobortis q
                    uam interdum. Donec diam leo, congue consectetur augue sit amet,
                    vulputate tristique elit. Aliquam et iaculis urna, vitae dictum magna.
                    Praesent consectetur velit at ullamcorper pulvinar. Mauris sit amet maximus pur
                    us, hendrerit vestibulum magna. Nullam eu odio enim. Mauris ullamcorper arcu vel
                    condimentum venenatis. Suspendisse ipsum nibh, euismod ut pellentesque a, venenatis
                    nec velit. Quisque rhoncus porttitor risus. Nunc congue turpis eu lobortis volutpat. Integer ultrices ipsum non
                    augue tincidunt imperdiet. Nulla vel magna et nisi
                    maximus sollicitudin.</p>
            </div>

        </div>
    </div>
    <div class="card mt-4">
        <div class="card-header bg-dark text-light">
            <h2 class="lead">Sign Up!</h2>
        </div>
        <div class="card-body">
            <a href="signup.php"><button style="width: 100%;" class="btn btn-success btn-block text-center text-white mb-4">Join the Forum</button></a>
            <a href="login.php"><button style="width: 100%;" class="btn btn-danger btn-block text-center text-white mb-4">Login</button></a>
            
        </div>

    </div>
    <br>
    <div class="card">
        <div class="card-header text-light bg-dark">
            <h2 class="lead">Categories</h2>
        </div>
        <div class="card-body">
            <?php
            $ConnectingDB;
            $sql = "select * from category order by id desc";
            $stmt = $ConnectingDB->query($sql);
            while ($Datarows = $stmt->fetch()) {
                $CategoryId = $Datarows["id"];
                $CategoryName = $Datarows["title"];

            ?>
                <a href="Blog.php?category=<?php echo $CategoryName; ?>"><span class="heading">
                        <?php echo $CategoryName; ?>
                    </span></a>
                <br>
            <?php } ?>
        </div>
    </div>

    <!--recent post area-->
    <br>
    <div class="card">
        <div class="card-header bg-info text-white">
            <h2 class="lead">Recent Posts</h2>
        </div>
        <div class="card-body">
            <?php
            $ConnectingDB;
            $sql = "SELECT * FROM post ORDER BY id DESC LIMIT 0,5";
            $stmt = $ConnectingDB->query($sql);
            while ($Datarows = $stmt->fetch()) {
                $PostId = $Datarows["id"];
                $PostTitle = $Datarows["title"];
                $DateTime = $Datarows["datetime"];
                $Image = $Datarows["image"];


            ?>
                <div class="media">
                    <img class="img-fluid align-self-start" style="width: 90px; height:94px;" src="../../container admin/upload/<?php echo htmlentities($Image); ?>">
                </div>
                <div class="media-body ml-2">
                    <a href="fullPost.php?id=<?php echo htmlentities($PostId); ?>">
                        <h6 class="lead">
                            <?php echo $PostTitle; ?>
                        </h6>
                    </a>
                    <p class="small"><?php echo htmlentities($DateTime); ?></p>
                </div>
            <?php  } ?>
        </div>
    </div>

</div>
