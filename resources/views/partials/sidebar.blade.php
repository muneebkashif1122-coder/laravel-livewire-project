<div class="pb-3">
    <div class="bg-light py-2 px-4 mb-3">
        <h3 class="m-0">Newsletter</h3>
    </div>
    <div class="bg-light text-center p-4 mb-3">
        <p>Subscribe to our newsletter for the latest news updates.</p>
        <form action="" method="POST">
            <div class="input-group" style="width: 100%;">
                <input type="email" name="sub_email" class="form-control form-control-lg" placeholder="Your Email" required>
                <div class="input-group-append">
                    <button type="submit" name="subscribe_btn" class="btn btn-primary">Sign Up</button>
                </div>
            </div>
        </form>
        <small>We never share your email with third parties.</small>
    </div>
</div>

<div class="mb-3">
    <div class="section-title mb-0">
        <h4 class="m-0 text-uppercase font-weight-bold">Follow Us</h4>
    </div>
    <div class="bg-white border border-top-0 p-3">
        <div class="d-flex mb-3">
            <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none mr-2" style="background: #39569E;"><small class="fab fa-facebook-f mr-2"></small><small>12,345 Fans</small></a>
            <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none ml-2" style="background: #52AAF4;"><small class="fab fa-twitter mr-2"></small><small>12,345 Followers</small></a>
        </div>
        <div class="d-flex mb-3">
            <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none mr-2" style="background: #0185AE;"><small class="fab fa-linkedin-in mr-2"></small><small>12,345 Connects</small></a>
            <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none ml-2" style="background: #C8359D;"><small class="fab fa-instagram mr-2"></small><small>12,345 Followers</small></a>
        </div>
        <div class="d-flex mb-3">
            <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none mr-2" style="background: #DC472E;"><small class="fab fa-youtube mr-2"></small><small>12,345 Subscribers</small></a>
            <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none ml-2" style="background: #1AB7EA;"><small class="fab fa-vimeo-v mr-2"></small><small>12,345 Followers</small></a>
        </div>
    </div>
</div>

<div class="mb-3">
    <div class="section-title mb-0">
        <h4 class="m-0 text-uppercase font-weight-bold">Categories</h4>
    </div>
    <div class="bg-white border border-top-0 p-3">
        <div class="d-flex flex-wrap m-n1">
            @foreach($allCategories as $cat)
                <a href="{{ url('/category/' . $cat->id) }}" class="btn btn-sm btn-outline-secondary m-1">{{ $cat->name }}</a>
            @endforeach
        </div>
    </div>
</div>

<div class="mb-3">
    <div class="section-title mb-0">
        <h4 class="m-0 text-uppercase font-weight-bold">Recent News</h4>
    </div>
    <div class="bg-white border border-top-0 p-3">
        @foreach($recentPosts as $row)
            <div class="d-flex align-items-center bg-white mb-3" style="height: 80px;">
                <img class="img-fluid" src="{{ asset('storage/' . $row->image) }}" style="width: 80px; height: 80px; object-fit: cover;">
                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" style="font-size: 13px;" href="{{ url('/post/' . $row->id) }}">
                        {{ Str::limit($row->title, 35) }}
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>