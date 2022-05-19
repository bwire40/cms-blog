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
                <i class="fas fa-blog text-success"></i>
                <h1>Blog Posts</h1>
            </div>
            <div class="col-lg-3 mb-2">
                <a href="new_post.php" class="btn btn-primary btn-block" style="width: 100%;">
                    <i class="fas fa-edit"> </i>Add New Post
                </a>
            </div>
            <div class="col-lg-3 mb-2">
                <a href="categories.php" class="btn btn-info btn-block" style="width: 100%;">
                    <i class="fas fa-folder-plus"> </i>Add New Category
                </a>
            </div>
            <div class="col-lg-3 mb-2">
                <a href="ManageAdmins.php" class="btn btn-warning btn-block" style="width: 100%;">
                    <i class="fas fa-user-plus"> </i>Add New Admin
                </a>
            </div>
            <div class="col-lg-3 mb-2">
                <a href="Comments.php" class="btn btn-success btn-block" style="width: 100%;">
                    <i class="fas fa-user-check"> </i>Approve Comments
                </a>
            </div>
        </div>
    </div>
</header>
<!--Header section ending-->

<!--section-->

<div class="container py-2 mb-4">
    <?php
    echo ErrorMessage();
    echo SuccessMessage();
    ?>
    <div class="row">
        <div class="col-lg-12" style="overflow: auto;">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>DateTime</th>
                        <th>Author</th>
                        <th>Banner</th>
                        <th>Comments</th>
                        <th>Action</th>
                        <th>Live Preview</th>
                    </tr>
                </thead>

                <?php
                $ConnectingDB;
                $sql = "select * from post";
                $stmt = $ConnectingDB->query($sql);
                $sr = 0;

                while ($Datarows = $stmt->fetch()) {

                    $Id = $Datarows["id"];
                    $Datetime = $Datarows["datetime"];
                    $PostTitle = $Datarows["title"];
                    $Category = $Datarows["category"];
                    $Admin = $Datarows["author"];
                    $Image = $Datarows["image"];
                    $PostDesc = $Datarows["content"];
                    $sr++;

                ?>
                    <tbody>
                        <tr>
                            <td><?php echo $sr; ?></td>
                            <td><?php

                                if (strlen($PostTitle) > 20) {
                                    $PostTitle = substr($PostTitle, 0, 15) . "..";
                                }
                                echo $PostTitle; ?></td>
                            <td><?php

                                if (strlen($Category) > 5) {
                                    $Category = substr($Category, 0, 5) . "..";
                                }
                                echo $Category; ?></td>
                            <td><?php

                                if (strlen($Datetime) > 5) {
                                    $Datetime = substr($Datetime, 0, 5) . "..";
                                }
                                echo $Datetime; ?></td>
                            <td><?php

                                if (strlen($Admin) > 10) {
                                    $Admin = substr($Admin, 0, 6) . "..";
                                }
                                echo $Admin; ?></td>
                            <td><img src="../upload/<?php echo $Image; ?>" width="100%" height="100px"></td>
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
                            <td><a href="EditPost.php?id=<?php echo $Id; ?>"><span class="btn btn-warning">Edit</span></a>
                                <a href="DeletePost.php?id=<?php echo $Id; ?>"><span class="btn btn-danger">Delete</span></a>
                            </td>
                            <td><a href="../../container users/pages_users/fullPost.php?id=<?php echo $Id; ?>" target="_blank"><span class="btn btn-primary">Live Preview</span></a></td>
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