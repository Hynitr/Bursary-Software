<?php
include("functions/init.php");
if(!isset($_GET['id']) && !isset($_GET['other'])) {

} else {
$data =  $_GET['id'];
$other = $_GET['other'];
$ses = $_SESSION['aca'];
$cls = $_GET['cls'];
?>

<!-- right column -->
<div class="col-md-12">
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title"><?php echo strtoupper($data); ?> - Fees Record</h3>
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
                        <th></th>
                        <th>Name</th>
                        <th>Fee</th>
                        <th>Fee Paid</th>
                        <th>Balance</th>
                        <th>Date Paid</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <?php
                 
 $sql="SELECT * , SUM(amount) AS Total from `feercrd` WHERE `class` = '$cls' AND `term` = '$other' AND `session` = '$ses' AND `adid` = '$data'";
 $result_set=query($sql);
 $row= mysqli_fetch_array($result_set);

 
 
 $ssl ="SELECT * from `student` WHERE `class` = '$cls' AND `session` = '$ses' AND `adid` = '$data'";
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


  
          ?>
                        <td><a href="./deletefee?id=<?php echo $row['feeid'] ?>&cls=<?php echo $row['class'] ?>"><button
                                    type="button" data-toggle="tooltip" title="Delete fee" class="btn btn-tool"><i
                                        class="fas fa-trash text-danger"></i>
                                </button></a> | <a
                                href="editfee?id=<?php echo $row['feeid'] ?>&cls=<?php echo $row['class'] ?>"><button
                                    type="button" data-toggle="tooltip" title="Edit Intake" class="btn btn-tool"><i
                                        class="fas fa-edit text-danger"></i>
                                </button></a></td>
                        <td><?php echo ucwords($row['name']); ?></td>
                        <td>₦<?php echo number_format($a); ?></td>
                        <td>₦<?php echo number_format($row['Total']); ?></td>
                        <td class="text-danger font-weight-bolder">₦<?php echo number_format($a - $row['Total']); ?>
                        </td>
                        <td><?php echo date('l, F d, Y', strtotime($row['datepaid'])); ?></td>
                        <td><a
                                href="./history?id=<?php echo $row['adid'] ?>&cls=<?php echo $cls ?>&trm=<?php echo $other ?>">View
                                Payment
                                History</a></td>
                        </td>
                    </tr>

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