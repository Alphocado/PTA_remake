<?php 
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Request;
?>
@include('dashboard/layouts/header')
<body style="background-color: #FEFBF6">
@include('dashboard/layouts/svg')
@include('dashboard/layouts/navbar')
<div class="container-fluid">
  <div class="row">
    @include('dashboard/layouts/sidebar')
    <main class="container col-md-9 ms-sm-auto col-lg-10 px-md-4 vh-100 p-3">
      @yield('container')
    </main>
  </div>
</div>
@include('dashboard/layouts/footer')
