<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link rel="shortcut icon" href="../public/img/logo/123.png" type="image/x-icon">
    <link href="../public/admin/css/style.css" rel="stylesheet" />
    <script src="../public/admin/js/all.js" crossorigin="anonymous"></script>
    <link href='https://fonts.googleapis.com/css?family=Jost' rel='stylesheet'>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body class="sb-nav-fixed">
    <?php include_once './view/inc/_navbar.php' ?>
    <div id="layoutSidenav">
        <?php include_once './view/inc/_sideleft.php' ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div
                                class=" text-white d-flex flex-column align-items-center justify-content-center border-end">
                                <i class='bx bxs-user fs-3 text-success'></i>
                                <div class="text-black fw-Bolder fs-2 m-0 lh-1">
                                    <?php echo $userQuantity ?>
                                </div>
                                <div class="fs-10 fw-Bolder text-secondary">User</div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div
                                class=" text-white d-flex flex-column align-items-center justify-content-center border-end">
                                <i class='bx bxs-cart fs-3 text-primary'></i>
                                <div class="text-black fw-Bolder fs-2 m-0 lh-1">
                                    <?php echo $orderQuantity ?>
                                </div>
                                <div class="fs-10 fw-Bolder text-secondary">Order</div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div
                                class=" text-white d-flex flex-column align-items-center justify-content-center border-end">
                                <i class='bx bxs-cube fs-3 text-warning'></i>
                                <div class="text-black fw-Bolder fs-2 m-0 lh-1">
                                    <?php echo $productQuantity ?>
                                </div>
                                <div class="fs-10 fw-Bolder text-secondary">Inventory</div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class=" text-white d-flex flex-column align-items-center justify-content-center">
                                <i class='bx bx-search fs-3 text-danger fw-bold'></i>
                                <div class="text-black fw-Bolder fs-2 m-0 lh-1">---</div>
                                <div class="fs-10 fw-Bolder text-secondary">Page Views</div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2022</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="../public/admin/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../public/admin/js/scripts.js"></script>
    <script src="../public/admin/js/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="../public/admin/js/simple-datatables@latest.js" crossorigin="anonymous"></script>
    <script src="../public/admin/js/datatables-simple-demo.js"></script>
</body>

</html>