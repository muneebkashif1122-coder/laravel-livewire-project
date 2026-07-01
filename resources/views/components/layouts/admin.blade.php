<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin Workspace' }}</title>
    <!-- Bootstrap CSS (Stable 5.3.3) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="d-flex w-100">

        <x-sidebar />
        <!-- Right Side Dynamic Workspace View Window Column -->
        <div class="flex-grow-1 p-5 bg-light min-vh-100">
            <!-- All admin pages (Dashboard, Add Author, List Authors) inject their inner code here -->
            {{ $slot }}
        </div>

    </div>

    <!-- Bootstrap JS Bundle for Dropdown toggles function support -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" data-navigate-once></script>
</body>
</html>
