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
      
    @if(session()->has('success'))
    <div class="alert alert-success col-lg-8" role="alert">
      {{ session('success') }}
    </div>
    @endif
    @if(session()->has('loginError'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session('loginError') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if(session()->has('warning'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      {{ session('warning') }}
    </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
      @yield('container')
    </main>
  </div>
</div>
@include('dashboard/layouts/footer')
