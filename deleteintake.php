<?php
include("functions/init.php");

if(!isset($_GET['id'])) {
   redirect("./pintake");
} else {

    $id = $_GET['id'];
    $data = $_GET['data'];
    $name = $_GET['name'];

    //echo $id."<br/>".$data."<br/>".$name;

    //find if record has a match
    $sql = "DELETE FROM student WHERE `class` = '$id' AND `stid` = '$data' AND `adid` = '$name'";
    $rsl = query($sql);

     //del from feercrd
     $ssl = "DELETE FROM feercrd WHERE `class` = '$id' AND `stid` = '$data' AND `adid` = '$name'";
     $ral = query($ssl);

    //create a notification
    $_SESSION['notify'] = "Student/Pupil Deleted Sucessfully";

    redirect("./pintake");
    
}
?>