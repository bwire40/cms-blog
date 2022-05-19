<?php
include("functions.php");
include("sessions.php");
include("DB.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Page</title>
</head>
<body>
    <header style="padding: 100px;"></header>
    <h1 style="text-align: center; font-size:300%;">You are Lost!</h1>
    <?php 
    Redirect_to("container users/index.php");
    ?>
</body>
</html>