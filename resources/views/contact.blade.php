<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Contact - NEWSROOM</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="{{ asset('img/favicon.ico') }}" rel="icon">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>

    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row align-items-center py-2 px-lg-5">
            <div class="col-lg-4">
                <a href="{{ url('/') }}" class="navbar-brand">
                    <h1 class="m-0 display-5 text-uppercase"><span class="text-primary">News</span>Room</h1>
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <div class="container-fluid p-0 mb-3">
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-2 py-lg-0 px-lg-5">
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">
                    <a href="{{ url('/') }}" class="nav-item nav-link">Home</a>
                    <a href="{{ url('/categories') }}" class="nav-item nav-link">Categories</a>
                    <a href="{{ url('/contact') }}" class="nav-item nav-link active">Contact</a>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

    <div class="container-fluid py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="mb-4 text-uppercase font-weight-bold">Get In Touch</h2>
                    <p class="mb-4">Have a question, tip, or feedback? We'd love to hear from you.</p>
                    <div class="bg-light p-4">
                        <p class="mb-1"><i class="fa fa-envelope mr-2"></i> contact@newsroom.com</p>
                        <p class="mb-1"><i class="fa fa-phone mr-2"></i> +92 300 0000000</p>
                        <p class="m-0"><i class="fa fa-map-marker-alt mr-2"></i> Lahore, Pakistan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        @include('partials.footer')
    </div>

</body>
</html>