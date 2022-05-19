<?php
include("../includes/login_inc.php");

?>
<?php
if(isset($_SESSION["UserId"])){
    Redirect_to("Dashboard.php");
}
?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/662e6aa15f.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!--offline bootsrap css-->
    <link rel="stylesheet" href="../Boostrap/css/bootstrap.min.css">

    <!--offline bootsrap Javascript-->
    <script src="../Boostrap/js/bootstrap.bundle.min.js"></script>
    <script src="../Boostrap/js/bootstrap.min.js"></script>
    <script src="../Boostrap/js/popper.min.js"></script>
    <script src="../Boostrap/js/jquery-3.6.0.min.js"></script>

    <!--offline Fontawesome css-->
    <link rel="stylesheet" href="../fontawesome/css/all.css">
    <!--offline Fontawesome Script-->
    <script src="../fontawesome/js/all.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
    <title>Welcome | Admin</title>
</head>

<body>
    <!--Nav Bar begining-->
    <div style="height: 10px; background-color: #27aae1;"></div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a href="#" class="navbar-brand">MANUTAKES.COM</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapseCms" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapseCms">
            </div>
        </div>
    </nav>

    <!--Nav Bar ending-->
    <section class="container mb-4 mt-4" style="padding: 12px;min-height:450px;">
        <div class="row">
            <div class=" offset-sm-3 col-sm-6">
                <?php
                echo ErrorMessage();
                echo SuccessMessage();
                ?>
                <div class="card bg-dark text-light">
                    <div class="card-header">
                        <h4 style="text-align:center;padding:12px">Welcome Admin</h4>
                    </div>
                    <div class="card-body bg-secondary" style="padding: 20px;">
                        <form action="login.php" method="POST">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-info pt-2 pb-3">
                                            <i class="fas fa-user"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" name="Username" id="username">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <div class="input-group mb-2 pt-2 pb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text  bg-info pt-2 pb-3">
                                            <i class="fas fa-lock"></i>
                                        </span>
                                    </div>
                                    <input type="password" class="form-control" name="Password" id="password">
                                </div>
                            </div>
                            <input type="submit" name="submit" class="btn btn-info" style="width: 100%;" value="Login">
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </section>

    <!--Footer beggining-->
    <?php include("../includes/footer.php"); ?>
    <!--Footer ending-->