<?php
include("../includes/insert_comments_inc.php");
include("../includes/head_inc.php");
$_SESSION["TRACKINGURL"] = $_SERVER["PHP_SELF"];
confirm_login();
?>
<title>Full Post</title>
    <!--main content area-->
    <div class="container mb-4">
        <div class="row mt-4">

            <!--main area-->
            <div class="col-sm-8">
                <?php
                echo ErrorMessage();
                echo SuccessMessage();
                ?>
                <?php
                //search button
                $ConnectingDB;

                //default sql query
                $PostIdFromUrl = $_GET["id"];
                if (!isset($PostIdFromUrl)) {
                    $_SESSION["ErrorMessage"] = "Bad request";
                    Redirect_to('Blog.php');
                }
                $sql = "SELECT * FROM post WHERE id='$PostIdFromUrl'";
                $stmt = $ConnectingDB->query($sql);
                $Result=$stmt->rowCount();
                if($Result!=1){
                    $_SESSION["ErrorMessage"] = "Bad request";
                    Redirect_to('Blog.php');
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
                        <img class="img-fluid card-img-top" src="../../container admin/upload/<?php echo $Image; ?>">
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
                        echo "Comments ".total_approved_comments($Id);
                        ?>
                        </span>
                            <hr>
                            <p class="card-text">
                                <?php
                                echo nl2br($Post); ?></p>
                        </div>
                    </div>


                <?php } ?>
                <!--fetching existing comments-->
                <h2 class="text-warning">Comments</h2>
                <br>
                <?php
                $ConnectingDB;
                $sql = "select * from comments where post_id='$searchQueryParameter' and status='ON'";
                $stmt = $ConnectingDB->query($sql);
                while ($Datarows = $stmt->fetch()) {
                    $CommentDateTime = $Datarows['datetime'];
                    $CommentorName = $Datarows['name'];
                    $CommentContent = $Datarows['comment'];


                ?>
                    <div>

                        <div class="media" style="background-color:#fcfcfc; padding:12px;">
                            <span><i class="fas fa-user display-5"></i></span>
                            <div class="media-body">
                                <h5 class="lead" style="color: orange;">by <b><?php echo $CommentorName; ?></b></h5>
                                <p class="small">on <?php echo $CommentDateTime; ?></p>
                                <p class="small"><?php echo $CommentContent; ?></p>
                            </div>
                        </div>
                    </div>
                    <hr>
                <?php } ?>
                <!--fetching existing comments end-->
                <!--commenting area start-->
                <div class="">
                    <form action="fullPost.php?id=<?php echo $searchQueryParameter; ?>" method="POST">
                        <div class="card">
                            <div class="card-header">
                                <h5>Share your Thoughts</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group mb-2">
                                </div>
                                <div class="form-group mb-2">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text pt-2 pb-3">
                                                <i class="fas fa-envelope"></i>
                                            </span>
                                        </div>
                                        <input type="email" name="commenterEmail" placeholder="Email" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <textarea class="form-control" name="comment" id="comments" cols="30" rows="5"></textarea>
                                </div>
                                <div>
                                    <button type="submit" style="width: 100%;" name="Submit" class="btn btn-primary">Submit</button>
                                </div>

                            </div>
                        </div>
                    </form>

                </div>
                <!--commenting area ends-->


            </div>
            <!--main area end-->


            <!--side section-->
            <?php include("../includes/sidenav.php");?>
            <!--side section end-->
        </div>
    </div>

    <!--footer-->
    <?php
    include("../includes/footer.php");

    ?>