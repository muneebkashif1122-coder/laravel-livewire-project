<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Login Portal' }}</title>
    <!-- Bootstrap CSS (Stable 5.3.3) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

  </head>
  <body class="bg-light">

    <!-- Simple Top Navigation Navbar Frame -->
    <nav class="navbar bg-body-tertiary shadow-sm mb-4">
      <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">Welcome</span>
      </div>
    </nav>

    <!-- Content Slot wrapper box where your login component template drops in -->
    {{ $slot }}

    <!-- Bootstrap JS Bundle Code -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>

