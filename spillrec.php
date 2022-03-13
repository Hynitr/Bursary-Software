<?php
include("functions/init.php");

$data = $_GET['id'];

$sql = "SELECT *, sum(`amount`) as total FROM feercrd WHERE `feeid` = '$data' AND `descr` = 'SpillOver Payment'";
$res = query($sql);
$row = mysqli_fetch_array($res);

$adid = $row['adid'];
$amt  = $row['total'];

$spill = "SELECT sum(`amount`) as spilltot FROM spillover WHERE `adid` = '$adid'";
$spls  = query($spill);
$sph   = mysqli_fetch_array($spls);

$bal = $sph['spilltot'] - $amt;
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>FOGS Bursary</title>
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
                                <small> Receipt ID: <i><b><?php echo $data ?></b></i></small><br />
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
                                Fountain of Gold School,<br />
                                Ota, Ogun State.<br />
                                +234 813 677 0523
                            </td>

                            <td>
                                <b><?php echo $row['name'] ?> (<?php echo $row['adid'] ?>)</b>
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
                <td><b><?php echo $row['mode']?></b></td>

                <td><?php echo date('l, F d, Y', strtotime($row['datepaid'])); ?></td>
            </tr>

            <tr class="heading">
                <td>Description</td>

                <td>Amount Paid</td>

            </tr>

            <tr class="item">
                <td><?php echo $row['descr'] ?> (<?php echo escape($row['moredecr']) ?>)
                </td>

                <td>₦<?php echo number_format($row['amount']) ?></td>
            </tr>



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