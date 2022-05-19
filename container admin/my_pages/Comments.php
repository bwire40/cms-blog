<?php
include("../includes/DB.php");
include("../includes/functions.php");
include("../includes/sessions.php");
include("../includes/head_inc.php");
$_SESSION["TrackingURL"] = $_SERVER["PHP_SELF"];
confirm_login(); ?>

<!--Header beggining-->
<header class="bg-dark text-white py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <i class="fas fa-comments text-success display-5"></i>
                <h1>Manage Comments</h1>
            </div>
        </div>
    </div>
</header>
<!--Header ending-->

<!--Secion start-->
<section class="container py-2 mb-4">
    <div class="row" style="min-height: 30px; overflow:auto;">
    <?php
                echo ErrorMessage();
                echo SuccessMessage();
                ?>
        <div class="col-lg-12" style="min-height: 400px;">
            <h2>Unapproved Comments</h2>
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>DateTime</th>
                        <th>Name</th>
                        <th>Comment</th>
                        <th>Approve</th>
                        <th>Delete</th>
                        <th>Details</th>
                    </tr>
                </thead>



                <?php
                $ConnectingDB;
                $sql = "SELECT * FROM comments WHERE status='OFF' ORDER BY id DESC";
                $Execute = $ConnectingDB->query($sql);
                $srNo = 0;

                while ($Datarows = $Execute->fetch()) {
                    $CommentId = $Datarows["id"];
                    $Datetime = $Datarows["datetime"];
                    $CommentorName = $Datarows["name"];
                    $CommentContent = $Datarows["comment"];
                    $CommentPostId = $Datarows["post_id"];
                    $srNo++;
                    if (strlen($CommentorName) > 10) {
                        $CommentorName = substr($CommentorName, 0, 10) . '..';
                    }
                    if (strlen($Datetime) > 10) {
                        $CommentorName = substr($CommentorName, 0, 10) . '..';
                    }


                ?>
                    <tbody>
                        <tr>
                            <td><?php echo htmlentities($srNo); ?></td>
                            <td><?php echo htmlentities($Datetime); ?></td>
                            <td><?php echo htmlentities($CommentorName); ?></td>
                            <td><?php echo htmlentities($CommentContent); ?></td>
                            <td><a class="btn btn-success" href="ApproveComments.php?id=<?php echo $CommentId; ?>">Approve</a></td>
                            <td><a class="btn btn-danger" href="DeleteComments.php?id=<?php echo $CommentId; ?>">Delete</a></td>
                            <td><a class="btn btn-primary" target="_blank" href="../../container users/pages_users/fullPost.php?id=<?php echo $CommentPostId; ?>">Preview</a></td>
                        </tr>
                    </tbody>
                <?php  } ?>
            </table>
            <h2>Approved Comments</h2>
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>DateTime</th>
                        <th>Name</th>
                        <th>Comment</th>
                        <th>Dis-Approve</th>
                        <th>Delete</th>
                        <th>Details</th>
                    </tr>
                </thead>



                <?php
                $ConnectingDB;
                $sql = "SELECT * FROM comments WHERE status='ON' ORDER BY id DESC";
                $Execute = $ConnectingDB->query($sql);
                $srNo = 0;

                while ($Datarows = $Execute->fetch()) {
                    $CommentId = $Datarows["id"];
                    $Datetime = $Datarows["datetime"];
                    $CommentorName = $Datarows["name"];
                    $CommentContent = $Datarows["comment"];
                    $CommentPostId = $Datarows["post_id"];
                    $srNo++;
                    if (strlen($CommentorName) > 10) {
                        $CommentorName = substr($CommentorName, 0, 10) . '..';
                    }
                    if (strlen($Datetime) > 10) {
                        $CommentorName = substr($CommentorName, 0, 10) . '..';
                    }


                ?>
                    <tbody>
                        <tr>
                            <td><?php echo htmlentities($srNo); ?></td>
                            <td><?php echo htmlentities($Datetime); ?></td>
                            <td><?php echo htmlentities($CommentorName); ?></td>
                            <td><?php echo htmlentities($CommentContent); ?></td>
                            <td><a class="btn btn-warning" href="DisApproveComments.php?id=<?php echo $CommentId; ?>">Disapprove</a></td>
                            <td><a class="btn btn-danger" href="DeleteComments.php?id=<?php echo $CommentId; ?>">Delete</a></td>
                            <td><a class="btn btn-primary" target="_blank" href="../../container users/pages_users/fullPost.php?id=<?php echo $CommentPostId; ?>">Preview</a></td>
                        </tr>
                    </tbody>
                <?php  } ?>
            </table>
        </div>
    </div>
</section>
<!--Section ending-->

<!--Footer Start-->
<?php
include("../includes/footer.php");
?>
<!--Footer ending-->