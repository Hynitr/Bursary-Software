<?php
include("functions/top.php");
$data = $_GET['id'];
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?php echo $data ?> Fee Record</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                        <li class="breadcrumb-item active">Preview Fee</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <section class="content">
        <!-- right column -->
        <div class="col-md-12">
            <!-- general form elements disabled -->
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title"></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form name="printres" role="form">

                        <div class="form-group">
                            <label for="exampleInputPassword1">Select a <?php echo $data ?> student/pupil .:</label>

                            <select id="clss" class="form-control">
                                <?php
                          $sql = "SELECT * FROM student WHERE `class` = '$data' ORDER BY `name` asc";
                          $rsl = query($sql);
                          while ($row = mysqli_fetch_array($rsl)) {
                          ?>
                                <optgroup label="<?php echo $row['name'] ?>">
                                    <option name="class" id="clss"><?php echo $row['adid'] ?>
                                    </option>
                                </optgroup>
                                <?php
                        }
                        ?>
                            </select>

                        </div>




                        <button type="button" id="chkres" class="btn btn-danger btn-outline-light">View All
                            Records</button>
                    </form>
                </div>
                <!-- /.card-body -->

            </div>
            <!-- /.card -->
            <!-- general form elements disabled -->

        </div>
        <section id="displayres" class="content">

        </section>
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

<script>
//filter
document.getElementById('chkres').addEventListener('click', getResult);

function getResult() {

    var z = document.forms["printres"]["clss"].value;

    var xhr = new XMLHttpRequest();
    xhr.open('GET', './vresult?id=' + z, true);

    xhr.onload = function() {
        if (xhr.status == 200) {
            //document.write(this.responseText);
            document.getElementById('displayres').innerHTML = xhr.responseText;
        } else {

            document.write('File not Found');
        }
    }

    xhr.send();
}
</script>
</body>

</html>
<?php
//check for notification
if(isset($_SESSION['notify']) && $_SESSION['notify'] == 'Fee Deleted Sucessfully') {
    
    echo '<script>toastr.error("Fee Deleted Sucessfully")</script>';
    //unset($_SESSION['notify']);
} else {

if(isset($_SESSION['notify']) && $_SESSION['notify'] == 'Fee Updated Sucessfully') {
    
    echo '<script>toastr.error("Fee Updated Sucessfully")</script>';
    //unset($_SESSION['notify']);
    
}
}
?>