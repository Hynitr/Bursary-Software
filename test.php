<?php
include("functions/init.php");

//$adid = 'FGS/STUD/2021/10536';


# Name of table = names_table
# Name of column containing names = full_name
# Simply change the table and column name to what corresponds with your dataset

/*$sql = "SELECT * FROM feercrd";
$res = query($sql);
while($row = mysqli_fetch_array($res)) {

    $string = $row['name'];
    $id = $row['feeid'];

    $output = strtok($string,  ' ');
    
    //echo $output;

$sel = "UPDATE feercrd SET `fname` = '$output' WHERE `feeid` = '$id'";
$rel = query($sel);
echo confirm($rel);

}


//family name
//get total pay of family
//get balance left of family





# NB: This does not capture middle names


/*

if($_SESSION['trm'] == '2nd Term') {

    //get all payement record
    $sql = "SELECT *, sum(`fst`) as fee FROM student WHERE `adid` = '$adid'";
    $res = query($sql);
    $row = mysqli_fetch_array($res);
    
    $fstfee = $row['fee'];

    $dql = "SELECT *, sum(`amount`) as total FROM feercrd WHERE `term` = '1st Term' AND `adid` = '$adid'";
    $des = query($dql);
    $dow = mysqli_fetch_array($des);

    $fstunpaid = $dow['total'];

    $spillover = $fstfee - $fstunpaid;

    echo number_format($spillover);

} else {

   
    if($_SESSION['trm'] == '3rd Term') {

    //get all payement record
    $sql = "SELECT *, sum(`fst`) as fee, sum(`snd`) as trdd FROM student AND `adid` = '$adid'";
    $res = query($sql);
    $row = mysqli_fetch_array($res);
    
    $fstfee = $row['fee'] + $row['trdd'];

    $dql = "SELECT *, sum(`amount`) as total FROM feercrd WHERE `term` = '1st Term' AND `term` = '2nd Term' AND `adid` = '$adid'";
    $des = query($dql);
    $dow = mysqli_fetch_array($des);

    $fstunpaid = $dow['total'];

    $spillover = $fstfee - $fstunpaid;

    echo number_format($spillover);
        
    }
    
}

//FLWPUBK-2cb3761d07232536bb10f02859f30074-X
//FLWSECK-df927bcfddfc9ac72297cee178a62415-X
//df927bcfddfc16c414394ad1

/*** 

/*payment tracker
- split names into two
- group records based on the first name
- any where it finds a variabel, it sum up their record

*/

//split names into two
$sql = "SELECT * FROM student ORDER BY `name` asc";
$rsl = query($sql);
while ($row = mysqli_fetch_array($rsl)) {

$myvalue = $row['name'];
$arr = explode(' ',trim($myvalue));
$new = $arr[0]; // will print Test


//create associative array
//$rr = array("a"=>"red","b"=>"green","c"=>"red");

echo $new;

}

/*$sql = "SELECT * FROM student ORDER BY `name` asc";
$rsl = query($sql);
foreach($rsl as $row) {

    $myvalue = $row['name'];
    $arr = explode(' ',trim($myvalue));
    $new = $arr[0]." "; // will print Test   
}

    $str = 'ABOLADE ABOLADE LESHI LESHI';
    $st = implode(' ',array_unique(explode(' ', $str)));

    echo md5('adminlogin');
    //echo $st;
/*while ($row = mysqli_fetch_assoc($rsl)) {

    $myvalue = $row['name'];
    $arr = explode(' ',trim($myvalue));
    $new = $arr[0]." "; // will print Test

    //echo $new;
    $str = $new;
    $st = implode(' ',array_unique(explode(' ', $str)));
    echo $st;

}*/


    

//echo md5('7175Tmjcf@');
/*?8$gb = "UPDATE admin SET `password` = '$ab' WHERE `username` = 'Daglore'";
$gf = query($gb);*/

/*$ses = "2020/2021";


 $a = str_split($ses,4);
 $b = $a[0] + 1;
 $c = str_split($ses,5);
 $d = $c[1] + 1;

 $e = $b."/".$d;

 echo $e;

 //echo outstanding();*/

 /*$adid = 'DMS/2019/2031';
 $name = "Gabolade Greatness";

$spill = "SELECT sum(`amount`) as spilltot FROM spillover WHERE `adid` = '$adid' AND `name` = '$name'";
$spls  = query($spill);
$sph   = mysqli_fetch_array($spls);

echo $sph['spilltot'];


$sql = "BACKUP DATABASE bursary TO DISK = 'C:\xampp\htdocs\Jobs\daglorebus\bursary.bak'";
$res = query($sql);*/
?>