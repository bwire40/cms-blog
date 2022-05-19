<?php
require_once("../includes/DB.php");
include("../includes/functions.php");
include("../includes/sessions.php");
$_SESSION["TrackingURL"] = $_SERVER["PHP_SELF"];
confirm_login();

if (isset($_GET["id"])) {

    $SearchQueryParameter=$_GET["id"];
    $ConnectingDB;
    $sql="DELETE FROM category WHERE id='$SearchQueryParameter'";
    $Execute =$ConnectingDB->query($sql);

    if($Execute){
        $_SESSION["SuccessMessage"]="Category Deleted Successfully!";
        Redirect_to("categories.php");
    }else{
        $_SESSION["ErrorMessage"]="Something went wrong! Try Again!";
        Redirect_to("categories.php");
    }
}
