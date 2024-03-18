<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  {{-- Bootstrap 5.3 --}}
  <link rel="stylesheet" href="{{ mix('node_modules/bootstrap/dist/css/bootstrap.min.css') }}">


  {{-- CSS Vanila --}}
  <link rel="stylesheet" href="{{ asset('css/style.min.css') }}">

  <title>PTA | {{ $title }}</title>
</head>
<body>
  @yield('container')

<script src="{{ mix('node_modules/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>