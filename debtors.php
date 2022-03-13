<?php
include("functions/init.php");
if(!isset($_GET['id']) && !isset($_GET['cls'])) {

} else {
$data =  $_GET['id'];
$cls  =  $_GET['cls'];
$ses  =  $_SESSION['aca']
?>

<!-- right column -->
<div class="col-md-12">
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title"><?php echo strtoupper($cls); ?> - Debtors</h3>
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
        <div class="card-body">

            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Admission No.</th>
                        <th>Name</th>
                        <th>Fee</th>
                        <th>Paid</th>
                        <th>Balance</th>
                        <th>Spill Over</th>
                        <th>Total Debt</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <?php
                
 $sql = "SELECT *, sum(`amount`) AS TOTAL FROM `feercrd` WHERE `class` = '$cls' AND `term` = '$data' AND `session` = '$ses' GROUP BY `name` asc";
 $result_set=query($sql);

 while($row= mysqli_fetch_array($result_set)) {

   
    $name = $row['name'];
    $adid = $row['adid'];


      
    //get spill over fee
    $spill = "SELECT sum(`amount`) as spilltot FROM spillover WHERE `adid` = '$adid' AND `name` = '$name'";
    $spls  = query($spill);
    $sph   = mysqli_fetch_array($spls);


    //get spill paid
    $sgt ="SELECT sum(`amount`) as spillpay FROM feercrd WHERE `descr` = 'SpillOver Payment' AND `adid` = '$adid'";
    $sgl = query($sgt);
    $sgh = mysqli_fetch_array($sgl);


    

    if($data == '1st Term') {
          
      $ssl ="SELECT sum(fst) as totas from `student` WHERE `class` = '$cls' AND `session` = '$ses' AND `adid` = '$adid'";
      $result = query($ssl);
      $vfh = mysqli_fetch_array($result);
    
    } else {
    
    if($data == '2nd Term'){
    
      $ssl ="SELECT sum(snd) as totas from `student` WHERE `class` = '$cls' AND `session` = '$ses' AND `adid` = '$adid'";
      $result = query($ssl);
      $vfh = mysqli_fetch_array($result);
    
    }else {
    
    if($data == '3rd Term') {
    
    
      $ssl = "SELECT sum(trd) as totas from `student` WHERE `class` = '$cls' AND `session` = '$ses' AND `adid` = '$adid'";
      $result = query($ssl);
      $vfh = mysqli_fetch_array($result);
    
    }
    }
    }


    //spillover total
    $spillover = $sph['spilltot'] - $sgh['spillpay'];

    //balance total
    $ball = $vfh['totas'] - $row['TOTAL'];

    if($ball == 0){
        

    } else {

    //spillover + balance
    $debt = $ball + $spillover
          ?>
                        <td><?php echo $row['adid']; ?></td>
                        <td><?php echo ucwords($row['name']); ?></td>
                        <td>₦<?php echo number_format($vfh['totas']); ?></td>
                        <td>₦<?php echo number_format($row['TOTAL']); ?></td>
                        <td class="text-danger font-weight-bolder">
                            ₦<?php echo number_format($ball); ?></td>
                        <td class="text-danger font-weight-bolder">
                            ₦<?php echo number_format($spillover); ?></td>
                        <td class="text-danger font-weight-bolder">
                            ₦<?php echo number_format($debt); ?></td>
                        <td><a
                                href="./history?id=<?php echo $row['adid'] ?>&cls=<?php echo $cls ?>&trm=<?php echo $data ?>">
                                View Payment
                                History</a><br /><br /><a
                                href="./spillhistory?id=<?php echo $row['name'] ?>&adid=<?php echo $row['adid'] ?>">
                                View Spill Over
                                History</a></td>
                        </td>
                        <td></td>
                        </td>
                    </tr>
                    <?php
 }
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
      ?>

<script type="text/javascript">
document.getElementById('prin').addEventListener('click', myfun);

function myfun() {
    window.print();
}
</script>