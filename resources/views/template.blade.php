<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/adminlte.min.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}"> -->
</head>
<body class="sidebar-mini layout-fixed">

    <div class="wrapper">

        @include('includes/navbar')

        @include('includes/sidebar')

    </div>
    <!-- e:wrapper -->

    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/adminlte.js') }}"></script>

</body>
</html>