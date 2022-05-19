<?php
require_once("../includes/DB.php");
include("../includes/functions.php");
include("../includes/sessions.php");
$_SESSION["TrackingURL"] = $_SERVER["PHP_SELF"];
confirm_login();

if (isset($_GET["id"])) {
    $SearchQueryParameter=$_GET["id"];
    $ConnectingDB;
    $Admin=$_SESSION["AdminName"];
    $sql="UPDATE users set status='Deactivated',approvedby='$Admin' where id='$SearchQueryParameter'";
    $Execute =$ConnectingDB->query($sql);

    if($Execute){
        $_SESSION["SuccessMessage"]="Users Diactivated Successfully!";
        Redirect_to("ManageUsers.php");
    }else{
        $_SESSION["ErrorMessage"]="Something went wrong!";
        Redirect_to("ManageUsers.php");
    }
}
