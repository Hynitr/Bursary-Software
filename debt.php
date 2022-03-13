<?php
include("functions/top.php");
$data = $_SESSION['trm'];
$ses   = $_SESSION['aca'];
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>View All Debtors</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                        <li class="breadcrumb-item active">Debtors</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header bg-danger">
                            <div class="card-tools">
                                <button type="button" onclick="window.print();" id="prin" data-toggle="tooltip"
                                    title="Print Result" class="btn btn-tool"><i class="fas fa-print"></i>
                                </button>
                                <button type="button" data-toggle="tooltip" title="Maximize" class="btn btn-tool"
                                    data-card-widget="maximize"><i class="fas fa-expand"></i>
                                </button>
                                <button type="button" data-toggle="tooltip" title="Minimize" class="btn btn-tool"
                                    data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <h3 class="card-title"><?php echo $_SESSION['trm']." - ".$_SESSION['aca']; ?> Academic
                                Session</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Admission No.</th>
                                        <th>Name</th>
                                        <th>Class</th>
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
                
                $sql = "SELECT *, sum(`amount`) AS TOTAL FROM `feercrd` WHERE `term` = '$data' AND `session` = '$ses' GROUP BY `name` asc";
                $result_set=query($sql);
               
                while($row= mysqli_fetch_array($result_set)) {
               
                  
                   $name = $row['name'];
                   $adid = $row['adid'];
                   $cls  = $row['class'];
               
                     
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
                                        <td><?php echo ucwords($cls); ?></td>
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
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include("include/footer.php"); ?>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter">
    <div class="modal-dialog" role="document">
        <div style="background: #f9f9ff; color: #ff0000;" class="modal-content">
            <div class="modal-body">
                <div id="msg" class="text-center"></div>
            </div>
        </div>
    </div>
</div>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>
<script type="text/javascript">
$(function() {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
});
</script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
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
<script src="ajax.js"></script>
</body>

</html>