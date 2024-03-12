<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  {{-- Bootstrap 5.3 --}}
  <link rel="stylesheet" href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}">

  {{-- CSS Vanila --}}

  <title>PTA | {{ $title }}</title>
</head>
<body>
  <div class="container">
    @yield('container')
  </div>

<script src="{{ asset('bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>