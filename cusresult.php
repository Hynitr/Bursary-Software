<?php
include("functions/init.php");
if(!isset($_GET['id'])) {

} else {
$fee =  $_GET['id'];
$ses = $_GET['ses'];
$trm = $_GET['trm'];



$sql="SELECT * from `".$fee."`";
$result_set=query($sql);

$ssl = "SELECT * from fee WHERE `fee` = '$fee'";
$res = query($ssl);
$rww = mysqli_fetch_array($res);


$sms = "SELECT sum(amt) as tota FROM `".$fee."`  \n"
. "WHERE `ses` = '$ses'  AND `term` = '$trm'";
$sml = query($sms);
$rss = mysqli_fetch_array($sml);

while($row= mysqli_fetch_array($result_set))
{
 if(row_count($result_set) == "") {
           
         } else {

?>

<!-- right column -->
<div class="col-md-12">
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title"><?php echo strtoupper($fee); ?> - Fees Record (Total Paid: ₦<?php echo number_format($rss['tota']) ?>)</h3>
            <div class="card-tools">
                <button type="button" onclick="window.print();" id="prin" data-toggle="tooltip" title="Print Result"
                    class="btn btn-tool"><i class="fas fa-print"></i>
                </button>
                <button type="button" data-toggle="tooltip" title="Maximize" class="btn btn-tool"
                    data-card-widget="maximize"><i class="fas fa-expand"></i>
                </button>
                <button type="button" data-toggle="tooltip" title="Minimize" class="btn btn-tool"
                    data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <!-- /.card-header -->
        <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                               
                                <th class="text-center">Admn No.</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Class</th>
                                <th class="text-center">Amt</th>
                                <th class="text-center">Bal</th>
                                <th class="text-center">Term - Session</th>
                                <th class="text-center">Date Paid</th>
                                <th class="text-center"></th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <?php
                 
 $sql = "SELECT * FROM `".$fee."`  \n"

    . "WHERE `ses` = '$ses'  AND `term` = '$trm' GROUP BY `admno` ORDER BY `name` asc";
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set))
 {
    $admno = $row['admno'];

    $sml = "SELECT sum(amt) as total FROM `".$fee."`  \n"

    . "WHERE `ses` = '$ses'  AND `term` = '$trm' AND `admno` = '$admno'";
    $sel = query($sml);

    $res = mysqli_fetch_array($sel);

    if($row['type'] == 'Full Payment') {
        $bal = 0;
    } else {

        $bal = $res['total'] - $row['amt'];
    }
          ?>
                              
                                <td><?php echo $row['admno']; ?> <!--<br/><a href="./deletecus?id=<?php echo $row['cusid'] ?>&cls=<?php echo $fee ?>"><button
                                            type="button" data-toggle="tooltip" title="Delete fee"
                                            class="btn btn-tool"><i class="fas fa-trash text-danger"></i>
                                        </button></a> | <a
                                        href="./editcus?id=<?php echo $row['cusid'] ?>&cls=<?php echo $fee ?>"><button
                                    type="button" data-toggle="tooltip" title="Edit Intake" class="btn btn-tool"><i
                                        class="fas fa-edit text-danger"></i>
                                </button></a>--></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['class']; ?></td>
                                <td class="font-weight-bolder text-danger"><?php echo number_format($res['total']); ?></td>
                                <td class="font-weight-bolder text-danger"><?php echo number_format($bal); ?></td>
                                <td class="font-weight-bolder text-danger">
                                    <?php echo $row['term'] ." <br/><small> ". $row['ses']. " Session </small>"; ?>
                                </td>
                                <td><?php echo date('D, M d, Y', strtotime($row['datepaid'])); ?></td>
                                <td><a href="./cusprin?id=<?php echo $row['cusid'] ?>&data=<?php echo $fee ?>">Print
                                        Receipt</a></td>
                            </tr>
                            <?php
          } 
          ?>
                        </tbody>

                    </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<?php
      }
    }
}
      ?>

<script type="text/javascript">
document.getElementById('prin').addEventListener('click', myfun);

function myfun() {
    window.print();
}
</script>