<?php
include("functions/init.php");

if(!isset($_GET['id'])) {
   redirect("./tracker");
} else {

    $id = $_GET['id'];

    //echo $id."<br/>".$data."<br/>".$name;

    //find if record has a match
    $sql = "DELETE FROM tracker WHERE `trackid` = '$id'";
    $rsl = query($sql);

    //create a notification
    $_SESSION['notify'] = "Expenses Deleted Successfully";

    redirect("./tracker");
    
}
?>