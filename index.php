<?php
include("functions/top.php");

$trm =  $_SESSION['trm'];
$ses = $_SESSION['aca'];
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Welcome <b>Paradise Model School</b></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-success"><i class="fa fa-credit-card"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text text-success font-weight-bolder">Net Profit</span>
                            <?php  
                                    
                            $sql = "SELECT sum(`amount`) as tota FROM `feercrd` WHERE `term` = '$trm'  AND `session` = '$ses'";
                            $rsl = query($sql);
                            $row = mysqli_fetch_array($rsl);

                            $ssl = "SELECT *,sum(`amount`) as tot FROM `tracker` WHERE `term` = '$trm'  AND `session` = '$ses'";
                            $rel = query($ssl);
                            $rww = mysqli_fetch_array($rel);

                            $qty = $rww['qty'];
                            $totxp = $qty * $rww['tot'];

                            $all = $row['tota'] - $totxp;
                           
 
         ?>
                            <span
                                class="info-box-number text-success font-weight-bolder">₦<?php  echo number_format($all); ?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- ./col -->
                <!-- ./col -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-danger"><i class="fas fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text text-danger font-weight-bolder">Total Expenses</span>

                            <?php
                             $ssl = "SELECT *,sum(`amount`) as tot FROM `tracker` WHERE `term` = '$trm'  AND `session` = '$ses'";
                             $rel = query($ssl);
                             $rww = mysqli_fetch_array($rel);

                             $qty = $rww['qty'];
                             $totxp = $qty * $rww['tot'];
?>


                            <span
                                class="info-box-number text-danger font-weight-bolder">₦<?php  echo number_format($totxp); ?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- ./col -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-success"><i class="fas fa-list"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text text-success font-weight-bolder">Total Unpaid Fees</span>
                            <?php

                            $sql = "SELECT sum(`amount`) as tota FROM `feercrd` WHERE `term` = '$trm'  AND `session` = '$ses'";
                            $rsl = query($sql);
                            $row = mysqli_fetch_array($rsl);


                            if($trm == '1st Term') {
		
                                $ssl = "SELECT sum(fst) as totas FROM `student` WHERE `session` = '$ses'";
                                $rrl = query($ssl);
                                $rsw = mysqli_fetch_array($rrl);

                                
                            } else {
                        
                            if($trm == '2nd Term'){
                        
                                $ssl = "SELECT sum(snd) as totas FROM `student` WHERE `session` = '$ses'";
                                $rrl = query($ssl);
                                $rsw = mysqli_fetch_array($rrl);

                            }else {
                        
                            if($trm == '3rd Term') {
                                
                                $ssl = "SELECT sum(trd) as totas FROM `student` WHERE `session` = '$ses'";
                                $rrl = query($ssl);
                                $rsw = mysqli_fetch_array($rrl);
                            }
                            }
                            }
                            

                            

                            $total = $rsw['totas'] - $row['tota'];


                 
 
         ?>
                            <span
                                class="info-box-number text-success font-weight-bolder">₦<?php echo number_format($total); ?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-danger"><i class="fas fa-history"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text text-danger font-weight-bolder">Total Spill Over</span>
                            <span class="info-box-number text-danger font-weight-bolder">₦
                                <?php 
                            
                                echo termlyspillover(); ?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

            </div>
            <!-- /.row -->
            <!-- TABLE: LATEST ORDERS -->

            <!-- /.row -->
            <!-- Main row -->
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- /.col-md-6 -->
                        <!--  <div class="col-lg-12">

                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h5 class="m-0">Academic Session.: <b><?php echo $_SESSION['aca'] ?> -
                                            <?php echo $_SESSION['trm'] ?></b></h5>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Update Current Term</label>
                                        <select id="trm" class="form-control">
                                            <option id="trm">1st Term</option>
                                            <option id="trm">2nd Term</option>
                                            <option id="trm">3rd Term</option>
                                        </select>
                                    </div>
                                    <button id="updt" type="button" class="btn btn-warning">Update Term</button>
                                    <button id="upds" type="button" class="btn btn-danger">Update Session</button>
                                </div>
                            </div>
                        </div>--->
                        <!-- /.col-md-6 -->

                        <div class="col-lg-6">

                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h5 class="m-0">View Debtors</h5>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">Click here to view pending and uncompleted payments of
                                        students/pupils</p>
                                    <a href="./debt" class="btn btn-primary">Debtors Page</a>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-6">

                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h5 class="m-0">Register New Intake</h5>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">Click here to input a new school fee management record for a
                                        new student/pupil</p>
                                    <a href="./register" class="btn btn-primary">Register New Intake</a>
                                </div>
                            </div>
                        </div>


                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

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
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    bsCustomFileInput.init();
});
</script>
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
<script src="ajax.js"></script>

</body>

</html>