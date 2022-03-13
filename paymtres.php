<?php
include("functions/init.php");
if(!isset($_GET['id'])) {

} else {
$data =  $_GET['id'];
$ses  = $_GET['ses'];
$trm = $_GET['trm'];

$string = $data;
$output = strtok($string,  ' ');
?>

<!-- right column -->
<div class="col-md-12">
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title"><?php echo strtoupper($data) ." (". $ses ." -  " .$trm.")"; ?> - Fees Record</h3>
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
                        <th>Total Bill</th>
                        <th>Total Fee Paid</th>
                        <th>Balance Left</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <?php 
 $sql="SELECT *, sum(`amount`) as totla FROM `feercrd` WHERE `fname` = '$output' AND `session` = '$ses'  AND `term` = '$trm'";
 $result_set=query($sql);
 $row = mysqli_fetch_array($result_set);


 if($trm == "1st Term") {

    $ssl = "SELECT sum(`fst`) as bill FROM `student` WHERE `fname` = '$output' AND `session` = '$ses'";
    $res = query($ssl);
    $bow = mysqli_fetch_array($res);

    $biller = $bow['bill'];
    
 } else {

if($trm == "2nd Term") {

    $ssl = "SELECT sum(`snd`) as bill FROM `student` WHERE `fname` = '$output' AND `session` = '$ses'";
    $res = query($ssl);
    $bow = mysqli_fetch_array($res);

    $biller = $bow['bill'];

} else {

if($trm == "3rd Term") {

    $ssl = "SELECT sum(`trd`) as bill FROM `student` WHERE `fname` = '$output' AND `session` = '$ses'";
    $res = query($ssl);
    $bow = mysqli_fetch_array($res);

    $biller = $bow['bill'];
}
}
 }

 $bbl = $biller - $row['totla'];

  
          ?>

                        <td>₦<?php echo number_format($biller); ?></td>
                        <td>₦<?php echo number_format($row['totla']) ?></td>
                        <td class="font-weight-bolder text-danger">₦<?php echo number_format($bbl); ?></td>
                        <td><a href="./pythis?id=<?php echo $data ?>&ses=<?php echo $ses ?>&trm=<?php echo $trm ?>">
                                View Payment History</a></td>
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
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- page script -->
<script>
$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "autoWidth": true,
    });
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
    });
});
</script>