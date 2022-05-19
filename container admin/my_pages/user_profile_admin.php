<?php
include("../includes/user_profile_inc.php");
include("../includes/head_inc.php");
$_SESSION["TrackingUrl"] = $_SERVER["PHP_SELF"];
confirm_login();
?>

<!--Header beggining-->
<header class="bg-dark text-white py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>User</h1>
                <hr>
                <h1><i class="fas fa-user text-success"></i>&nbsp;<?php echo $ExistingName; ?></h1>
                <h3 class="lead text-warning"><?php echo $ExistingHeadline; ?></h3>
            </div>
        </div>
    </div>
</header>

<!--Header ending-->

<section class="conteainer py-2 mb-4">
    <?php
    echo ErrorMessage();
    echo SuccessMessage();
    ?>
    <div class="row">
        <div class="col-md-4 offset-1 px-4">
            <img src="../../container admin/images/<?php echo $ExistingImage; ?>" class="d-block img-fluid">
        </div>
        <div class="col-md-6 py-4">
            <dic class="card">
                <div class="card-body">
                    <p class=""><?php echo $ExistingBio; ?></p>
                </div>
            </dic>
        </div>
    </div>
</section>


<?php
include("../includes/footer.php");
?>