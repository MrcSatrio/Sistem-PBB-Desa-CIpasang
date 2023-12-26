<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?= $title; ?></title>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="<?= base_url('css/styles.css'); ?>" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">SISTEM INFORMASI PBB</a>

            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group"></div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="<?= base_url('/logout') ?>">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="<?= base_url('/admin/dashboard') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                DATA
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        BANGUNAN
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="<?= base_url('/admin/read_bangunan') ?>">DATA BANGUNAN</a>
                                            <a class="nav-link" href="<?= base_url('/admin/create_bangunan') ?>">TAMBAH BANGUNAN</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        WARGA
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="<?= base_url('/admin/read_warga') ?>">DATA WARGA</a>
                                            <a class="nav-link" href="<?= base_url('/admin/create_warga') ?>">TAMBAH WARGA</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <a class="nav-link" href="<?= base_url('/admin/transaksi') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-money-bill"></i></div>
                                Input Transaksi
                            </a>
                            <a class="nav-link" href="<?= base_url('/admin/history_transaksi') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-history"></i></div>
                                Riwayat
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <br>
            <main>
                <div class="container">
            
            <div class="row">
            <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-header">
                            <h5 class="card-title m-0">Total Bangunan Terdata</h5>
                        </div>
                        <div class="card-body">
                            <h1 class="display-4"><?= $totalbangunan[0]['total_bangunan']; ?></h1>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="btn btn-light" href="#">View Details <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-header">
                            <h5 class="card-title m-0">Total Warga Terdata</h5>
                        </div>
                        <div class="card-body">
                            <h1 class="display-4"><?= $totalwarga[0]['total_warga']; ?></h1>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="btn btn-light" href="#">View Details <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-header">
                            <h5 class="card-title m-0">Total PBB Tahun Ini</h5>
                        </div>
                        <div class="card-body">
                        <?php
                        $total_pembayaran = $totalpembayaran[0]['total_pembayaran'];
                        $formatted_total = number_format($total_pembayaran, 0, ',', '.');
                        ?>
                            <h1 class="display-4"><?= "Rp {$formatted_total}" ?></h1>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="btn btn-light" href="#">View Details <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-header">
                            <h5 class="card-title m-0">Total PBB Tahun Lalu</h5>
                        </div>
                        <div class="card-body">
                        <?php
                        $total_pembayaran2 = $transaksitahunlalu[0]['transaksitahunlalu'];
                        $formatted_total = number_format($total_pembayaran2, 0, ',', '.');
                        ?>
                            <h1 class="display-4"><?= "Rp {$formatted_total}" ?></h1>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="btn btn-light" href="#">View Details <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

            </div>
                    <div class="container-fluid px-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-pie me-1"></i>
                                        Total Bangunan Lunas PBB
                                    </div>
                                    <div class="card-body"><canvas id="myPieChart" width="100%" height="50"></canvas></div>
                                    <!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> !-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </main>
                <script>
                    // Retrieve data from PHP
                    var transactionsGroupedByDusun = <?= json_encode($transactionsGroupedByDusun); ?>;

                    // Extract labels and data for the chart
                    var dusunNames = transactionsGroupedByDusun.map(function (item) {
                        return item.dusun_name;
                    });

                    var totalBangunan = transactionsGroupedByDusun.map(function (item) {
                        return item.total_bangunan;
                    });

                    // Chart.js
                    var ctx = document.getElementById("myPieChart");
                    var myPieChart = new Chart(ctx, {
                        type: 'pie',
                        data: {
                            labels: dusunNames,
                            datasets: [{
                                data: totalBangunan,
                                backgroundColor: ['#FF5733', '#33FF57', '#5733FF', '#FF5733', '#33FF57', '#5733FF'], // Add more colors as needed
                            }],
                        },
                    });
                </script>
                
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url('js/scripts.js'); ?>"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url('assets/demo/chart-area-demo.js'); ?>"></script>
        <script src="<?= base_url('assets/demo/chart-bar-demo.js'); ?>"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url('js/datatables-simple-demo.js'); ?>"></script>
    </body>
</html>
