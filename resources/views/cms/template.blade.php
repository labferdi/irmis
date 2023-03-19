<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/adminlte.min.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}"> -->
    
    <style>
        .toast-message > strong {
            font-weight: 700;
            text-transform: capitalize !important;
        }
        .toasts-bottom-right { bottom:5rem; right: 1rem; }
    </style>
    @yield('custom_style')

</head>
<body class="sidebar-mini layout-fixed">

    <div class="wrapper">

        @include('cms/includes/navbar')

        @include('cms/includes/sidebar')

        @yield('content')

    </div>
    <!-- /.wrapper -->

    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/js/adminlte.js') }}"></script>
    
    @if( session('message_success') )
    <script>
    toastr.options = { positionClass: 'toast-bottom-rig2ht', "closeButton": true, "timeOut": 2000, "progressBar": true, }
    toastr.success("{!! session('message_success')['message'] !!}", "{!! session('message_success')['subject'] !!}");
    </script>
    @endif
    @if( session('message_info') )
    <script>
    toastr.options = { positionClass: 'toast-bottom-rig2ht', "closeButton": true, "timeOut": 2000, "progressBar": true, }
    toastr.info("{!! session('message_info')['message'] !!}", "{!! session('message_info')['subject'] !!}");
    </script>
    @endif
    @if( session('message_warning') )
    <script>
    toastr.options = { positionClass: 'toast-bottom-right', "closeButton": true, "timeOut": 5000, "progressBar": true, }
    toastr.warning("{!! session('message_warning')['message'] !!}", "{!! session('message_warning')['subject'] !!}");
    </script>
    @endif
    @if( session('message_error') )
    <script>
    toastr.options = { positionClass: 'toast-bottom-right', "closeButton": true, "timeOut": 5000, "progressBar": true, }
    toastr.error("{!! session('message_error')['message'] !!}", "{!! session('message_error')['subject'] !!}");
    </script>
    @endif

    @yield('custom_script')
</body>
</html>