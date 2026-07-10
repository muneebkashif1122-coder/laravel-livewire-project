<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>NEWSROOM</title>
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
                <img class="img-fluid" src="{{ asset('img/ads-700x70.jpg') }}" alt="">
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
                    <a href="{{ url('/') }}" class="nav-item nav-link active">Home</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Categories</a>
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
        </nav>
    </div>
    <!-- Navbar End -->

    <!-- Top News Slider Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="owl-carousel owl-carousel-2 carousel-item-3 position-relative">
                @forelse($topSlider as $top)
                    <div class="d-flex">
                        <img src="{{ asset('storage/' . $top->image) }}" style="width: 80px; height: 80px; object-fit: cover;">
                        <div class="d-flex align-items-center bg-light px-3" style="height: 80px;">
                            <a class="text-secondary font-weight-semi-bold" href="{{ url('/post/' . $top->id) }}">
                                {{ Str::limit($top->title, 50) }}
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="p-3">No news available</p>
                @endforelse
            </div>
        </div>
    </div>
    <!-- Top News Slider End -->

    <!-- Main News Slider Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="owl-carousel owl-carousel-2 carousel-item-1 position-relative mb-3 mb-lg-0">
                        @foreach($mainSlider as $post)
                            <div class="position-relative overflow-hidden" style="height: 435px;">
                                <img class="img-fluid h-100" src="{{ asset('storage/' . $post->image) }}" style="object-fit: cover;">
                                <div class="overlay">
                                    <div class="mb-1">
                                        <a class="text-white" href="{{ url('/category/' . $post->category_id) }}">{{ $post->category->name }}</a>
                                        <span class="px-2 text-white">/</span>
                                        <a class="text-white" href="">{{ $post->created_at->format('M d, Y') }}</a>
                                    </div>
                                    <a class="h2 m-0 text-white font-weight-bold" href="{{ url('/post/' . $post->id) }}">{{ $post->title }}</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                        <h3 class="m-0">Categories</h3>
                        <a class="text-secondary font-weight-medium text-decoration-none" href="{{ url('/categories') }}">View All</a>
                    </div>
                    @foreach($sidebarCategories as $cat)
                        <div class="position-relative overflow-hidden mb-3" style="height: 80px;">
                            <img class="img-fluid w-100 h-100" src="{{ asset('img/cat-500x80-1.jpg') }}" style="object-fit: cover;">
                            <a href="{{ url('/category/' . $cat->id) }}" class="overlay align-items-center justify-content-center h4 m-0 text-white text-decoration-none d-flex">
                                {{ $cat->name }}
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Main News Slider End -->

    <!-- Featured News Slider Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                <h3 class="m-0 text-uppercase font-weight-bold">Featured</h3>
                <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
            </div>
            <div class="owl-carousel owl-carousel-2 carousel-item-4 position-relative">
                @foreach($featured as $row)
                    <div class="position-relative overflow-hidden" style="height: 300px;">
                        <img class="img-fluid w-100 h-100" src="{{ asset('storage/' . $row->image) }}" style="object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-1" style="font-size: 13px;">
                                <a class="text-white" href="{{ url('/category/' . $row->category_id) }}">{{ $row->category->name }}</a>
                                <span class="px-1 text-white">/</span>
                                <a class="text-white" href="">{{ $row->created_at->format('M d, Y') }}</a>
                            </div>
                            <a class="h4 m-0 text-white font-weight-bold" href="{{ url('/post/' . $row->id) }}">{{ Str::limit($row->title, 40) }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Featured News Slider End -->

    <!-- Category Rows Start -->
    @foreach($catRowCategories->chunk(2) as $pair)
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    @foreach($pair as $cat)
                        <div class="col-lg-6 py-3">
                            <div class="bg-light py-2 px-4 mb-3">
                                <h3 class="m-0">{{ $cat->name }}</h3>
                            </div>
                            <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">
                                @php $catPosts = \App\Models\Post::where('category_id', $cat->id)->latest('id')->take(4)->get(); @endphp
                                @forelse($catPosts as $post)
                                    <div class="position-relative">
                                        <img class="img-fluid w-100" src="{{ asset('storage/' . $post->image) }}" style="object-fit: cover; height: 200px;">
                                        <div class="overlay position-relative bg-light">
                                            <div class="mb-2" style="font-size: 13px;">
                                                <a href="{{ url('/category/' . $cat->id) }}">{{ $cat->name }}</a>
                                                <span class="px-1">/</span>
                                                <span>{{ $post->created_at->format('M d, Y') }}</span>
                                            </div>
                                            <a class="h4 m-0" href="{{ url('/post/' . $post->id) }}">{{ Str::limit($post->title, 35) }}</a>
                                        </div>
                                    </div>
                                @empty
                                    <p class="p-3 text-muted">No posts yet.</p>
                                @endforelse
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach
    <!-- Category Rows End -->

    <!-- News With Sidebar Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Popular Section -->
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                                <h3 class="m-0 text-uppercase font-weight-bold">Popular</h3>
                                <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
                            </div>
                        </div>
                        @foreach($popularMain as $main)
                            <div class="col-lg-6">
                                <div class="position-relative mb-3">
                                    <img class="img-fluid w-100" src="{{ asset('storage/' . $main->image) }}" style="object-fit: cover; height: 250px;">
                                    <div class="bg-light p-3 border border-top-0">
                                        <div class="mb-2" style="font-size: 14px;">
                                            <a href="{{ url('/category/' . $main->category_id) }}">{{ $main->category->name }}</a>
                                            <span class="px-1">/</span>
                                            <span>{{ $main->created_at->format('M d, Y') }}</span>
                                        </div>
                                        <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="{{ url('/post/' . $main->id) }}">{{ Str::limit($main->title, 40) }}</a>
                                        <p class="m-0 text-muted" style="font-size: 14px;">{{ Str::limit(strip_tags($main->description), 100) }}</p>
                                    </div>
                                </div>
                                @foreach($main->smallPosts as $small)
                                    <div class="d-flex mb-3 bg-light border">
                                        <img src="{{ asset('storage/' . $small->image) }}" style="width: 100px; height: 100px; object-fit: cover;">
                                        <div class="w-100 d-flex flex-column justify-content-center px-3" style="height: 100px;">
                                            <div class="mb-1" style="font-size: 13px;">
                                                <a href="{{ url('/category/' . $small->category_id) }}">{{ $small->category->name }}</a>
                                                <span class="px-1">/</span>
                                                <span>{{ $small->created_at->format('M d, Y') }}</span>
                                            </div>
                                            <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="{{ url('/post/' . $small->id) }}">{{ Str::limit($small->title, 35) }}</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>

                    <div class="mb-3 pb-3">
                        <a href=""><img class="img-fluid w-100" src="{{ asset('img/ads-700x70.jpg') }}" alt="Advertisement"></a>
                    </div>

                    <!-- Latest Today -->
                    @if($latestToday->count() > 0)
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                                    <h3 class="m-0 text-uppercase font-weight-bold">Latest Today</h3>
                                </div>
                            </div>
                            @foreach($latestToday as $late)
                                <div class="col-lg-6">
                                    <div class="position-relative mb-3">
                                        <img class="img-fluid w-100" src="{{ asset('storage/' . $late->image) }}" style="object-fit: cover; height: 250px;">
                                        <div class="bg-light p-3 border border-top-0">
                                            <div class="mb-2" style="font-size: 14px;">
                                                <a href="">{{ $late->category->name }}</a>
                                                <span class="px-1">/</span>
                                                <span>{{ $late->created_at->format('M d, Y') }}</span>
                                            </div>
                                            <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="{{ url('/post/' . $late->id) }}">{{ Str::limit($late->title, 40) }}</a>
                                            <p class="m-0 text-muted" style="font-size: 14px;">{{ Str::limit(strip_tags($late->description), 80) }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                <div class="col-lg-4">
                    @include('partials.sidebar')
                </div>
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