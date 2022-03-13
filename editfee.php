<?php
include("functions/top.php");
if(!isset($_GET['id'])) {

  redirect("./preview");
} else {
  $data = $_GET['id'];

  
  $sql = "SELECT * FROM feercrd WHERE `feeid` = '$data'";
  $rsl = query($sql);
  $row = mysqli_fetch_array($rsl);
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Fee Records</h1>
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
                            <h3 class="card-title">Edit fee records for <?php echo $row['name'] ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form role="form">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Student/pupil</label>
                                            <select id="edstd" class="form-control" disabled>

                                                <optgroup label="<?php echo $row['name'] ?>">
                                                    <option name="class" id="edstd"><?php echo $row['adid'] ?>
                                                    </option>
                                                </optgroup>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <!-- select -->
                                        <div class="form-group">
                                            <label>Select Term</label>
                                            <select id="edtrm" class="form-control">
                                                <option id="edtrm"><?php echo $row['term'] ?></option>
                                                <option id="edtrm">1st Term</option>
                                                <option id="edtrm">2nd Term</option>
                                                <option id="edtrm">3rd Term</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Input Fee Paid(₦)</label>
                                            <input type="number" id="edfee" value="<?php echo $row['amount'] ?>"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <input type="text" id="edcls" value="<?php echo $data; ?>" hidden>

                                <div class="row">

                                    <div class="col-sm-4">
                                        <!-- select -->
                                        <div class="form-group">
                                            <label>Mode of Payment</label>
                                            <select id="edmdd" class="form-control">
                                                <option id="edmdd"><?php echo $row['mode'] ?></option>
                                                <option id="edmdd">Cash</option>
                                                <option id="edmdd">Bank</option>
                                                <option id="edmdd">School App</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <!-- select -->
                                        <div class="form-group">
                                            <label>Fee Description</label>
                                            <select id="eddescr" class="form-control">
                                                <option id="eddescr"><?php echo $row['descr'] ?> </option>
                                                <option id="eddescr">Tuition </option>
                                                <option id="eddescr">Uniform</option>
                                                <option id="eddescr">Books</option>
                                                <option id="eddescr">Stationeries</option>
                                                <option id="eddescr">School Event</option>
                                                <option id="eddescr">External exams</option>
                                                <option id="eddescr">Development fee</option>
                                                <option id="eddescr">All</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Academic Session</label>
                                            <input type="text" id="edfst" class="form-control"
                                                value="<?php echo $row['session']; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <!-- textarea -->
                                        <div class="form-group">
                                            <label>Write a short description for this payment</label>
                                            <input type="text" id="edpdet" class="form-control"
                                                value="<?php echo $row['moredecr'] ?>"
                                                placeholder="e.g Excursion, party, school fees, e.t.c">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <!-- textarea -->
                                        <div class="form-group">
                                            <label>Payment Date <small>(You can leave this field blank if the
                                                    payment was made
                                                    today)</small></label>
                                            <input type="date" id="edpdate" class="form-control"
                                                value="<?php echo $row['datepaid'] ?>">
                                        </div>
                                    </div>

                                </div>


                                <button id="edpaid" type="button" class="btn btn-primary">Update Record</button>

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