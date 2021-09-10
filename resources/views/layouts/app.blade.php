<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ $title ?? 'Akiola Entreprises' }}</title>

    <script src="{{ asset('assets/js/everythingSangitLesuJS.js') }}"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/css/mdb.min.css') }}">


    <!-- Your custom styles (optional) -->


    @yield('extra-css')
</head>

<body class="fixed-sn white-skin">

    <!--Main Navigation-->
    <header>

        <!-- Sidebar navigation -->
        @include('layouts.sidebar')
        <!--/. Sidebar navigation -->

        <!-- Navbar -->

        @include('layouts.navigation')
        <!-- /.Navbar -->

    </header>
    <!--Main Navigation-->

    <!-- Main layout -->
    <main>
        <div class="container-fluid">
            @yield('contenu_page')
        </div>
    </main>
    <!-- Main layout -->

    <!-- Footer -->

    <!-- Footer -->

    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="{{ asset('assets/js/popper.min.js') }}"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{ asset('assets/js/mdb.min.js') }}"></script>
    <!--Custom scripts-->

    @yield('extra-js')
    <script>
        // Material Select Initialization
        /* $(document).ready(function() {
            $('.mdb-select').material_select();
        }); */
        // SideNav Initialization
        $(".button-collapse").sideNav();

        var container = document.querySelector('.custom-scrollbar');
        Ps.initialize(container, {
            wheelSpeed: 2,
            wheelPropagation: true,
            minScrollbarLength: 20
        });

    </script>
</body>

</html>
