<?php
include("functions/init.php");

$data = $_GET['id'];
$more = $_GET['more'];

//get current fee
$fsl = "SELECT * FROM feercrd WHERE `feeid` = '$more'";
$fes = query($fsl);
$fow = mysqli_fetch_array($fes);

$other = $fow['term'];
$adid = $data;
$cfee = $fow['amount'];

//get total paid fee
$sql = "SELECT *, sum(`amount`) as total FROM feercrd WHERE `adid` = '$data' AND `term` = '$other'";
$res = query($sql);
$row = mysqli_fetch_array($res);

$amt   = $row['total'];

$ssl = "SELECT * from `student` WHERE `adid` = '$adid'";
$result = query($ssl);
$vfh = mysqli_fetch_array($result);

 if($other == '1st Term') {
		
  $a = $vfh['fst'];
} else {

if($other == '2nd Term'){

  $a = $vfh['snd'];
}else {

if($other == '3rd Term') {
  
  $a = $vfh['trd'];
}
}
}

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

    if($spillover == '0' && $other == '1st term') {

        $new = $spillover;
        $bal = $vfh['snd'] ;
        
    } else {

        if($spillover == '0' && $other == '2nd Term') {
            
            $new = $spillover;
            $bal = $vfh['snd'] - $amt;
            
        } else {

        //$bal = $vfh['snd'] - $amt;
        $bal = $vfh['snd'] + $spillover - $amt;
            
        }
    }


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

    $new = $a - $amt;
    $bal = $spillover + $new;
        
    }
    
}

##key

#amt == total payment
#new == last term balance
#bal == balance for that term
#cfee == current fee paid

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Paradise Bursary</title>
    <link rel="icon" href="img/2.png" type="image/ico" />
    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }

    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }

    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }

    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }

    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }

    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }

    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }

    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.item td {
        border-bottom: 1px solid #eee;
    }

    .invoice-box table tr.item.last td {
        border-bottom: none;
    }

    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }

    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }

        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }

    /** RTL **/
    .invoice-box.rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }

    .invoice-box.rtl table {
        text-align: right;
    }

    .invoice-box.rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="img/2.png" style="width: 70px; max-width: 300px" />
                            </td>

                            <td>
                                <small> Receipt ID: <i><b><?php echo $more ?></b></i></small><br />
                                <small> Printed: <i><b><?php echo date('l, F d, Y'); ?></b></i></small><br />

                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                Paradise Model School<br />
                                Ota, Ogun State.<br />
                                +234 816 966 4313
                            </td>

                            <td>
                                <b><?php echo $fow['name'] ?> (<?php echo $fow['adid'] ?>)</b><br />
                                <?php echo $fow['class'] ?><br />
                                <?php echo $fow['term']." - ".$fow['session'] ?> Session
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td>Payment Method</td>

                <td>Date Paid</td>
            </tr>

            <tr class="details">
                <td><b><?php echo $fow['mode']?></b></td>

                <td><?php echo date('l, F d, Y', strtotime($fow['datepaid'])); ?></td>
            </tr>

            <tr class="heading">
                <td>Description</td>

                <td>Amount Paid</td>

            </tr>

            <tr class="item">
                <td><?php echo $fow['descr'] ?> (<?php echo $fow['moredecr'] ?>)</td>

                <td>₦<?php echo number_format($fow['amount']) ?></td>
            </tr>
            <?php
            if($_SESSION['trm'] == '2nd Term') {

                echo '
                <tr class="item">
                <td>1st Term Pending Balance</td>

            <td>₦'.number_format($spillover).'</td>
            </tr>
            ';
            } 

            if($_SESSION['trm'] == '3rd Term') {

                echo '
                <tr class="item">
                <td>2nd Term Pending Balance</td>

            <td>₦'.$spillover.'</td>
            </tr>
            ';
            } 
            ?>





            <tr class="total">
                <td></td>

                <td style="color: red;">Balance Left: ₦<?php echo number_format($bal) ?></td>

            </tr>
        </table>
        <a href="#" onclick="goBack();">Click here to go back</a>
    </div>

</body>
<script>
function goBack() {
    window.history.back()
}
</script>
<script type="text/javascript">
window.addEventListener("load", window.print());
</script>

</html>