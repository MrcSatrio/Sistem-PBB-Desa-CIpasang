<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.118.2">
    <title><?= $title; ?></title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-vtXRMe3mGCbOeY7l30aIg8H9p3GdeSe4IFlP6G8JMa7o7lXvnz3GFKzPxzJdPfGK" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Favicons -->
    <?php if (session()->has('error')) : ?>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    Swal.fire({
                        title: 'Gagal!',
                        icon: 'error',
                        text: '<?= session('error') ?>',
                    });
                });
            </script>
        <?php endif; ?>

    <meta name="theme-color" content="#712cf9">
    <style>
        body {
            height: 100%;
            background-image: url('<?php echo base_url('img/bg.png'); ?>');
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .btn-bd-primary {
            --bd-violet-bg: #712cf9;
            --bd-violet-rgb: 112.520718, 44.062154, 249.437846;
            --bs-btn-font-weight: 600;
            --bs-btn-color: var(--bs-white);
            --bs-btn-bg: var(--bd-violet-bg);
            --bs-btn-border-color: var(--bd-violet-bg);
            --bs-btn-hover-color: var(--bs-white);
            --bs-btn-hover-bg: #6528e0;
            --bs-btn-hover-border-color: #6528e0;
            --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
            --bs-btn-active-color: var(--bs-btn-hover-color);
            --bs-btn-active-bg: #5a23c8;
            --bs-btn-active-border-color: #5a23c8;
        }

        .bd-mode-toggle {
            z-index: 1500;
        }

        .bd-mode-toggle .dropdown-menu .active .bi {
            display: block !important;
        }

        body {
            height: 100%;
        }

        .form-signin {
            max-width: 330px;
            padding: 1rem;
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
    <!-- Custom styles for this template -->
</head>
<body class="d-flex align-items-center py-4 bg-body-tertiary">
<main class="form-signin w-100 m-auto">
    <form action="<?= base_url('/login') ?>" method="post">
        <img class="mb-4" src="<?php echo base_url('img/logo.png'); ?>" alt="Logo" width="250" height="160" class="mx-auto">
        <div class="text-center">
            <h1 class="h3 mb-3 fw-normal">Sistem Informasi PBB</h1>
            <h5 class="h5 mb-3 fw-normal">DESA CIPASANG</h5>
        </div>

        <div class="form-floating">
            <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="username">
            <label for="floatingInput">Username</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
            <label for="floatingPassword">Password</label>
        </div>

        <div class="form-check text-start my-3">
            <input class="form-check-input" type="checkbox" id="showPassword">
            <label class="form-check-label" for="showPassword">
                Lihat Password
            </label>
        </div>
        <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
    </form>

    <button class="btn btn-secondary w-100 mt-3" type="button" data-bs-toggle="modal" data-bs-target="#cekNOPModal">Cek NOP</button>
</main>

<div class="modal fade" id="cekNOPModal" tabindex="-1" aria-labelledby="cekNOPModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cekNOPModalLabel">Cek NOP Modal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Add your form inside the modal body -->
                <form id="cekNOPForm">
                    <div class="mb-3">
                        <label for="nopInput" class="form-label">NOP (Nomor Objek Pajak):</label>
                        <input type="text" class="form-control" id="nopInput" name="nop" required>
                    </div>
                    <!-- Add additional form fields if needed -->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="submitNOPForm()">Submit</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Mengambil elemen checkbox dan input password
    var checkbox = document.getElementById('showPassword');
    var passwordInput = document.getElementById('floatingPassword');

    // Menambahkan event listener untuk checkbox
    checkbox.addEventListener('change', function () {
        // Mengubah tipe input password berdasarkan status checkbox
        passwordInput.type = this.checked ? 'text' : 'password';
    });

    // Fungsi untuk menangani submit form NOP
    // Fungsi untuk menangani submit form NOP
    function submitNOPForm() {
    // Mengambil nilai NOP dari input
    var nopValue = document.getElementById('nopInput').value;
    
    // Mengirim data NOP ke server menggunakan AJAX
    $.ajax({
        type: 'POST',
        url: '/cek', // Sesuaikan dengan controller dan method yang Anda gunakan
        data: { nop: nopValue },
        success: function (response) {
            if (response.result && response.result !== null) {
                var data = response.result;
                console.log('Data ditemukan:', data);
    Swal.fire({
        icon: 'success',
        title: 'Data Ditemukan',
        text: 'Terimakasih Telah Melakukan Pembayaran PBB',
    });
} else {
    
    console.log('Data error:', response);
    Swal.fire({
        icon: 'error',
        title: 'Data Tidak Ditemukan',
        text: 'Pembayaran PBB anda belum tercatat.',
    });
}
    $('#cekNOPModal').modal('hide');
},

        error: function (xhr, textStatus, errorThrown) {
            console.error('Terjadi kesalahan saat mengirim permintaan AJAX:', textStatus, errorThrown);
            // Handle AJAX error, display an error message, or take appropriate action
        }
    });
}




</script>

</body>
</html>
