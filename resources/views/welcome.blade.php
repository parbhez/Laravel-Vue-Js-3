<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Laravel Vue 3</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ url('assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{url('assets/modules/summernote/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{url('assets/modules/jquery-selectric/selectric.css')}}">
    <link rel="stylesheet" href="{{url('assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/components.css') }}">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>

            @include('partials.nav')
            @include('partials.sidebar')



            <!-- Main Content -->
            @yield('content')

            @include('partials.footer')
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ url('assets/modules/jquery.min.js') }}"></script>
    <script src="{{ url('assets/modules/popper.js') }}"></script>
    <script src="{{ url('assets/modules/tooltip.js') }}"></script>
    <script src="{{ url('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ url('assets/modules/moment.min.js') }}"></script>
    <script src="{{ url('assets/js/stisla.js') }}"></script>

    <!-- JS Libraies -->
    <script src="{{ url('assets/modules/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ url('assets/modules/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ url('assets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>
    <script src="{{ url('assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>
    <script src="{{ url('assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ url('assets/js/page/components-table.js') }}"></script>
    <script src="{{ url('assets/js/page/features-post-create.js') }}"></script>
    <script src="{{url('assets/js/page/features-posts.js')}}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"></script> --}}

    <!-- Template JS File -->
    <script src="{{ url('assets/js/scripts.js') }}"></script>
    <script src="{{ url('assets/js/custom.js') }}"></script>



</body>

</html>
