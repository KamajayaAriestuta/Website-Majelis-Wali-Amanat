<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <title>Argon Dashboard 2 Tailwind by Creative Tim</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    <link href="{{ asset('template_admin/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('template_admin/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Popper -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <!-- Main Styling -->
    <link href="{{ asset('template_admin/css/argon-dashboard-tailwind.css?v=1.0.1') }}" rel="stylesheet" />
  </head>

  <body class="m-0 font-sans text-base antialiased font-normal leading-default bg-gray-50 text-slate-500">
    <div class="absolute w-full bg-blue-500 min-h-75"></div>
    
    <!-- sidenav  -->
    @include('admin.layouts.sidenav')
    <!-- end sidenav -->

    <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
      <!-- Navbar -->
      @include('admin.layouts.navbar')
      <!-- end Navbar -->
      
      <!-- Content -->
      <div class="w-full px-6 py-6 mx-auto">
        @yield('content')
      </div>
      <!-- end Content -->
    </main>

    <!-- Fixed Plugin -->
    <div fixed-plugin>
      <!-- Plugin content here -->
    </div>

    <!-- Scripts -->
    <script src="{{ asset('template_admin/js/plugins/chartjs.min.js') }}" async></script>
    <script src="{{ asset('template_admin/js/plugins/perfect-scrollbar.min.js') }}" async></script>
    <script src="{{ asset('template_admin/js/argon-dashboard-tailwind.js?v=1.0.1') }}" async></script>
    <script src="//unpkg.com/alpinejs" defer></script>
  </body>
</html>