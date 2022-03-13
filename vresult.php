<?php
include("functions/init.php");
if(!isset($_GET['id'])) {

} else {
$data =  $_GET['id'];
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
                        <th>Fee ID</th>
                        <th>Fee Paid</th>
                        <th>Term/Session</th>
                        <th>Description</th>
                        <th>More Details</th>
                        <th>Date Paid</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <?php        
 $sql="SELECT * FROM `feercrd` WHERE `adid` = '$data' ORDER BY `id` asc";
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set)) {

  
          ?>
                        <td><?php echo $row['feeid'] ?><br /><a
                                href="./deletefee?id=<?php echo $row['feeid'] ?>&cls=<?php echo $row['class'] ?>"><button
                                    type="button" data-toggle="tooltip" title="Delete fee" class="btn btn-tool"><i
                                        class="fas fa-trash text-danger"></i>
                                </button></a> | <a
                                href="editfee?id=<?php echo $row['feeid'] ?>&cls=<?php echo $row['class'] ?>"><button
                                    type="button" data-toggle="tooltip" title="Edit Intake" class="btn btn-tool"><i
                                        class="fas fa-edit text-danger"></i>
                                </button></a></td>
                        <td class="font-weight-bolder text-danger">₦<?php echo number_format($row['amount']); ?></td>
                        <td><?php echo $row['term']." ".$row['session']; ?></td>
                        <td class="text-danger"><?php echo $row['descr']; ?>
                        </td>
                        <td><?php echo $row['moredecr'] ?></td>
                        <td><?php echo date('l, F d, Y', strtotime($row['datepaid'])); ?></td>
                        <td><a href="./prhis?id=<?php echo $row['adid'] ?>&more=<?php echo $row['feeid'] ?>">
                                Print Receipt</a></td>
                        </td>
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