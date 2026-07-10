<div class="container-fluid bg-light pt-5 px-sm-3 px-md-5">
    <div class="row">
        <div class="col-lg-4 col-md-6 mb-5 text-left">
            <a href="{{ url('/') }}" class="navbar-brand">
                <h1 class="mb-2 mt-n2 display-5 text-uppercase"><span class="text-primary">News</span>Room</h1>
            </a>
            <p>Stay updated with the latest headlines and in-depth stories. Our newsroom brings you reliable information directly from our authors.</p>
            <div class="d-flex justify-content-start mt-4">
                <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-instagram"></i></a>
                <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-5">
            <h4 class="font-weight-bold mb-4">Categories</h4>
            <div class="d-flex flex-wrap m-n1">
                @foreach($allCategories->take(12) as $fcat)
                    <a href="{{ url('/category/' . $fcat->id) }}" class="btn btn-sm btn-outline-secondary m-1">{{ $fcat->name }}</a>
                @endforeach
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-5 align-items-start">
            <h4 class="font-weight-bold mb-4">Quick Links</h4>
            <div class="d-flex flex-column justify-content-start">
                <a class="text-secondary mb-2" href="{{ url('/categories') }}"><i class="fa fa-angle-right text-dark mr-2"></i>Categories</a>
                <a class="text-secondary" href="{{ url('/contact') }}"><i class="fa fa-angle-right text-dark mr-2"></i>Contact</a>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid py-4 px-sm-3 px-md-5">
    <p class="m-0 text-center">&copy; <a class="font-weight-bold" href="#">NewsRoom</a>.</p>
</div>