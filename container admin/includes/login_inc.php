<?php
require_once("DB.php");
include("functions.php");
include("sessions.php");


if (isset($_POST["submit"])) {

    $Username = $_POST["Username"];
    $Password = $_POST["Password"];

    global $ConnectingDB;
    $sql = "select * from admins where username=:UsernamE";

    $stmt = $ConnectingDB->prepare($sql);
    $stmt->bindValue(':UsernamE', $Username);
    $stmt->execute();
    $Found_Account = $stmt->fetch();


    //checking user input
    if (empty($Username)||empty($Password)) {
        $_SESSION["ErrorMessage"] = "All fields must be filled out!";
        Redirect_to("login.php");
    }
     else {
       
        $ConnectingDB;
        $sql = "select * from admins where username=:UsernamE";

        $stmt = $ConnectingDB->prepare($sql);
        $stmt->bindValue(':UsernamE', $Username);
        $stmt->execute();
        $Found_Account = $stmt->fetch();

        if (password_verify($Password, $Found_Account["password"])) {
           $_SESSION["UserId"]=$Found_Account["id"];
           $_SESSION["UserName"]=$Found_Account["username"];
           $_SESSION["AdminName"]=$Found_Account["name"];

           if(isset($_SESSION["TrackingURL"])){
               Redirect_to($_SESSION["TrackingURL"]);
           }else{
               Redirect_to("Dashboard.php");
           }
           $_SESSION["SuccessMessage"]="Welcome ".$_SESSION["AdminName"];
           Redirect_to("Dashboard.php");
       }else{
           $_SESSION["ErrorMessage"]="Incorrect Username/Password";
           Redirect_to("login.php");
       }
    }
}

?>