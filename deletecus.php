<?php
include("functions/init.php");

if(!isset($_GET['id'])) {
   redirect("./");
} else {

    $id = $_GET['id'];
    $cls = $_GET['cls'];

    //echo $id."<br/>".$data."<br/>".$name;

    //find if record has a match
    $sql = "DELETE FROM `$cls` WHERE `cusid` = '$id'";
    $rsl = query($sql);

    //create a notification
    $_SESSION['notify'] = "Custom Fee Deleted Sucessfully";

    redirect("./custom?id=$cls");
    
}
?>