<title>Admin | Posts</title>
<?php
include("../includes/insert_post_inc.php");
include("../includes/head_inc.php");
$_SESSION["TrackingURL"]=$_SERVER["PHP_SELF"];
confirm_login();
?>

    <!--Header beggining-->
    <header class="bg-dark text-white py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <i class="fas fa-edit text-success"></i>
                    <h1>Add new Post</h1>
                </div>
            </div>
        </div>
    </header>

    <!--Header ending-->

    <!--Main categories ending-->
    <section class="container py-2 mb-4">
        <div class="row">
            <div class="offset-lg-1 col-lg-10" style="min-height: 400px;">
                <?php echo ErrorMessage();
                echo SuccessMessage(); ?>
                <form action="new_post.php" method="post" class="" enctype="multipart/form-data">
                    <div class="card bg-secondary text-light mb-3">
                        <div class="card-body bg-dark text-white">

                            <div class="form-group mb-2">
                                <label for="PostTitle">Post Title</label>
                                <input class="form-control" type="text" name="PostTitle" id="title" placeholder="Title here">
                            </div>

                            <div class="form-group mb-2">
                                <label for="category-title">Choose Category</label>
                                <select class="form-control" name="category" id="categoryTitle">

                                    <?php
                                    //fetching all the categories
                                    $ConnectingDB;
                                    $sql = "select id,title from category";
                                    $stmt = $ConnectingDB->query($sql);

                                    while ($Datarows = $stmt->fetch()) {
                                        $Id = $Datarows["id"];
                                        $CategoryName = $Datarows["title"];

                                    ?>
                                        <option><?php echo $CategoryName; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group mb-2">
                                <label for="imageSelect">Select Image</label>
                                <input type="file" class="form-control" name="image" id="imageSelect">
                            </div>

                            <div class="form-group mb-2">
                                <label for="postDescription">Post:</label>
                                <textarea name="content" id="postDescription" cols="30" rows="6" class="form-control"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <a href="dashboard.php" class="btn btn-warning btn-block py-2 my-3 mb-0" style="width: 100%;"><i class="fas fa-arrow-left"></i>Back to Dashboard</a>

                                </div>
                                <div class="col-lg-6">
                                    <button type="submit" name="submit" class="btn btn-success btn-block py-2 my-3 mb-0" style="width: 100%;"><i class="fa fa-check"></i>Publish</button>
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