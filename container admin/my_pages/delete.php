<?php
require_once("../includes/DB.php");
include("../includes/functions.php");
include("../includes/sessions.php");
$_SESSION["TrackingURL"] = $_SERVER["PHP_SELF"];
confirm_login();

if (isset($_GET["id"])) {

    $SearchQueryParameter=$_GET["id"];
    $ConnectingDB;
    $sql="DELETE FROM users WHERE id='$SearchQueryParameter'";
    $Execute =$ConnectingDB->query($sql);

    if($Execute){
        $_SESSION["SuccessMessage"]="User Deleted Successfully!";
        Redirect_to("ManageUsers.php");
    }else{
        $_SESSION["ErrorMessage"]="Something went wrong! Try Again!";
        Redirect_to("ManageUsers.php");
    }
}
