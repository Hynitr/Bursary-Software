<?php
include("functions/top.php");
if(!isset($_GET['id'])) {

  redirect("./");
} else {
  $data = escape($_GET['id']);

 $ssl = "SELECT * from fee WHERE `fee` = '$data'";
 $res = query($ssl);
 $rww = mysqli_fetch_array($res);

}
 ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Input <?php echo ucwords($data)?> Fee Record</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                        <li class="breadcrumb-item active">Fee Records</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">


                <!-- right column -->
                <div class="col-md-12">
                    <!-- general form elements disabled -->
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Input fee records for <?php echo $data ?> (Fee -
                                ₦<?php echo number_format($rww['amt']) ?>)</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form role="form">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Select a <?php echo $data ?> student/pupil</label>
                                            <select id="cinstd" class="form-control">
                                                <?php
                          $sql = "SELECT * FROM student ORDER BY `name` asc";
                          $rsl = query($sql);
                          while ($row = mysqli_fetch_array($rsl)) {
                          ?>
                                                <optgroup
                                                    label="<?php echo $row['name'] ?> (<?php echo $row['class'] ?>)">
                                                    <option name="class" id="cinstd"><?php echo $row['adid'] ?>
                                                    </option>
                                                </optgroup>
                                                <?php
                        }
                        ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Input Fee Paid(₦)</label>
                                            <input type="number" id="cinfee" class="form-control">
                                            <input type="text" id="cfee" value="<?php echo $data ?>"
                                                class="form-control" hidden>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <!-- select -->
                                        <div class="form-group">
                                            <label>Payment Type</label>
                                            <select id="cinmdd" class="form-control">
                                                <option id="cinmdd">Full Payment</option>
                                                <option id="cinmdd">Part Payment</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <!-- select -->
                                        <div class="form-group">
                                            <label>Payment Mode</label>
                                            <select id="mddr" class="form-control">
                                                <option id="mddr">Cash</option>
                                                <option id="mddr">Bank</option>
                                                <option id="mddr">School App</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>DatePaid <small>(You can leave this field blank if payment was made
                                                    today)</small></label>
                                            <input type="date" id="cusdate" class="form-control">
                                        </div>
                                    </div>

                                </div>

                                <button id="cinpaid" type="button" class="btn btn-primary">Register Record</button>

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
//check for notification
if(isset($_SESSION['done']) && $_SESSION['done'] == 'fee inputted successfully') {
    
    echo '<script>toastr.error("Fee inputted successfully")</script>';
    unset($_SESSION['done']);
}
?>