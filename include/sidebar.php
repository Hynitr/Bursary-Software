<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title -->
    <title>Paradise Model School ~ Bursary</title>
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="icon" href="img/2.png" type="image/ico" />
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
</head>

<body class="hold-KG 1 sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="https://paradisemodelschool.com.ng" class="nav-link">Website</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="https://hynitr.com/contact" target="_blank" class="nav-link">Dashboard Help</a>
                </li>
            </ul>

        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="./" class="brand-link">
                <img src="img/2.png" alt="Paradise Model School School ~ Bursary"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Paradise Bursary</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">

                    </div>
                    <div class="info">
                        <?php 
                    
                    //get term
                    $ssl = "SELECT * FROM admin";
                    $rsl = query($ssl);
                    $row = mysqli_fetch_array($rsl);

                    $_SESSION['trm'] = $row['term'];
                    $_SESSION['aca'] = $row['session'];
                    ?>
                        <a href="#" class="d-block" <b><?php echo $_SESSION['aca']; ?> Academic Session</b></a>
                        <small style="color: white" class="text-center">Academic Term.:
                            <?php echo $row['term']; ?></small>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item has-treeview">
                            <a href="./" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Dashboard
                                    <i class="right fas fa-angle-right"></i>
                                </p>
                            </a>

                        </li>
                        <br />
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-list"></i>
                                <p>
                                    Intake
                                    <i class="fas fa-angle-right right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="./register" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Register Intake</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./pintake" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Preview Intake</p>
                                    </a>
                                </li>


                            </ul>
                        </li>
                        <br />
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-credit-card"></i>
                                <p>
                                    Custom Fee
                                    <i class="fas fa-angle-right right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="./tracker" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Expenses Tracker</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./paymenttracker" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Payment Tracker</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./cusprev" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Preview Custom Fee</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./createcustom" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Create New Fee</p>
                                    </a>
                                </li>
                                <?php
                                $sql = "SHOW TABLES";
                                $result = query($sql);
                                while ($row = mysqli_fetch_row($result)) {
                                    if($row[0] == "admin" || $row[0] == "feercrd" || $row[0] == "spillover" || $row[0] == "student" || $row[0] == "fee" || $row[0] == "tracker" || $row[0] == "ses") {
                                    } else {
                                    echo'
                                <li class="nav-item">
                                    <a href="./custom?id='.$row[0].'" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>'.ucwords($row[0]).'</p>
                                    </a>
                                </li>';
                                    }
                                }
                                ?>

                            </ul>
                        </li>
                        <br />
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Input Fee Record
                                    <i class="fas fa-angle-right right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="./input?id=Reception" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Reception</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./input?id=KG 1" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>KG 1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./input?id=KG 2" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>KG 2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./input?id=Nursery 1" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Nursery 1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./input?id=Nursery 2" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Nursery 2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./input?id=Basic 1" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Basic 1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./input?id=Basic 2" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Basic 2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./input?id=Basic 3" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Basic 3</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./input?id=Basic 4" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Basic 4</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./input?id=Basic 5" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Basic 5</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./input?id=J.S.S 1" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>J.S.S 1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./input?id=J.S.S 2" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>J.S.S 2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./input?id=J.S.S 3" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>J.S.S 3</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./input?id=S.S.S 1" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>S.S.S 1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./input?id=S.S.S 2" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>S.S.S 2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./input?id=S.S.S 3" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>S.S.S 3</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <br />
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    All Payment History
                                    <i class="right fas fa-angle-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="./allhistory?id=Reception" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Reception</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./allhistory?id=KG 1" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>KG 1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./allhistory?id=KG 2" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>KG 2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./allhistory?id=Nursery 1" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Nursery 1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./allhistory?id=Nursery 2" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Nursery 2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./allhistory?id=Basic 1" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Basic 1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./allhistory?id=Basic 2" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Basic 2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./allhistory?id=Basic 3" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Basic 3</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./allhistory?id=Basic 4" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Basic 4</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./allhistory?id=Basic 5" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Basic 5</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./allhistory?id=J.S.S 1" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>J.S.S 1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./allhistory?id=J.S.S 2" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>J.S.S 2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./allhistory?id=J.S.S 3" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>J.S.S 3</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./allhistory?id=S.S.S 1" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>S.S.S 1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./allhistory?id=S.S.S 2" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>S.S.S 2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./allhistory?id=S.S.S 3" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>S.S.S 3</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <br />
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-history"></i>
                                <p>
                                    Payment History
                                    <i class="right fas fa-angle-right"></i>
                                </p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="./transaction?id=Reception" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Reception</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./transaction?id=KG 1" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>KG 1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./transaction?id=KG 2" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>KG 2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./transaction?id=Nursery 1" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Nursery 1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./transaction?id=Nursery 2" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Nursery 2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./transaction?id=Basic 1" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Basic 1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./transaction?id=Basic 2" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Basic 2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./transaction?id=Basic 3" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Basic 3</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./transaction?id=Basic 4" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Basic 4</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./transaction?id=Basic 5" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Basic 5</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./transaction?id=J.S.S 1" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>J.S.S 1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./transaction?id=J.S.S 2" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>J.S.S 2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./transaction?id=J.S.S 3" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>J.S.S 3</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./transaction?id=S.S.S 1" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>S.S.S 1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./transaction?id=S.S.S 2" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>S.S.S 2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./transaction?id=S.S.S 3" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>S.S.S 3</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <br />

                        <li class="nav-item has-treeview">
                            <a href="./debtors" class="nav-link">
                                <i class="nav-icon fas fa-eye"></i>
                                <p>
                                    View Debtors
                                    <i class="right fas fa-angle-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="./debt" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>View All Debtors</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./recprev?id=Reception" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Reception</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./recprev?id=KG 1" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>KG 1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./recprev?id=KG 2" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>KG 2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./recprev?id=Nursery 1" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Nursery 1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./recprev?id=Nursery 2" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Nursery 2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./recprev?id=Basic 1" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Basic 1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./recprev?id=Basic 2" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Basic 2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./recprev?id=Basic 3" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Basic 3</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./recprev?id=Basic 4" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Basic 4</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./recprev?id=Basic 5" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Basic 5</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./recprev?id=J.S.S 1" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>J.S.S 1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./recprev?id=J.S.S 2" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>J.S.S 2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./recprev?id=J.S.S 3" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>J.S.S 3</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./recprev?id=S.S.S 1" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>S.S.S 1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./recprev?id=S.S.S 2" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>S.S.S 2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./recprev?id=S.S.S 3" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>S.S.S 3</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <br />
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-credit-card"></i>
                                <p>
                                    Spill Over
                                    <i class="fas fa-angle-right right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="./viewspill" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View Spill Over</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pay Spill Over</p>
                                    </a>

                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="./payspill?id=Reception" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Reception</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="./payspill?id=KG 1" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>KG 1</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="./payspill?id=KG 2" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>KG 2</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="./payspill?id=Nursery 1" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Nursery 1</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="./payspill?id=Nursery 2" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Nursery 2</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="./payspill?id=Basic 1" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Basic 1</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="./payspill?id=Basic 2" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Basic 2</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="./payspill?id=Basic 3" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Basic 3</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="./payspill?id=Basic 4" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Basic 4</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="./payspill?id=Basic 5" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Basic 5</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="./payspill?id=J.S.S 1" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>J.S.S 1</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="./payspill?id=J.S.S 2" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>J.S.S 2</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="./payspill?id=J.S.S 3" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>J.S.S 3</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="./payspill?id=S.S.S 1" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>S.S.S 1</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="./payspill?id=S.S.S 2" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>S.S.S 2</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="./payspill?id=S.S.S 3" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>S.S.S 3</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>


                            </ul>
                        </li>
                        <br />
                        <li class="nav-item has-treeview">
                            <a href="./logout" class="nav-link">
                                <i class="nav-icon fas fa-lock"></i>
                                <p>
                                    Logout
                                    <i class="fas fa-angle-right right"></i>
                                </p>
                            </a>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>