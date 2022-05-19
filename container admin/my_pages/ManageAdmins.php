<title>Admin | Admins</title>
<?php
include("../includes/insert_admin_inc.php");
include("../includes/head_inc.php");
//$_SESSION["TrackingURL"]=$_SERVER["PHP_SELF"];
//confirm_login();
?>
<title>Admin page</title>


<!--Header beggining-->
<header class="bg-dark text-white py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <i class="fas fa-user text-success display-4"></i>
                <h1>Manage Admins</h1>
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
            <form action="ManageAdmins.php" method="post" class="">
                <div class="card bg-secondary text-light mb-3">
                    <div class="card-header">
                        <h1>Add New Admin</h1>
                    </div>
                    <div class="card-body bg-dark text-white">
                        <div class="form-group">
                            <label for="title">Username:</label>
                            <input class="form-control" type="text" name="username" id="username">
                        </div>
                        <div class="form-group">
                            <label for="title">Name:</label>
                            <input class="form-control" type="text" name="name" id="Name">
                            <small class="text-warning text-muted">Optional</small>
                        </div>
                        <div class="form-group">
                            <label for="title">Password:</label>
                            <input class="form-control" type="password" name="password" id="password">
                        </div>
                        <div class="form-group">
                            <label for="title">Confirm Password:</label>
                            <input class="form-control" type="password" name="confirmpassword" id="confirnpassword">
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
            <h2>Existing Admins</h2>
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>DateTime</th>
                        <th>Username</th>
                        <th>Admin Name</th>
                        <th>Added By</th>
                        <th>Action</th>
                    </tr>
                </thead>



                <?php
                $ConnectingDB;
                $sql = "SELECT * FROM admins ORDER BY id DESC";
                $Execute = $ConnectingDB->query($sql);
                $srNo = 0;

                while ($Datarows = $Execute->fetch()) {
                    $AdminId = $Datarows["id"];
                    $DateTime = $Datarows["datetime"];
                    $Username = $Datarows["username"];
                    $AdminName = $Datarows["aname"];
                    $AddedBy = $Datarows["addedby"];
                    $srNo++;


                ?>
                    <tbody>
                        <tr>
                            <td><?php echo htmlentities($srNo); ?></td>
                            <td><?php echo htmlentities($DateTime); ?></td>
                            <td><?php echo htmlentities($Username); ?></td>
                            <td><?php echo htmlentities($AdminName); ?></td>
                            <td><?php echo htmlentities($AddedBy); ?></td>
                            <td><a class="btn btn-danger" href="DeleteAdmin.php?id=<?php echo $AdminId; ?>">Delete</a></td>
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