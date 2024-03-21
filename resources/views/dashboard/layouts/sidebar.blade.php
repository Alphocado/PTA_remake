<div class="sidebar border border-right col-md-3 col-lg-2 p-0" style="
background-color: #ECB159;">
  <div class="offcanvas-md offcanvas-end" tabindex="-1" id="sidebarMenu" aria-labelledby="sid ebarMenuLabel">
    <div class="offcanvas-header">
      {{-- <h5 class="offcanvas-title" id="sidebarMenuLabel">{{ $title }}</h5> --}}
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
    </div>
    {{-- active class --}}
    <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto" style="
    background-color: #ECB159;">
      <ul class="nav flex-column mb-auto">
        <li class="nav-item">
          <a class="nav-link d-flex align-items-center gap-2" href="/logout">
          </a>
        </li>
      </ul>
      {{-- Sidebar menu items --}}
      @foreach($sub_menus as $sub_menu)
        @if($sub_menu->role != 1 && $sub_menu->role <= auth()->user()->role)
          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase fs-6">
            <span>{{ $sub_menu->name }}</span>
          </h6>
        @endif
        @foreach($menus as $menu)
          @if($menu->role == $sub_menu->role && $sub_menu->role <= auth()->user()->role)
          <?php 
          $newSlug = ($menu->slug == '') ? '/' : $menu->slug;
          ?>
          <ul class="nav flex-column mb-auto">
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 fs-5 {{ Request::url() === url('/') && $menu->slug === '/' ? 'active' : (Str::startsWith(Request::url(), url($newSlug)) ? 'active' : '') }}" href="/{{ $menu->slug }}">
                {{-- <svg class="bi-sidebar"><use xlink:href="#{{ $menu->logo }}"/></svg> --}}
                <i class="{{ $menu->logo }}"></i>
                {{ $menu->name }}
              </a>
            </li>
          </ul>
          @endif
        @endforeach
      @endforeach

      {{-- Logout link --}}
      <hr class="my-3">
      <ul class="nav flex-column mb-auto">
        <li class="nav-item">
          <a class="nav-link d-flex align-items-center gap-2 fs-5" href="/logout">
            <i class="fa-solid fa-right-from-bracket"></i>
            Logout
          </a>
        </li>
      </ul>
    </div>
  </div>
</div>
