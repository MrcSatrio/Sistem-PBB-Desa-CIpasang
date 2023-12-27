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
            <a class="navbar-brand ps-3" href="index.html">SISTEM INFROMASI PBB</a>

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
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">UPDATE WARGA</h1>
                        <div class="card mb-4">
                            <div class="card-body">
                            <form action="<?= base_url('/admin/action_update_warga') ?>" method="post">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama" id="nama" aria-describedby="nama" value="<?php echo $warga['nama'] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="nik" class="form-label">NIK</label>
                                <input type="number" class="form-control" name="nik" id="nik" value="<?php echo $warga['nik'] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="no_hp" class="form-label">No Handphone</label>
                                <input type="number" class="form-control" name="no_hp" id="no_hp" value="<?php echo $warga['no_telepon'] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="3" required><?php echo $warga['alamat'] ?></textarea>
                            </div>
                            <input type="hidden" name="id_warga" value="<?php echo $warga['id_warga'] ?>">

                            <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </main>
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