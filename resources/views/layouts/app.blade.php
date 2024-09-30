<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  
  @vite('resources/css/nav.css')
  @vite('resources/css/sidebar.css')
  @vite('resources/css/app.css')
</head>
<body>
  <div class="container-fluid">
    @include('layouts.nav')
    <div class="row">
      <div class="col-lg-3 ">
        @include('layouts.sidebar')
      </div>
      <div class="col-lg-9 col-md-12 col-sm-12 main-content">
        @yield('content')
      </div>
    </div>
  </div>
  @include('partials.delete')
  <!-- Bootstrap Bundle with Popper (JavaScript) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
  @vite('resources/js/app.js')
</body>
</html>
