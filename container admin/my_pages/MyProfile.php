<?php
include("../includes/myprofile_inc.php");
include("../includes/head_inc.php");
$_SESSION["TrackingURL"] = $_SERVER["PHP_SELF"];
confirm_login();
?>
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
                    <img style="width: 100%;" src="../images/<?php echo $Existingimage; ?>" class="block img-fluid">
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