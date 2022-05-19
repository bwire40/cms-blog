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
    <!--javascript-->
    <script src="../js/myscripts.js"></script>
</head>

<body>
    <!--Nav Bar begining-->

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
                    <?php
                    if (isset($_SESSION['USERNAME'])) {
                    ?>

                        <li class="nav-item">
                            <a href="../pages_users/logout.php" class="nav-link"><i class="fa fa-user-times text-danger"></i>
                                Logout</a>
                        </li>

                    <?php
                    } else {
                    ?>
                        <li class="nav-item">
                            <a href="../pages_users/Login.php" class="nav-link"><i class="fa fa-user text-info"></i>
                                Login</a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
            <?php
            if (isset($_SESSION['USERID'])) {
            ?>

                <a href="myprofile.php" class="text-warning">_<?php echo $_SESSION["USERNAME"] ?>
                    <img src="../img/user.png" class="rounded-pill" style="width: 50px;" alt="">
                </a>

            <?php
            }
            ?>

        </div>

    </nav>