<?php
include("functions/top.php");
if(!isset($_GET['id'])) {

  redirect("./preview");
} else {
  $data = $_GET['id'];
}
 ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Input Fee Records</h1>
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
                            <h3 class="card-title">Input fee records for <?php echo $data ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form role="form">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Select a <?php echo $data ?> student/pupil</label>
                                            <select id="std" class="form-control">
                                                <?php
                          $sql = "SELECT * FROM student WHERE `class` = '$data' ORDER BY `name` asc";
                          $rsl = query($sql);
                          while ($row = mysqli_fetch_array($rsl)) {
                          ?>
                                                <optgroup label="<?php echo $row['name'] ?>">
                                                    <option name="class" id="std"><?php echo $row['adid'] ?>
                                                    </option>
                                                </optgroup>
                                                <?php
                        }
                        ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <!-- select -->
                                        <div class="form-group">
                                            <label>Select Term</label>
                                            <select id="trm" class="form-control">
                                                <option id="trm">1st Term</option>
                                                <option id="trm">2nd Term</option>
                                                <option id="trm">3rd Term</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Input Fee Paid(₦)</label>
                                            <input type="number" id="fee" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <input type="text" id="cls" value="<?php echo $data; ?>" hidden>

                                <div class="row">

                                    <div class="col-sm-4">
                                        <!-- select -->
                                        <div class="form-group">
                                            <label>Mode of Payment</label>
                                            <select id="mdd" class="form-control">
                                                <option id="mdd">Cash</option>
                                                <option id="mdd">Bank</option>
                                                <option id="mdd">School App</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <!-- select -->
                                        <div class="form-group">
                                            <label>Fee Description</label>
                                            <select id="descr" class="form-control">
                                                <option id="descr">Tuition </option>
                                                <option id="descr">Uniform</option>
                                                <option id="descr">Books</option>
                                                <option id="descr">Stationeries</option>
                                                <option id="descr">School Event</option>
                                                <option id="descr">External exams</option>
                                                <option id="descr">Development fee</option>
                                                <option id="descr">All</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Academic Session</label>
                                            <?php

                            $sesl = "SELECT * FROM `ses` ORDER BY `id` desc";
                            $resl = query($sesl);
                            while($resw = mysqli_fetch_array($resl)) {
                            ?>
                                            <select id="fst" class="form-control">

                                                <option id="fst"><?php echo $resw['ses'] ?></option>
                                            </select>

                                            <?php
                            }
                            ?>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <!-- textarea -->
                                        <div class="form-group">
                                            <label>Write a short description for this payment</label>
                                            <input type="text" id="pdet" class="form-control"
                                                placeholder="e.g Excursion, party, school fees, e.t.c">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <!-- textarea -->
                                        <div class="form-group">
                                            <label>Payment Date <small>(You can leave this field blank if the
                                                    payment was made
                                                    today)</small></label>
                                            <input type="date" id="pdat" class="form-control">
                                        </div>
                                    </div>

                                </div>


                                <button id="paid" type="button" class="btn btn-primary">Register Record</button>

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