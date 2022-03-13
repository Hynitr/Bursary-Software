<?php
include("functions/top.php");
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>SpillOver Record(s)</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                        <li class="breadcrumb-item active">SpillOver History</li>
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
                            <h3 class="card-title">SpillOver History</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Admission No.</th>
                                        <th>Name</th>
                                        <th>Class</th>
                                        <th>Outstanding</th>
                                        <th>Spill Payed</th>
                                        <th>Balance</th>
                                        <th></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                  

                  $sql = "SELECT *, sum(`amount`) as total FROM spillover ORDER BY id asc";
                  $rsl = query($sql);
                  while($row = mysqli_fetch_array($rsl)) 
                  {
                    $adid = $row['adid'];

                    //amount spilled
                    $amt = $row['total'];

                    //spill payed
                    $ssl = "SELECT sum(`amount`) as spillpay FROM feercrd WHERE `descr` = 'SpillOver Payment' AND `adid` = '$adid'";
                    $rrl = query($ssl);
                    $rft = mysqli_fetch_array($rrl);

                    $spay = $rft['spillpay'];

                    //spillbalance
                    $spbal = $amt - $spay;
                  ?>
                                    <tr>
                                        <td><?php echo $row['adid'] ?></td>
                                        <td><?php echo $row['name'] ?></td>
                                        <td><?php echo $row['class'] ?></td>
                                        <td>₦<?php echo number_format($amt) ?></td>
                                        <td>₦<?php echo number_format($spay) ?></td>
                                        <td class="font-weight-bolder text-danger">₦<?php echo number_format($spbal) ?>
                                        </td>
                                        <td><a href="./spillpayhis?id=<?php echo $adid ?>">View SpillPay History</a>
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
        "autoWidth": false,
    });
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
});
</script>
<script src="ajax.js"></script>
</body>

</html>