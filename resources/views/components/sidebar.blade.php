<div wire:persist="sidebar" class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary shadow" style="width: 280px; height: 100vh; position: sticky; top: 0;">
    <a href="{{ route('dashboard') }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <img src="/project-3/admin/uploads/assets/logo.png" alt="Logo" style="max-width: 100%; max-height: 50px; object-fit: contain;">
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" wire:navigate class="nav-link active">Home</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Author</a>
            <ul class="dropdown-menu shadow">
                <li><a class="dropdown-item" href="{{ route('author') }}" wire:navigate>Add</a></li>
                <li><a class="dropdown-item" href="{{ route('authors') }}" wire:navigate>List</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Post</a>
            <ul class="dropdown-menu shadow">
                <li><a class="dropdown-item" href="{{ route('post') }}" wire:navigate>Add post</a></li>
                <li><a class="dropdown-item" href="{{ route('posts') }}" wire:navigate>List</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Category</a>
            <ul class="dropdown-menu shadow">
                <li><a class="dropdown-item" href="{{ route('category') }}" wire:navigate>Add Category</a></li>
                <li><a class="dropdown-item" href="{{ route('categories') }}" wire:navigate>List</a></li>
            </ul>
        </li>
    </ul>

    <form action="{{ route('logout') }}" method="POST" class="mt-auto">
    @csrf
    <button type="submit" class="btn btn-outline-danger d-flex align-items-center gap-2 w-100">
        <svg class="bi" width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
        </svg>
        Logout
    </button>
</form>
</div>