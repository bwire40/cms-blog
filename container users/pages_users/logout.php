<?php
include("../includes/functions.php");
include("../includes/sessions.php");

unset($_SESSION["USERID"]);
unset($_SESSION["USERNAME"]);
unset($_SESSION["NAME"]);

session_destroy();
Redirect_to("home.php");
?>
