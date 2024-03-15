@include('dashboard/layouts/header')
<body>
@include('dashboard/layouts/svg')
@include('dashboard/layouts/navbar')
<div class="container-fluid">
  <div class="row">
    @include('dashboard/layouts/sidebar')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      @yield('container')
    </main>
  </div>
</div>
@include('dashboard/layouts/footer')
