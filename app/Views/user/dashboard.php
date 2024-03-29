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
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" crossorigin=""></script>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" crossorigin=""/>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="<?= base_url('user/dashboard') ?>">
    <img src="https://upload.wikimedia.org/wikipedia/commons/b/b2/Lambang_Kabupaten_Sumedang.png" alt="Logo Kabupaten Sumedang" style="max-height: 40px; max-width: 40px; margin-right: 10px;">PBB CIPASANG</a>


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
                                    <a class="nav-link collapsed" href="<?= base_url('/user/read_bangunan') ?>">
                                        DATA BANGUNAN
                                    </a>
                                    <a class="nav-link collapsed" href="<?= base_url('/user/read_warga') ?>">
                                        DATA WARGA
                                    </a>
                                </nav>
                            </div>

                            <a class="nav-link" href="<?= base_url('/user/history_transaksi') ?>">
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
                            <a class="btn btn-light" href="<?= base_url('/user/read_bangunan') ?>">View Details <i class="fas fa-arrow-right"></i></a>
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
                            <a class="btn btn-light" href="<?= base_url('/user/read_warga') ?>">View Details <i class="fas fa-arrow-right"></i></a>
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
                            <a class="btn btn-light" href="<?= base_url('/user/history_transaksi') ?>">View Details <i class="fas fa-arrow-right"></i></a>
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
                            <a class="btn btn-light" href="<?= base_url('/user/history_transaksi') ?>">View Details <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="container-fluid px-4">
    <div class="d-flex align-items-center justify-content-between small">
        <div class="text-muted mx-auto text-center">
            <h2 class="font-weight-bold mb-3">SISTEM MONITORING PBB</h2>
            <p class="lead">Desa Cipasang</p>
        </div>
    </div>
</div>
<div class="container-fluid px-4">
    <div class="card">
        <div class="card-body">
            <div class="tittle">Informasi</div>
            <hr>
            <div class="text">
                <p class="lead">
                    Informasi pembayaran pajak bumi dan bangunan untuk tahun 2024 Desa Cipasang.
                </p>
                <p>
                    Batas pembayaran pajak bumi dan bangunan hingga Desember 2024. Kami mengharapkan perhatian dari wajib pajak untuk segera melakukan pembayaran.
                </p>
                <p>Hatur Nuhun</p>
            </div>
        </div>
    </div>
</div>
<br>
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
                            <div class="col-lg-6">
            <!-- Tambahkan card atau container untuk peta jika diperlukan -->
            <div class="card mb-4">
                <!-- Sesuaikan card-header jika diperlukan -->
                <div class="card-header">
                    <i class="fas fa-map me-1"></i>
                    Peta
                </div>
                <!-- Sesuaikan card-body jika diperlukan -->
                <div class="card-body">
                <div id="map" style="height: 400px;"></div>
                </div>
            </div>
        </div>
                        </div>
                    </div>
                </div>
                </main>
                <script>
    var map = L.map('map').setView([-6.974858435629338, 108.07219586677749], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    // Tambahkan marker untuk menandai wilayah Desa Cipasang
    L.marker([-6.974858435629338, 108.07219586677749]).addTo(map)
        .bindPopup('Desa Cipasang');
</script>
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
                            <div class="text-muted mx-auto text-center"> <!-- Menambahkan class "text-center" di sini -->
                                &copy; 2024 Sistem Monitoring Pembayaran Pajak Bumi dan Bangunan<br>
                                Desa Cipasang Kecamatan Cibugel Kabupaten Sumedang
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
