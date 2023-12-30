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
      <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Ajoutez ces lignes pour inclure Bootstrap (si ce n'est pas déjà inclus) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/dataTables.bootstrap4.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/all.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>
<body>
    <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div>
<div class="main-wrapper">
        @include('partials.header')

        @include('partials.sidebar')

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

    <script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>

    <script src="{{asset('assets/js/feather.min.js')}}"></script>

    <script src="{{asset('assets/js/jquery.slimscroll.min.js')}}"></script>

    <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>

    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{asset('assets/plugins/apexchart/apexcharts.min.js')}}"></script>
    <script src="{{asset('assets/plugins/apexchart/chart-data.js')}}"></script>

    <script src="{{asset('assets/js/script.js')}}"></script>
</body>
</html>
