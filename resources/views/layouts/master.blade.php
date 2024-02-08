<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('Judul')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('template/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('template/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('template/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Navbar Start -->
    @include('partial.navbar')
    <!-- Navbar End -->

    <!-- Sidebar -->
    @include('partial.sidebar')
    <!-- /.sidebar -->

    <!-- Blank Start -->
    <div class="container-fluid pt-4 px-4 ">
        <div class="row vh-100 bg-light rounded  mx-0 my-3">
            <div class="col-md-6 my-2">
                <h3>@yield('judul')</h3>
                @yield('content')
            </div>
        </div>
    </div>
    <!-- Blank End -->

    <!-- Footer Start -->
    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            
        <b>&copy; <a href="#">Your Site Name</a>, All Right Reserved. </b>
        </div>
        
        <strong>Designed By <a href="https://htmlcodex.com">HTML Codex</a></strong>                

        
    </footer>
    
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Template Javascript -->
    <script src="{{('template/js/main.js') }}"></script>
    @stack('script')
</body>

</html>
