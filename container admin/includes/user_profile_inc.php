<?php
require_once("DB.php");
include("functions.php");
include("sessions.php");


$SearchQueryParameter=$_GET["username"];

$ConnectingDB;
$sql = "SELECT name,headline,bio,image FROM users WHERE username=:userName";
$stmt = $ConnectingDB->prepare($sql);
$stmt->bindValue(':userName',$SearchQueryParameter);
$stmt->execute();
$Result=$stmt->rowCount();

if($Result==1){
    while($DataRows=$stmt->fetch())
    {
        $ExistingName=$DataRows["name"];
        $ExistingBio=$DataRows["bio"];
        $ExistingImage=$DataRows["image"];
        $ExistingHeadline=$DataRows["headline"];
    }
}else{
    $_SESSION["ErrorMessage"]="Bad Request!";
    Redirect_to("Dashboard.php");
}
?>