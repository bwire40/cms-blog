<?php
require_once("DB.php");
?>
<?php
function Redirect_to($New_location)
{
    header("Location:" . $New_location);
    exit;
}
function test_user_input($Data)
{
    return $Data;
}
function check_usernameExistsOrNot($Username)
{
    global $ConnectingDB;
    $sql = "select username from admins where username=:username";
    $stmt = $ConnectingDB->prepare($sql);
    $stmt->bindValue(':username', $Username);
    $stmt->execute();
    $Result = $stmt->rowCount();

    if ($Result == 1) {
        return true;
    } else {
        return false;
    }
}
function login_attempt($Username, $Password)
{
    global $ConnectingDB;
    $sql = "select * from admins where username=:UsernamE and password=:PassworD limit 1";

    $stmt = $ConnectingDB->prepare($sql);
    $stmt->bindValue(':UsernamE', $Username);
    $stmt->bindValue(':PassworD', $Password);
    $stmt->execute();

    $Result = $stmt->rowCount();
    if ($Result == 1) {
        $Found_Account = $stmt->fetch();
        return $Found_Account;
    } else {
        return null;
    }
}
function check_page()
{

    $pagesDir = "my_pages";

    if (!empty($_GET['PageName'])) {

        $pagesFolder = scandir($pagesDir, 0);
        unset($pagesFolder[0], $pagesFolder[1]);

        $PageName = $_GET["PageName"];

        if (in_array($PageName . ".php", $pagesFolder)) {
            include($pagesDir . "/" . $PageName . '.php');
        } else {
            echo "<h1 class='text-danger' style='padding:12px;'>You Are Lost! Sorry Page not Found!</h1>";
            include("./my_pages/lost.php");
        }
    } else {
        // include($pagesDir . '/index.php');
    }
}
function confirm_login()
{
    if (isset($_SESSION["USERID"])) {
        return true;
    } else {
        $_SESSION["Errormessage"] = "Login Required!";
        Redirect_to("login.php");
    }
}

function total_posts()
{
    global $ConnectingDB;
    $sql = "SELECT COUNT(*) FROM post";
    $stmt = $ConnectingDB->query($sql);
    $TotalRows = $stmt->fetch();
    $TotalPosts = array_shift($TotalRows);
    echo $TotalPosts;
}
function total_categories()
{

    global $ConnectingDB;
    $sql = "SELECT COUNT(*) FROM category";
    $stmt = $ConnectingDB->query($sql);
    $TotalRows = $stmt->fetch();
    $TotalCategories = array_shift($TotalRows);
    echo $TotalCategories;
}
function total_admins()
{
    global $ConnectingDB;
    $sql = "SELECT COUNT(*) FROM admins";
    $stmt = $ConnectingDB->query($sql);
    $TotalRows = $stmt->fetch();
    $TotalAdmins = array_shift($TotalRows);
    echo $TotalAdmins;
}
function total_comments()
{
    global $ConnectingDB;
    $sql = "SELECT COUNT(*) FROM comments";
    $stmt = $ConnectingDB->query($sql);
    $TotalRows = $stmt->fetch();
    $TotalComments = array_shift($TotalRows);
    echo $TotalComments;
}

function total_approved_comments($Id)
{
    global $ConnectingDB;
    $sqlCommentapproved = "SELECT COUNT(*) FROM comments WHERE post_id='$Id' AND status='ON'";
    $stmtCommentapproved = $ConnectingDB->query($sqlCommentapproved);
    $TotalRows = $stmtCommentapproved->fetch();
    $TotalApprovedComments = array_shift($TotalRows);
    return $TotalApprovedComments;
}
function total_disapproved_comments($Id)
{
    global $ConnectingDB;
    $sqlCommentdisapproved = "SELECT COUNT(*) FROM comments WHERE post_id='$Id' AND status='OFF'";
    $stmtCommentdisapproved = $ConnectingDB->query($sqlCommentdisapproved);
    $TotalRows = $stmtCommentdisapproved->fetch();
    $TotaldisapprovedComments = array_shift($TotalRows);
    return $TotaldisapprovedComments;
}
function check_usernameExistsOrNot_in_users($Username)
{
    global $ConnectingDB;
    $sql = "select username from users where username=:username";
    $stmt = $ConnectingDB->prepare($sql);
    $stmt->bindValue(':username', $Username);
    $stmt->execute();
    $Result = $stmt->rowCount();

    if ($Result == 1) {
        return true;
    } else {
        return false;
    }
}


?>