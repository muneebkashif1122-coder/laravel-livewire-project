
    <!-- Left Side Bar Navigation Panel (Added wire:persist here) -->
    <div wire:persist="sidebar" class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary shadow" style="width: 280px; height: 100vh; position: sticky; top: 0;">
        <a href="{{ route('dashboard') }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
            <!-- Displays your custom logo instead of text strings -->
            <img src="/project-3/admin/uploads/assets/logo.png" alt="Logo" style="max-width: 100%; max-height: 50px; object-fit: contain;">
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <!-- Navigates back home instantly via Livewire SPA navigation feature -->
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
                    <!-- Fixed a minor double-quote syntax bug on your next line -->
                    <li><a class="dropdown-item" href="{{ route('categories') }}" wire:navigate>List</a></li>
                </ul>
            </li>
        </ul>
    </div>