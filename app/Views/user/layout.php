<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <link rel="stylesheet" type="text/css" href="<?= base_url('/') ?>/admin/css/data-pemohon.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('/') ?>/admin/css/data-tables.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('/') ?>/admin/css/global.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('/') ?>/user/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('/') ?>/user/css/form-lakwas.css">
    <link rel="stylesheet" href="<?= base_url() ?>/dist/css/adminlte.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title></title>
</head>

<body style="background-color: #fafafa">

    <nav class="navbar navbar-expand-lg navbar-dispertaru">
        <div class="container-fluid">
            <a href="/" name="logo" class="navbar-brand"><img class="logo" src="<?= base_url('/') ?>/user/image/logo.png" alt="">DISPERTARU DIY</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav">
                        <li class="nav-item mx-3">
                            <a class="nav-link <?= url_is('/') ? 'active' : ''; ?>" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item mx-3">
                            <a class="nav-link <?= url_is('form') ? 'active' : ''; ?>" aria-current="page" href="<?= base_url('form') ?>">FORM PERMOHONAN</a>
                        </li>
                        <li class="nav-item mx-3">
                            <a class="nav-link <?= url_is('cek-dokumen') ? 'active' : ''; ?>" aria-current="page" href="<?= base_url('cek-dokumen') ?>">CEK STATUS PEMOHON</a>
                        </li>
                </ul>
            </div>
        </div>
    </nav>

    <?= $this->renderSection('content') ?>

    <footer>
        <div class="no 1"></div>
        <h4>Copyright, 2022</h4>
        <div class="no 2"></div>
    </footer>

     <!-- Bootstrap 4 -->
     <script src="<?= base_url() ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url() ?>/dist/js/demo.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                info: false,
                responsive: true
            });
        });
    </script>

    <?= $this->renderSection('script') ?>

</body>

</html>