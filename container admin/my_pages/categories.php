<title>Admin | Categories</title>
<?php
include("../includes/insert_category_inc.php");
include("../includes/head_inc.php");
$_SESSION["TrackingURL"]=$_SERVER["PHP_SELF"];
confirm_login();
?>


<!--Header beggining-->
<header class="bg-dark text-white py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <i class="fa fa-edit text-success"></i>
                <h1>Manage Categories</h1>
            </div>
        </div>
    </div>
</header>

<!--Header ending-->

<!--Main categories ending-->
<section class="container py-2 mb-4">
    <div class="row">
        <div class="offset-lg-1 col-lg-10" style="min-height: 400px;">
            <?php 
            echo ErrorMessage();
            echo SuccessMessage(); ?>
            <form action="categories.php" method="post" class="">
                <div class="card bg-secondary text-light mb-3">
                    <div class="card-header">
                        <h1>Add New Category</h1>
                    </div>
                    <div class="card-body bg-dark text-white">
                        <div class="form-group">
                            <label for="title">Category Title</label>
                            <input class="form-control" type="text" name="CategoryTitle" id="title" placeholder="title here">
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

            <h2>Existing categories</h2>
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>DateTime</th>
                        <th>Category Name</th>
                        <th>Creator Name</th>
                        <th>Action</th>
                    </tr>
                </thead>



                <?php
                $ConnectingDB;
                $sql = "SELECT * FROM category ORDER BY id DESC";
                $Execute = $ConnectingDB->query($sql);
                $srNo = 0;

                while ($Datarows = $Execute->fetch()) {
                    $CategoryId = $Datarows["id"];
                    $CategoryDate = $Datarows["datetime"];
                    $categoryName = $Datarows["title"];
                    $CreatorName = $Datarows["author"];
                    $srNo++;


                ?>
                    <tbody>
                        <tr>
                            <td><?php echo htmlentities($srNo); ?></td>
                            <td><?php echo htmlentities($CategoryDate); ?></td>
                            <td><?php echo htmlentities($categoryName); ?></td>
                            <td><?php echo htmlentities($CreatorName); ?></td>
                            <td><a class="btn btn-danger" href="DeleteCategory.php?id=<?php echo $CategoryId; ?>">Delete</a></td>
                        </tr>
                    </tbody>
                <?php  } ?>
            </table>

        </div>

    </div>
</section>
<!--Main ending-->
<?php
include("../includes/footer.php");
?>