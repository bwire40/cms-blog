<?php
include("../includes/DB.php");
include("../includes/functions.php");
include("../includes/sessions.php");
$_SESSION["TRACKINGURL"] = $_SERVER["PHP_SELF"];
confirm_login();
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://kit.fontawesome.com/662e6aa15f.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!--offline bootsrap css-->
    <link rel="stylesheet" href="../Boostrap/css/bootstrap.min.css">

    <!--offline bootsrap Javascript-->
    <script src="../Boostrap/js/bootstrap.bundle.min.js"></script>
    <script src="../Boostrap/js/bootstrap.min.js"></script>
    <script src="../Boostrap/js/popper.min.js"></script>
    <script src="../Boostrap/js/jquery-3.6.0.min.js"></script>

    <!--offline Fontawesome css-->
    <link rel="stylesheet" href="../fontawesome/css/all.css">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../fontawesome/css/brands.css">
    <link rel="stylesheet" href="../fontawesome/css/brands.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
    <!--offline Fontawesome Script-->
    <script src="../fontawesome/js/all.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
    <!--Custom Css-->
    <link rel="stylesheet" href="../css/style.css">
    <title>Blog</title>
</head>

<body>
    <ul class="navbar-nav ml-auto">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a href="#" class="navbar-brand">MANUTAKES.COM</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapseCms" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapseCms">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a href="home.php" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="About.php" class="nav-link"><i class="fa fa-newspaper text-success"></i> About Us</a>
                        </li>
                        <li class="nav-item">
                            <a href="Blog.php?Page=" class="nav-link"><i class="fa fa-blog text-success"></i> Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="Contact.php" class="nav-link"><i class="fa fa-envelope text-success"></i> Contact Us</a>
                        </li>
                        <li class="nav-item">
                            <a href="Features.php" class="nav-link"><i class="fa fa-comment text-success"></i>
                                Features</a>
                        </li>
                        <li class="nav-item">
                            <a href="logout.php" class="nav-link"><i class="fa fa-user-times text-danger"></i>
                                Logout</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav ml-auto">
                        <form class="row g-2" action="Blog.php" class="form-group">
                            <div class="col-auto form-group">
                                <input class="form-control" type="text" name="search" placeholder="Search Here">
                            </div>
                            <div class="col-auto form-group">
                                <button class="btn btn-primary" name="searchBtn">Go </button>
                            </div>

                        </form>
                    </ul>
                </div>
                <?php
                    if (isset($_SESSION['USERID'])) {
                    ?>
                    <a href="myprofile.php" class="text-warning"><?php echo $_SESSION["USERNAME"]?></a>
                        
                    <?php
                    }
                    ?>

            </div>

        </nav>
        <!--main content area-->
        <div class="container mb-4">
            <div class="row mt-4">
                <!--main area-->
                <div class="col-sm-8">
                    <?php
                    echo ErrorMessage();
                    echo SuccessMessage();
                    ?>
                    <h1>Welcome to ManuTakes.</h1>
                    <h1 class="lead">A simle CMS Blog</h1>


                    <?php
                    //search button
                    $ConnectingDB;

                    if (isset($_GET["searchBtn"])) {

                        $Search = $_GET["search"];
                        $sql = "SELECT * FROM post WHERE datetime LIKE :searcH 
                        OR title LIKE :searcH
                        OR category LIKE :searcH 
                        OR content LIKE :searcH";
                        $stmt = $ConnectingDB->prepare($sql);
                        $stmt->bindValue(':searcH', '%' . $Search . '%');
                        $stmt->execute();
                    } elseif (isset($_GET["Page"])) {
                        $Page = $_GET["Page"];
                        if ($Page == 0 || $Page < 1) {
                            $ShowPostfrom = 0;
                        } else {
                            $ShowPostfrom = ($Page * 3) - 3;
                        }
                        $sql = "select * from post order by id desc limit $ShowPostfrom,3";
                        $stmt = $ConnectingDB->query($sql);
                    } elseif (isset($_GET["category"])) {
                        $Category = $_GET["category"];
                        $sql = "select * from post where category='$Category' order by id desc";
                        $stmt = $ConnectingDB->query($sql);
                    }
                    //default sql query
                    else {
                        $sql = "SELECT * FROM post ORDER BY id DESC limit 0,3";
                        $stmt = $ConnectingDB->query($sql);
                    }

                    while ($Datarows = $stmt->fetch()) {
                        $Id = $Datarows["id"];
                        $Datetime = $Datarows["datetime"];
                        $Title = $Datarows["title"];
                        $Category = $Datarows["category"];
                        $Admin = $Datarows["author"];
                        $Image = $Datarows["image"];
                        $Post = $Datarows["content"];

                    ?>

                        <div class="card mb-3">
                            <img style="height: 550px; width:100%;" class="img-fluid card-img-top" src="../../container admin/upload/<?php echo $Image; ?>">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <?php echo htmlentities($Title); ?>
                                </h4>
                                <small class="text-muted">Category: <span class="text-primary"><a href="Blog.php?category=<?php echo htmlentities($Category); ?>"><?php echo htmlentities($Category); ?></a>
                                    </span> & Written by <a href="Admin_public_Profile.php?username=<?php echo htmlentities($Admin); ?>">
                                        <span class="text-primary"><?php echo htmlentities($Admin); ?></span></a>
                                    On <span class="text-dark"><?php echo htmlentities($Datetime); ?></span></small>
                                <span class="badge rounded-pill bg-dark text-light" style="float: right;">
                                    <?php
                                    echo "Comments " . total_approved_comments($Id);
                                    ?>
                                </span>
                                <hr>
                                <p class="card-text">
                                    <?php
                                    if (strlen($Post) > 200) {
                                        $Post = substr($Post, 0, 200) . "...";
                                    }
                                    echo nl2br($Post); ?></p>
                                <a href="fullPost.php?id=<?php echo $Id; ?>" style="float: right;">
                                    <span class="btn btn-info text-dark">Read More >></span></a>
                            </div>
                        </div>


                    <?php } ?>
                    <!--pagination-->
                    <nav>
                        <ul class="pagination pagination-lg">
                            <!--backward button-->
                            <?php
                            if (isset($Page)) {
                                if ($Page > 1) {
                            ?>
                                    <li class="page-item">
                                        <a href="Blog.php?Page=<?php echo $Page - 1; ?>" class="page-link"> &laquo;</a>
                                    </li>
                            <?php }
                            } ?>

                            <?php
                            $ConnectingDB;
                            $sql = "SELECT COUNT(*) FROM post";
                            $stmt = $ConnectingDB->query($sql);
                            $RowPagination = $stmt->fetch();
                            $TotalPosts = array_shift($RowPagination);

                            $PostPagination = $TotalPosts / 3;
                            $PostPagination = ceil($PostPagination);

                            for ($i = 1; $i <= $PostPagination; $i++) {
                                if (isset($Page)) {
                                    if ($i == $Page) { ?>
                                        <li class="page-item active">
                                            <a href="Blog.php?Page=<?php echo $i; ?>" class="page-link"> <?php echo $i; ?></a>
                                        </li>
                                    <?php
                                    } else {
                                    ?>
                                        <li class="page-item">
                                            <a href="Blog.php?Page=<?php echo $i; ?>" class="page-link"> <?php echo $i; ?></a>
                                        </li>
                            <?php }
                                }
                            } ?>

                            <!--Creating forward button-->
                            <?php
                            if (isset($Page) && !empty($Page)) {
                                if ($Page + 1 <= $PostPagination) {
                            ?>
                                    <li class="page-item">
                                        <a href="Blog.php?Page=<?php echo $Page + 1; ?>" class="page-link"> &raquo;</a>
                                    </li>
                            <?php }
                            } ?>
                        </ul>
                    </nav>

                </div>
                <!--main area end-->


                <!--side section-->
                <?php include("../includes/sidenav.php"); ?>
                <!--side section end-->
            </div>
        </div>

        <!--footer-->
        <?php
        include("../includes/footer.php");

        ?>