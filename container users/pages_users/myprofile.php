<?php
include("../includes/myprofile_inc.php");
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
    <title>My Profile</title>
</head>

<body>
    <!--Nav Bar begining-->
    <div style="height: 10px; background-color: #27aae1;"></div>

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
            
        </div>

    </nav>
<title>ManuTakes | My Profile</title>
<!--Header beggining-->
<header class="bg-dark text-white py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <i class="fas fa-user display-5 text-success mr-2"></i>
                <h1 class="text-warning"><?php echo "@" . $ExistingUsername; ?></h1>
                <h5 class="text-info lead"><?php echo $ExistingHeadline; ?></h5>
            </div>
        </div>
    </div>
</header>

<!--Header ending-->


<!--Main categories ending-->
<section class="container py-2 mb-4">
    <div class="row">
        <!--left  area-->
        <div class="col-md-5">
            <div class="card ">
                <div class="card-header bg-dark text-light">
                    <h3 class=""><?php echo $ExistingName; ?></h3>
                </div>
                <div class="card-body">
                    <img src="../img/<?php echo $Existingimage; ?>" class="block img-fluid">
                    <div>
                        <p><?php echo $ExistingBio; ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-7" style="min-height: 400px;">
            <?php echo ErrorMessage();
            echo SuccessMessage(); ?>
            <form action="MyProfile.php" method="post" class="" enctype="multipart/form-data">
                <div class="card bg-dark  text-light mb-3">
                    <div class="card-header bg-secondary text-light">
                        <h4>Edit Profile</h4>
                    </div>
                    <div class="card-body">

                        <div class="form-group mb-2">

                            <input class="form-control" type="text" name="name" id="name" placeholder="You Name here">
                            <small class="text-muted">Add a professional headline like, 'Engineer' at XYZ.</small>
                            <span class="text-danger">Not More than 50 characters</span>
                        </div>
                        <div class="form-group mb-2">
                            <input class="form-control" type="text" name="headline" id="name" placeholder="Headlines">
                        </div>
                        <div class="form-group mb-2">
                            <label for="imageSelect">Select Image</label>
                            <input type="file" class="form-control" name="image" id="imageSelect">
                        </div>
                        <div class="form-group mb-2">
                            <textarea name="bio" id="Bio" cols="30" rows="6" placeholder="Bio" class="form-control"></textarea>
                        </div>


                        <div class="row">
                            <div class="col-lg-6">
                                <a href="dashboard.php" class="btn btn-warning btn-block py-2 my-3 mb-0" style="width: 100%;"><i class="fas fa-arrow-left"></i>Back to Dashboard</a>

                            </div>
                            <div class="col-lg-6">
                                <button type="submit" name="submit" class="btn btn-success btn-block py-2 my-3 mb-0" style="width: 100%;"><i class="fa fa-check"></i>Save Profile</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>

    </div>
</section>
<!--Main ending-->
<?php
include("../includes/footer.php");
?>