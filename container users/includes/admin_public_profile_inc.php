<?php
require_once("DB.php");
include("functions.php");
include("sessions.php");


$SearchQueryParameter=$_GET["username"];

$ConnectingDB;
$sql = "SELECT aname,headline,bio,image FROM admins WHERE username=:userName";
$stmt = $ConnectingDB->prepare($sql);
$stmt->bindValue(':userName',$SearchQueryParameter);
$stmt->execute();
$Result=$stmt->rowCount();

if($Result==1){
    while($DataRows=$stmt->fetch())
    {
        $ExistingName=$DataRows["aname"];
        $ExistingBio=$DataRows["bio"];
        $ExistingImage=$DataRows["image"];
        $ExistingHeadline=$DataRows["headline"];
    }
}else{
    $_SESSION["ErrorMessage"]="Bad Request!";
    Redirect_to("Blog.php");
}
?>