<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <title>Majelis Wali Amanat Universitas Brawijaya</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Majelis Wali Amanat, MWA, Universitas Brawijaya, PTN-BH, Komite Audit" name="keywords">
        <meta content="Website resmi Majelis Wali Amanat (MWA) Universitas Brawijaya: anggota, kegiatan, dan produk hukum." name="description">

        <!-- Favicon -->
        <link href="{{ asset('template_user/img/favicon.ico') }}" rel="icon">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="{{ asset('template_user/lib/flaticon/font/flaticon.css') }}" rel="stylesheet">
        <link href="{{ asset('template_user/lib/animate/animate.min.css') }}" rel="stylesheet">
        <link href="{{ asset('template_user/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('template_user/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
        <link href="{{ asset('template_user/lib/slick/slick.css') }}" rel="stylesheet">
        <link href="{{ asset('template_user/lib/slick/slick-theme.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


        <!-- Template Stylesheet -->
        <link href="{{ asset('template_user/css/style.css') }}" rel="stylesheet">
        @stack('styles')
    </head>

    <body>
        <div class="wrapper">
            <!-- Top Bar Start -->
            @include('user.layouts.topbar')
            <!-- Top Bar End -->

            <!-- Nav Bar Start -->
            @include('user.layouts.navbar')
            <!-- Nav Bar End -->

            <!-- Content Start -->
            @yield('content')
            <!-- Content End -->

            <!-- Footer Start -->
            @include('user.layouts.footer')
            
            <!-- Footer End -->

            <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        </div>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('template_user/lib/easing/easing.min.js') }}"></script>
        <script src="{{ asset('template_user/lib/wow/wow.min.js') }}"></script>
        <script src="{{ asset('template_user/lib/owlcarousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('template_user/lib/isotope/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('template_user/lib/lightbox/js/lightbox.min.js') }}"></script>
        <script src="{{ asset('template_user/lib/waypoints/waypoints.min.js') }}"></script>
        <script src="{{ asset('template_user/lib/counterup/counterup.min.js') }}"></script>
        <script src="{{ asset('template_user/lib/slick/slick.min.js') }}"></script>

        <!-- Template Javascript -->
        <script src="{{ asset('template_user/js/main.js') }}"></script>
    </body>
</html>
