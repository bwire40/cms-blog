<?php
include("../includes/DB.php");
include("../includes/functions.php");
include("../includes/sessions.php");
include("../includes/head_inc.php");
$_SESSION["TrackingURL"] = $_SERVER["PHP_SELF"];
confirm_login();
?>
<title>Admin | Posts</title>
<!--Header section beggining-->
<header class="bg-dark text-white py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-2">
                <i class="fas fa-cog display-6 text-info"></i>
                <h1>Dashboard</h1>
            </div>
            <div class="col-lg-2 mb-2">
                <a href="new_post.php" class="btn btn-primary btn-block" style="width: 100%;">
                    <i class="fas fa-edit"> </i>Add New Post
                </a>
            </div>
            <div class="col-lg-3 mb-2">
                <a href="categories.php" class="btn btn-info btn-block" style="width: 100%;">
                    <i class="fas fa-folder-plus"> </i>Add New Category
                </a>
            </div>
            <div class="col-lg-2 mb-2">
                <a href="ManageAdmins.php" class="btn btn-warning btn-block" style="width: 100%;">
                    <i class="fas fa-user-plus"> </i>Add New Admin
                </a>
            </div>
            <div class="col-lg-3 mb-2">
                <a href="Comments.php" class="btn btn-success btn-block" style="width: 100%;">
                    <i class="fas fa-user-check"> </i>Approve Comments
                </a>
            </div>
            <div class="col-lg-2 mb-2">
                <a href="ManageUsers.php" class="btn btn-success btn-block" style="width: 100%;">
                    <i class="fas fa-user-check"> </i>Manage Users
                </a>
            </div>
        </div>
    </div>
</header>
<!--Header section ending-->

<!--section-->

<div class="container py-2 mb-4">

    <div class="row">
        <?php
        echo ErrorMessage();
        echo SuccessMessage();
        ?>
        <div class="col-lg-2" style="overflow: auto;">
            <div class="card text-center bg-dark text-white mb-3">
                <div class="card-body">
                    <h1 class="lead">Posts</h1>
                    <h4 class="display-5">
                        <i class="fab fa-readme text-warning"></i>
                        <?php
                        total_posts();
                        ?>
                    </h4>
                </div>
            </div>

            <div class="card text-center bg-dark text-white mb-3">
                <div class="card-body">
                    <h1 class="lead">categories</h1>
                    <h4 class="display-5">
                        <i class="fas fa-folder text-warning"></i>
                        <?php
                        total_categories();
                        ?>
                    </h4>
                </div>
            </div>
            <div class="card text-center bg-dark text-white mb-3">
                <div class="card-body">
                    <h1 class="lead">Admin(s)</h1>
                    <h4 class="display-5">
                        <i class="fa fa-users text-warning"></i>
                        <?php
                        total_admins();
                        ?>
                    </h4>
                </div>
            </div>
            <div class="card text-center bg-dark text-white mb-3">
                <div class="card-body">
                    <h1 class="lead">Comments</h1>
                    <h4 class="display-5">
                        <i class="fa fa-comments text-warning"></i>
                        <?php
                        total_comments();
                        ?>
                    </h4>
                </div>
            </div>
            <div class="card text-center bg-dark text-white mb-3">
                <div class="card-body">
                    <h1 class="lead">User(s)</h1>
                    <h4 class="display-5">
                        <i class="fa fa-user text-warning"></i>
                        <?php
                        total_users();
                        ?>
                    </h4>
                </div>
            </div>


        </div>

        <div class="col-lg-10" style=" overflow:auto;">
            <h1>Top Posts</h1>
            <table class="table table-striped table-hover table-responsive">
                <thead class="table-dark">
                    <tr>
                        <th>No.</th>
                        <th>Title.</th>
                        <th>DateTime.</th>
                        <th>Author.</th>
                        <th>Comments.</th>
                        <th>Details.</th>
                    </tr>
                </thead>
                <?php
                //database connection
                $ConnectingDB;
                //sql query
                $sql = "SELECT * FROM post ORDER BY id DESC LIMIT 0,5";
                $stmt = $ConnectingDB->query($sql);
                $sr = 0;

                while ($Datarows = $stmt->fetch()) {
                    $Id = $Datarows["id"];
                    $Datetime = $Datarows["datetime"];
                    $PostTitle = $Datarows["title"];
                    $Admin = $Datarows["author"];
                    $sr++;

                ?>
                    <tbody>
                        <tr>
                            <td><?php echo $sr; ?></td>
                            <td><?php
                                echo $PostTitle; ?></td>
                            <td><?php
                                echo $Datetime; ?></td>
                            <td><?php
                                echo $Admin; ?></td>

                            <td>
                                <?php
                                $TotalApprovedComments = total_approved_comments($Id);
                                if ($TotalApprovedComments > 0) {
                                ?>
                                    <span class="badge bg-success">
                                        <?php
                                        echo $TotalApprovedComments;
                                        ?>
                                    </span>
                                <?php  }  ?>
                                </span>
                                <?php
                                $TotaldisapprovedComments = total_disapproved_comments($Id);
                                if ($TotaldisapprovedComments > 0) {
                                ?>
                                    <span class="badge bg-danger">
                                        <?php
                                        echo $TotaldisapprovedComments;
                                        ?>
                                    </span>
                                <?php  }  ?>
                                </span>
                            </td>
                            <td><a target="_blank" href="../../container users/pages_users/fullPost.php?id=<?php echo $Id; ?>">
                                    <span class="btn btn-info">Preview</span></a></td>
                        </tr>
                    </tbody>
                <?php } ?>
            </table>
            <!--Recent Pending Users-->
            <h1>Recent Pending Users</h1>
            <table class="table table-striped table-hover table-responsive">
                <thead class="table-dark">
                    <tr>
                        <th>No.</th>
                        <th>Username.</th>
                        <th>Name.</th>
                        <th>DateTime.</th>
                        <th>Email.</th>
                        <th>Status.</th>
                        <th>Action.</th>
                    </tr>
                </thead>
                <?php
                //database connection
                $ConnectingDB;
                //sql query
                $sql = "SELECT * FROM users WHERE status='Pending' ORDER BY id DESC LIMIT 0,5";
                $stmt = $ConnectingDB->query($sql);
                $sr = 0;

                while ($Datarows = $stmt->fetch()) {
                    $Id = $Datarows["id"];
                    $Username = $Datarows["username"];
                    $User_name = $Datarows["name"];
                    $Datetime = $Datarows["datetime"];
                    $Email = $Datarows["email"];
                    $Status = $Datarows["status"];
                    $sr++;

                ?>
                    <tbody>
                        <tr>
                            <td><?php echo $sr; ?></td>
                            <td><?php
                                echo $Username; ?></td>
                            <td><?php
                                echo $User_name; ?></td>
                            <td><?php
                                echo $Datetime; ?></td>
                            <td><?php
                                echo $Email; ?></td>
                            <td><?php
                                echo $Status; ?></td>
                            <td><a target="_blank" href="user_profile_admin.php?username=<?php echo $Username; ?>">
                                    <span class="btn btn-info">View Profile</span></a></td>
                        </tr>
                    </tbody>
                <?php } ?>
            </table>
        </div>
    </div>

</div>
<?php
include("../includes/footer.php");
?>