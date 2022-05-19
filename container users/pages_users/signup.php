<?php
include("../includes/signup_inc.php");
?>
<!DOCTYPE html>
<html lang="en">

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
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../fontawesome/css/brands.css">
    <link rel="stylesheet" href="../fontawesome/css/brands.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
    <!--offline Fontawesome Script-->
    <script src="../fontawesome/js/all.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
    <!--Custom Css-->
    <link rel="stylesheet" href="../css/style.css">
    <title>ManuTakes | Sign Up</title>

    <style>
        /**{
             border: 1px solid #aaa;
         }*/
        body {
            background-image: url("../img/forestbridge.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
    </style>
</head>

<body>
    <div class="container mt-5 custom_container py-5 px-5">
        <div class="row">
            <div class="col-md-12">
            <?php
    echo ErrorMessage();
    echo SuccessMessage();
    ?>
                <div class="row mb-4">
                    <div class="col-md-12">
                        <h1 class="text-light">Sign up</h1>
                        <p class="text-light">Already have an account? <a href="login.php" class="heading">Login</a></p>
                    </div>
                </div>
                <form action="signup.php" method="POST">
                    <div class="container_row">
                        <div class="col-25">
                            <label class="form_heading text-light" for="username"><i class="fa fa-user text-success display-6"></i>&nbsp;&nbsp; Username</label>
                        </div>
                        <div class="col-75">
                            <input type="text" name="username" id="username" required>
                        </div>
                    </div>
                    <div class="container_row">
                        <div class="col-25">
                            <label class="form_heading text-light" for="fname"><i class="fa fa-user text-success display-6"></i> &nbsp;&nbsp;Full Name</label>
                        </div>
                        <div class="col-75">
                            <input type="text" name="name" id="fname" required>
                        </div>
                    </div>
                    <div class="container_row">
                        <div class="col-25">
                            <label class="form_heading text-light" for="email"><i class="fa fa-envelope text-success display-6"></i> &nbsp;&nbsp;Email</label>
                        </div>
                        <div class="col-75">
                            <input type="email" name="email" id="email" required>
                        </div>
                    </div>
                    <div class="container_row">
                        <div class="col-25">
                            <label class="form_heading text-light" for="pass"><i class="fa fa-lock text-success display-6"></i> &nbsp;&nbsp;Password</label>
                        </div>
                        <div class="col-75">
                            <input type="password" name="pass" id="pass" required>
                        </div>
                    </div>
                    <div class="container_row">
                        <div class="col-25">
                            <label class="form_heading text-light" for="confirmpassword"><i class="fa fa-lock text-success display-6"></i> &nbsp;&nbsp;Confirm Password</label>
                        </div>
                        <div class="col-75">
                            <input type="password" name="confirmpassword" id="confirmpassword" required>
                        </div>
                    </div>
                    <div class="container_row">
                        <div class="col-25">

                        </div>
                        <div class="col-75">
                            <button class="btn btn-primary btn-hover" name="submit" style="width: 100%; font-size:20px;">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>