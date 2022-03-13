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
                    <h1>Input Spill Payment</h1>
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
                            <h3 class="card-title">Input Spill Payment for <?php echo $data ?></h3>
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
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Input Fee Paid(₦)</label>
                                            <input type="number" id="fee" class="form-control">
                                        </div>
                                    </div>
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
                                </div>



                                <div class="row">
                                    <div class="col-sm-12">
                                        <!-- textarea -->
                                        <div class="form-group">
                                            <label>Write a short description</label>
                                            <input type="text" id="pdet" class="form-control"
                                                placeholder="e.g Last term balance">
                                        </div>
                                    </div>

                                </div>


                                <button id="payspill" type="button" class="btn btn-primary">Pay Spill</button>

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
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
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
<script src="ajax.js"></script>
</body>

</html>