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
                <h1>Manage Users</h1>
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
            <h2>Inactive Members</h2>
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>No.</th>
                        <th>Username.</th>
                        <th>Name.</th>
                        <th>DateTime.</th>
                        <th>Email.</th>
                        <th>Status.</th>
                        <th>Activate.</th>
                        <th>Deactivate.</th>
                        <th>Delete</th>
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
                    if (strlen($User_name) > 10) {
                        $User_name = substr($User_name, 0, 10) . '..';
                    }


                ?>
                    <tbody>
                        <tr>
                            <td><?php echo htmlentities($sr); ?></td>
                            <td><?php echo htmlentities($Username); ?></td>
                            <td><?php echo htmlentities($User_name); ?></td>
                            <td><?php echo htmlentities($Datetime); ?></td>
                            <td><?php echo htmlentities($Email); ?></td>
                            <td><?php echo htmlentities($Status); ?></td>
                            <td><a class="btn btn-success" href="activate.php?id=<?php echo $Id; ?>">Activate</a></td>
                            <td><a class="btn btn-warning" href="deactivate.php?id=<?php echo $Id; ?>">De-activate</a></td>
                            <td><a class="btn btn-danger" href="delete.php?id=<?php echo $Id; ?>">Delete</a></td>
                        </tr>
                    </tbody>
                <?php  } ?>
            </table>
            <h2>Active Members</h2>
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>No.</th>
                        <th>Username.</th>
                        <th>Name.</th>
                        <th>DateTime.</th>
                        <th>Email.</th>
                        <th>Status.</th>
                        <th>Deactivate.</th>
                        <th>Delete</th>
                        <th>Profile</th>
                    </tr>
                </thead>



                <?php
                $ConnectingDB;
                $sql = "SELECT * FROM users WHERE status='Active' ORDER BY id DESC";
                $Execute = $ConnectingDB->query($sql);
                $srNo = 0;

                while ($Datarows = $Execute->fetch()) {
                    $Id = $Datarows["id"];
                    $Username = $Datarows["username"];
                    $User_name = $Datarows["name"];
                    $Datetime = $Datarows["datetime"];
                    $Email = $Datarows["email"];
                    $Status = $Datarows["status"];
                    $sr++;
                    if (strlen($User_name) > 10) {
                        $User_name = substr($User_name, 0, 10) . '..';
                    }


                ?>
                    <tbody>
                    <tr>
                            <td><?php echo htmlentities($sr); ?></td>
                            <td><?php echo htmlentities($Username); ?></td>
                            <td><?php echo htmlentities($User_name); ?></td>
                            <td><?php echo htmlentities($Datetime); ?></td>
                            <td><?php echo htmlentities($Email); ?></td>
                            <td><?php echo htmlentities($Status); ?></td>
                            <td><a class="btn btn-warning" href="deactivate.php?id=<?php echo $Id; ?>">De-activate</a></td>
                            <td><a class="btn btn-danger" href="delete.php?id=<?php echo $Id; ?>">Delete</a></td>
                            <td><a target="_blank" href="user_profile_admin.php?username=<?php echo $Username; ?>">
                                    <span class="btn btn-info">View Profile</span></a></td>
                        </tr>
                    </tbody>
                <?php  } ?>
            </table>
            <h2>Deactivated Members</h2>
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>No.</th>
                        <th>Username.</th>
                        <th>Name.</th>
                        <th>DateTime.</th>
                        <th>Email.</th>
                        <th>Status.</th>
                        <th>Activate.</th>
                        <th>Delete</th>
                    </tr>
                </thead>



                <?php
                //database connection
                $ConnectingDB;
                //sql query
                $sql = "SELECT * FROM users WHERE status='Deactivated' ORDER BY id DESC LIMIT 0,5";
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
                    if (strlen($User_name) > 10) {
                        $User_name = substr($User_name, 0, 10) . '..';
                    }


                ?>
                    <tbody>
                        <tr>
                            <td><?php echo htmlentities($sr); ?></td>
                            <td><?php echo htmlentities($Username); ?></td>
                            <td><?php echo htmlentities($User_name); ?></td>
                            <td><?php echo htmlentities($Datetime); ?></td>
                            <td><?php echo htmlentities($Email); ?></td>
                            <td><?php echo htmlentities($Status); ?></td>
                            <td><a class="btn btn-success" href="activate.php?id=<?php echo $Id; ?>">Activate</a></td>
                            <td><a class="btn btn-danger" href="delete.php?id=<?php echo $Id; ?>">Delete</a></td>
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