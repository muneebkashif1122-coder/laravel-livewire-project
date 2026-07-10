<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{ $category->name }} - NEWSROOM</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="{{ asset('img/favicon.ico') }}" rel="icon">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>

    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row align-items-center bg-light px-lg-5">
            <div class="col-12 col-md-8">
                <div class="d-flex justify-content-between">
                    <div class="bg-primary text-white text-center py-2" style="width: 100px;">Trending</div>
                    <div class="owl-carousel owl-carousel-1 tranding-carousel position-relative d-inline-flex align-items-center ml-3" style="width: calc(100% - 100px); padding-left: 90px;">
                        @foreach($trending as $trend)
                            <div class="text-truncate px-3">
                                <a class="text-secondary" href="{{ url('/post/' . $trend->id) }}">{{ $trend->title }}</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-right d-none d-md-block">
                {{ now()->format('l, F d, Y') }}
            </div>
        </div>
        <div class="row align-items-center py-2 px-lg-5">
            <div class="col-lg-4">
                <a href="{{ url('/') }}" class="navbar-brand d-none d-lg-block">
                    <h1 class="m-0 display-5 text-uppercase"><span class="text-primary">News</span>Room</h1>
                </a>
            </div>
            <div class="col-lg-8 text-center text-lg-right">
                <img class="img-fluid" src="{{ asset('img/ads-700x70.jpg') }}" alt="Advertisement">
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <div class="container-fluid p-0 mb-3">
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-2 py-lg-0 px-lg-5">
            <a href="{{ url('/') }}" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 display-5 text-uppercase"><span class="text-primary">News</span>Room</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">
                    <a href="{{ url('/') }}" class="nav-item nav-link">Home</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link active dropdown-toggle" data-toggle="dropdown">Categories</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="{{ url('/categories') }}" class="dropdown-item">All Categories</a>
                            @foreach($headerCategories as $hcat)
                                <a href="{{ url('/category/' . $hcat->id) }}" class="dropdown-item">{{ $hcat->name }}</a>
                            @endforeach
                        </div>
                    </div>
                    <a href="{{ url('/contact') }}" class="nav-item nav-link">Contact</a>
                </div>
                 <div class="ml-auto">
                    @livewire('search')
                </div>
            </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

    <div class="container-fluid py-3">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                <h3 class="m-0 text-uppercase font-weight-bold">{{ $category->name }}</h3>
            </div>

            <div class="row mb-3">
                @forelse($posts as $row)
                    <div class="col-lg-4">
                        <div class="position-relative mb-3">
                            <img class="img-fluid w-100" src="{{ asset('storage/' . $row->image) }}" style="object-fit: cover; height: 250px;">
                            <div class="bg-light p-3 border border-top-0">
                                <div class="mb-2" style="font-size: 14px;">
                                    <a href="{{ url('/category/' . $row->category_id) }}">{{ $row->category->name }}</a>
                                    <span class="px-1">/</span>
                                    <span>{{ $row->created_at->format('M d, Y') }}</span>
                                </div>
                                <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="{{ url('/post/' . $row->id) }}">{{ Str::limit($row->title, 40) }}</a>
                                <p class="m-0 text-muted" style="font-size: 14px;">{{ Str::limit(strip_tags($row->description), 100) }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <h3 class="px-3">No posts found in this category.</h3>
                @endforelse
            </div>
        </div>
    </div>

    <div class="footer">
        @include('partials.footer')
    </div>

    <a href="#" class="btn btn-dark back-to-top"><i class="fa fa-angle-up"></i></a>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>