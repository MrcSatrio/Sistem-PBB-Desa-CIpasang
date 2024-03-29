<!DOCTYPE html>
<?php
$flashsuccess = session()->getFlashdata('success');
$flasherror = session()->getFlashdata('error');
?>

<?php if (!empty($flashsuccess) || !empty($flasherror)): ?>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        <?php if (!empty($flashsuccess)): ?>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            html: '<?= esc($flashsuccess) ?>',
            confirmButtonText: 'OK'
        });
        <?php endif; ?>

        <?php if (!empty($flasherror)): ?>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            html: '<?php if (is_array($flasherror)): ?><ul><?php foreach ($flasherror as $error): ?><li><?= esc($error) ?></li><?php endforeach; ?></ul><?php else: ?><?= esc($flasherror) ?><?php endif; ?>',
            confirmButtonText: 'OK'
        });
        <?php endif; ?>
    });
</script>
<?php endif; ?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?= $title; ?></title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="<?= base_url('css/styles.css'); ?>" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="<?= base_url('admin/dashboard') ?>">
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
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">TAMBAH TRANSAKSI</h1>
                        <div class="card mb-4">
                            <div class="card-body">
                            <form action="<?= base_url('/admin/transaksi') ?>" method="post">
                            <label for="exampleDataList" class="form-label">Nama Lengkap</label>
                                <input class="form-control" list="datalistOptions" id="exampleDataList" name="nama" required>
                                <datalist id="datalistOptions">
                                <?php $i = 1;
                                        foreach ($warga as $wr) : ?>
                                <option value="<?= $wr['nama']; ?>">
                                            <?php endforeach ?>
                                </datalist>
                            <div class="mb-3">
                                <label for="njop" class="form-label">NJOP</label>
                                <input type="text" class="form-control" name="njop" id="njop" required>
                            </div>
                            <div class="mb-3">
                                <label for="kadus" class="form-label">Kepala Dusun</label>
                                <input type="text" class="form-control" name="kadus" id="kadus" required>
                            </div>

                            <div class="mb-3">
                                <label for="bayar" class="form-label">Jumlah Pembayaran</label>
                                <input type="number" class="form-control" name="bayar" id="bayar" required>
                            </div>
                            <?php $currentYear = date("Y");    ?>
                            <div class="mb-3">
                                <label for="tahun" class="form-label">Tahun</label>
                                <input type="text" class="form-control" name="tahun" id="tahun" value="<?= $currentYear ?>">
                            </div>
                            
za
                            <input type="hidden" name="status" id="status" value="lunas">

                            <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </main>
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
            <script>
            document.addEventListener("DOMContentLoaded", function () {
                <?php if (!empty($flashsuccess)): ?>
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    html: '<?= esc($flashsuccess) ?>',
                    confirmButtonText: 'OK'
                });
                <?php endif; ?>

                <?php if (!empty($flasherror)): ?>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    html: '<?php if (is_array($flasherror)): ?><ul><?php foreach ($flasherror as $error): ?><li><?= esc($error) ?></li><?php endforeach; ?></ul><?php else: ?><?= esc($flasherror) ?><?php endif; ?>',
                    confirmButtonText: 'OK'
                });
                <?php endif; ?>
            });
        </script>
</html>
