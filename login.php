<?php
include("functions/init.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title -->
    <title>Paradise Model School ~ Bursary</title>

    <!-- Favicon -->
    <link rel="icon" href="img/2.png">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
</head>

<body class="hold-transition lockscreen">
    <!-- Automatic element centering -->
    <div class="lockscreen-wrapper">
        <div class="lockscreen-logo">
            <a href="https://paradisemodelschool.com.ng"><b>Paradise Bursary</b></a>
        </div>
        <!-- User name -->
        <div class="lockscreen-name">Admin Login</div>


        <!-- START LOCK SCREEN ITEM -->
        <div class="lockscreen-item">
            <!-- lockscreen image -->
            <div class="lockscreen-image">
                <img src="img/2.png" alt="Admin">
            </div>
            <!-- /.lockscreen-image -->

            <!-- lockscreen credentials (contains the form) -->

            <form method="post" class="lockscreen-credentials">
                <div class="input-group">
                    <input type="password" name="password" id="pword" class="form-control" placeholder="password">

                    <div class="input-group-append">
                        <button type="button" name="submit" id="submit" class="btn"><i
                                class="fas fa-arrow-right text-muted"></i></button>
                    </div>
                </div>
            </form>
            <!-- /.lockscreen credentials -->

        </div>
        <!-- /.lockscreen-item -->
        <div class="help-block text-center">
            Enter your password to retrieve your session
        </div>

        <div class="lockscreen-footer text-center">
            Copyright &copy; <?php echo date("Y"); ?> <b><a href="https://paradisemodelschool.com.ng"
                    class="text-black">Paradise Model School</a></b><br>
            Developed by <a target="_blank" href="https://hynitr.com" class="text-black"> hynitr</a>
        </div>
    </div>
    <!-- /.center -->


    <!-- Modal -->
    <div class="modal fade" id="ModalCenter">
        <div class="modal-dialog modal-dialog-centered" role="document">

        </div>
    </div>


    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
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