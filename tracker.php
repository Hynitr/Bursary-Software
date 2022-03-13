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
                    <h1>Expenses Tracker</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                        <li class="breadcrumb-item active">Expenses Tracker</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <?php
 $sql="SELECT * from `tracker`";
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set))
 {
  if(row_count($result_set) == "") {
            
          } else {
          ?>

    <section id="preview" class="content">
        <!-- right column -->
        <div class="col-md-12">
            <div class="card card-dark">
                <div class="card-header">

                    <h3 class="card-title">Preview Expenses

                    </h3>


                    <!---
                    <div class="card-tools">
                        <button type="button" id="del" data-toggle="modal" data-target="#modal-reset"
                            data-toggle="tooltip" title="Reset this subject" class="btn btn-tool"><i
                                class="fas fa-recycle"></i>
                        </button>
                        <button type="button" id="del" data-toggle="modal" data-target="#modal-edit"
                            data-toggle="tooltip" title="Edit Time allowed, Questions to be attempted and Instructions"
                            class="btn btn-tool"><i class="fas fa-clock"></i>
                        </button>
                        <button type="button" id="del" data-toggle="modal" data-target="#modal-delete"
                            data-toggle="tooltip" title="Delete a question" class="btn btn-tool"><i
                                class="fas fa-trash"></i>
                        </button>
                        <button type="button" data-toggle="tooltip" title="Maximize" class="btn btn-tool"
                            data-card-widget="maximize"><i class="fas fa-expand"></i>
                        </button>
                        <button type="button" data-toggle="tooltip" title="Minimize" class="btn btn-tool"
                            data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                    </div>--->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>

                                <th class="text-center">Name</th>
                                <th class="text-center">Amount</th>
                                <th class="text-center">Qty</th>
                                <th class="text-center">Total</th>
                                <th class="text-center">Type</th>
                                <th class="text-center">Payment</th>
                                <th class="text-center">Details</th>
                                <th class="text-center">Date Paid</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <?php
                 
 $sql = "SELECT * FROM `tracker`";
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set))
 {
     if(($row['qty'] || $row['total']) == '') {

        $row['qty'] = 0;
        $row['total'] = 0;
     }
          ?>
                                <td><?php echo $row['name']; ?> - <a
                                        href="./deletetracker?id=<?php echo $row['trackid'] ?>"><button type="button"
                                            data-toggle="tooltip" title="Delete Intake" class="btn btn-tool"><i
                                                class="fas fa-trash text-danger"></i>
                                        </button></a></td>
                                <td class="text-danger font-weight-bolder">₦<?php echo number_format($row['amount']); ?>
                                </td>
                                <td class="text-danger font-weight-bolder"><?php echo number_format($row['qty']); ?>
                                </td>
                                <td class="text-danger font-weight-bolder">₦<?php echo number_format($row['total']); ?>
                                </td>
                                <td class="font-weight-bolder"><?php echo $row['type']; ?></td>
                                <td><?php echo $row['mode']; ?></td>
                                <td class="font-weight-bolder text-danger">
                                    <?php echo $row['descrip']?>
                                </td>
                                <td><?php echo date('l, F d, Y', strtotime($row['date'])); ?></td>
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
    </section>
    <?php
}
}
?>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">


                <!-- right column -->
                <div class="col-md-12">
                    <!-- general form elements disabled -->
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Input Expenses -
                                <?php echo date('l, F d, Y'); ?><br /><?php echo $_SESSION['trm']." - ".$_SESSION['aca']. " &nbsp;Academic Session" ?>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form role="form">
                                <div class="row">

                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Input Expenses Name</label>
                                            <input type="text" id="exname" class="form-control" placeholder="e.g Fuel">

                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <input type="number" id="qty" class="form-control">

                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Input Expenses Amount(₦)</label>
                                            <input type="number" id="examt" class="form-control">

                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <!-- select -->
                                        <div class="form-group">
                                            <label>Expenses Type</label>
                                            <select id="extype" class="form-control">
                                                <option id="extype">Full Payment</option>
                                                <option id="extype">Part Payment</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <!-- select -->
                                        <div class="form-group">
                                            <label>Mode of Expenses Payment</label>
                                            <select id="expay" class="form-control">
                                                <option id="expay">Cash</option>
                                                <option id="expay">Bank</option>
                                                <option id="expay">Outstanding Debt</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <!-- select -->
                                        <div class="form-group">
                                            <label>Expenses Description</label>
                                            <input type="text" id="exdesc" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <button id="exreg" type="button" class="btn btn-primary">Register Expenses</button>

                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <!--/.col (right) -->
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
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- page script -->
<script>
$(function() {
    // Summernote
    $('.textarea').summernote({

        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic']]
        ]
    });
})
</script>
<script>
$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "autoWidth": true,
    });
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
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
<?php
if(isset($_SESSION['notify']) && $_SESSION['notify'] == "Expenses Deleted Successfully") {
    echo '<script>toastr.error("Expenses Deleted Successfully")</script>';
}
?>