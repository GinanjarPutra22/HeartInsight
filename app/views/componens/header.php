<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>HeartInsight</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="<?= BASEURL ?>/public/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= BASEURL ?>/public/lib/animate/animate.min.css" rel="stylesheet">
    <link href="<?= BASEURL ?>/public/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= BASEURL ?>/public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?= BASEURL ?>/public/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0 px-4 px-lg-5">
        <a href="index.html" class="navbar-brand d-flex align-items-center">
            <h2 class="m-0 text-primary"><img class="img-fluid me-2" src="<?= BASEURL?>/public/img/Logo.svg" alt=""
                    style="width: 45px;">HeartInsight</h2>
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-4 py-lg-0">
                <a href="<?= BASEURL?>/" class="nav-item nav-link <?= ($data['judul'] === 'Dashboard') ? 'active' : '' ?>">Home</a>
                <a href="<?= BASEURL?>/berita" class="nav-item nav-link <?= ($data['judul'] === 'Berita') ? 'active' : '' ?>">Berita</a>
                <a href="<?= BASEURL?>/cek_jantung" class="nav-item nav-link <?= ($data['judul'] === 'Jantung') ? 'active' : '' ?>">Cek Jantung</a>
                <a href="<?= BASEURL?>/tentang_kami" class="nav-item nav-link <?= ($data['judul'] === 'Tentang Kami') ? 'active' : '' ?>">Tentang Kami</a>


            </div>
            <!-- <div class="h-100 d-lg-inline-flex align-items-center d-none">
                <a class="btn btn-square rounded-circle bg-light text-primary me-2" href=""><i
                        class="fab fa-facebook-f"></i></a>
                <a class="btn btn-square rounded-circle bg-light text-primary me-2" href=""><i
                        class="fab fa-twitter"></i></a>
                <a class="btn btn-square rounded-circle bg-light text-primary me-0" href=""><i
                        class="fab fa-linkedin-in"></i></a>
            </div> -->
        </div>
    </nav>
    <!-- Navbar End -->
