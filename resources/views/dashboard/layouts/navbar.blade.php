<header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow bg-white">
  <a class="navbar-brand d-flex justify-content-center align-items-center col-md-3 col-lg-2 me-0 px-3 fs-6 text-white bg-white" href="#">
    <img src="{{ asset('img/logo.png') }}" alt="" width="70">
  </a>


  <ul class="navbar-nav flex-row d-md-none">
    {{-- <li class="nav-item text-nowrap">
      <button class="nav-link px-3 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSearch" aria-controls="navbarSearch" aria-expanded="false" aria-label="Toggle search">
        <svg class="bi"><use xlink:href="#search"/></svg>
      </button>
    </li> --}}
    <li class="nav-item text-nowrap">
      <button class="nav-link px-3 text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <svg class="bi"><use xlink:href="#list"/></svg>
      </button>
    </li>
  </ul>
</header>