<?php
include("functions/top.php");
if(!isset($_GET['id'])) {

    redirect("./pintake");
} else {


    $id = $_GET['id'];
    $data = $_GET['data'];
    $name = $_GET['name'];

    $sql = "SELECT * FROM student WHERE `stid` = '$data'";
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
                    <h1>Edit Intake</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                        <li class="breadcrumb-item active">Register</li>
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
                            <h3 class="card-title"></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form role="form">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Admission No</label>
                                            <input type="text" id="adid" class="form-control"
                                                value="<?php echo $row['adid'] ?>" placeholder="FOGS/">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Full Student/Pupil Name</label>
                                            <input type="text" id="pname" class="form-control"
                                                placeholder="SurName FirstName" value="<?php echo $row['name'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <!-- select -->
                                        <div class="form-group">
                                            <label>Select Class</label>
                                            <select id="clss" class="form-control">
                                                <option id="clss" class="font-weight-bolder"><?php echo $row['class'] ?>
                                                </option>
                                                <option id="clss">Reception</option>
                                                <option id="clss">KG 1</option>
                                                <option id="clss">KG 2</option>
                                                <option id="clss">Nursery 1</option>
                                                <option id="clss">Nursery 2</option>
                                                <option id="clss">Basic 1</option>
                                                <option id="clss">Basic 2</option>
                                                <option id="clss">Basic 3</option>
                                                <option id="clss">Basic 4</option>
                                                <option id="clss">Basic 5</option>
                                                <option id="clss">J.S.S 1</option>
                                                <option id="clss">J.S.S 2</option>
                                                <option id="clss">J.S.S 3</option>
                                                <option id="clss">S.S.S 1</option>
                                                <option id="clss">S.S.S 2</option>
                                                <option id="clss">S.S.S 3</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>1st Term Fee</label>
                                            <input type="number" id="fst" value='<?php echo $row['fst'] ?>'
                                                class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>2nd Term Fee</label>
                                            <input type="number" id="snd" value='<?php echo $row['snd'] ?>'
                                                class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>3rd Term Fee</label>
                                            <input type="number" id="trd" value='<?php echo $row['trd'] ?>'
                                                class="form-control" placeholder="">
                                            <input type="text" id="stid" value="<?php echo $data ?>" hidden>
                                        </div>
                                    </div>
                                </div>


                                <button id="uplprg" type="button" class="btn btn-primary">Update Record</button>

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
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
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
<script src="ajax.js"></script>
</body>

</html>