<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern,  html5, responsive">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>SIGPA</title>

    <!-- Ajoutez ces lignes pour inclure Bootstrap (si ce n'est pas déjà inclus) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Ajoutez ces lignes pour inclure Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

   

    <style>
        .alert0n{
            position: relative;
            top: -10px;
            color: white;
        }
        .sidebar .sidebar-menu>ul>li.active a {
            background: #325194;
            border-radius: 5px;
        }
        .sidebar .sidebar-menu>ul>li>a {
            padding: 10px 15px;
            position: relative;
            color: #325194;
        }
        .sidebar .sidebar-menu>ul>li>a:hover {
            background: #325194;
            color: #fff;
            border-radius: 5px;
        }
    </style>

</head>

<body>
    <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div>
    <div class="main-wrapper">
        @include('partials.header')
        @include('partials.sidebar')
        @include('flash-toastr::message')
        @yield('content')
    </div>

    <script>
        $(document).ready(function() {
            // Fonction pour lancer l'impression
            function printContent() {
                window.print();
            }

            // Ajoutez un gestionnaire de clic au bouton d'impression
            $('#printBtn').on('click', function() {
                printContent();
            });
        });

    </script>

    <script src="{{asset('assets/js/feather.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/plugins/apexchart/apexcharts.min.js')}}"></script>
    <script src="{{asset('assets/plugins/apexchart/chart-data.js')}}"></script>
    <script src="{{asset('assets/js/script.js')}}"></script>

@yield('add-script')

</body>

</html>
