@php

    $menus = DB::table('m_menu')
        // ->where('parent_id', 0)
        ->where('status', 1)
        ->where('role', 2)
        ->orderBy('position', 'asc')
        ->orderBy('id', 'asc')
        ->get();

    $submenus = [];
    foreach ($menus as $key=>&$menu) {
        if ($menu->parent_id) {
            if(!isset($submenus[$menu->parent_id])){
            $submenus[$menu->parent_id] = array();
            }
            $submenus[$menu->parent_id][] = $menu;
            unset($menus[$key]);
        }
    }

@endphp
<nav class="app-header navbar navbar-expand-lg bg-body border-bottom shadow-sm">
   <div class="container-fluid">
      <!-- Brand Logo / Name -->
      <a class="navbar-brand fw-bold text-primary" href="#">EXAM PORTAL</a>

      <!-- Toggle button for mobile -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
         <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Navbar Content -->
      <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
         <ul class="navbar-nav mb-2 mb-lg-0 align-items-lg-center">

            @foreach ($menus as $menu)
               @php
                  $hasSub = isset($submenus[$menu->id]) && count($submenus[$menu->id]) > 0;
                  $menuUrl = url($menu->prefix . '/' . $menu->link);
                  $isActiveMenu = Request::is($menu->prefix . '/' . $menu->link . '*');
                  $isActiveSubMenu = false;

                  if ($hasSub) {
                      foreach ($submenus[$menu->id] as $submenu) {
                          if (Request::is($submenu->prefix . '/' . $submenu->link . '*')) {
                              $isActiveSubMenu = true;
                              break;
                          }
                      }
                  }
               @endphp

               @if ($hasSub)
                  <li class="nav-item dropdown {{ $isActiveMenu || $isActiveSubMenu ? 'active' : '' }}">
                     <a class="nav-link dropdown-toggle" href="#" id="menuDropdown{{ $menu->id }}"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ $menu->desc }}
                     </a>
                     <ul class="dropdown-menu" aria-labelledby="menuDropdown{{ $menu->id }}">
                        @foreach ($submenus[$menu->id] as $submenu)
                           @php
                              $subUrl = url($submenu->prefix . '/' . $submenu->link);
                              $isActiveSub = Request::is($submenu->prefix . '/' . $submenu->link . '*');
                           @endphp
                           <li>
                              <a class="dropdown-item {{ $isActiveSub ? 'active' : '' }}" href="{{ $subUrl }}">
                                 {{ $submenu->desc }}
                              </a>
                           </li>
                        @endforeach
                     </ul>
                  </li>
               @else
                  <li class="nav-item {{ $isActiveMenu ? 'active' : '' }}">
                     <a class="nav-link" href="{{ $menuUrl }}">
                        {{ $menu->desc }}
                     </a>
                  </li>
               @endif
            @endforeach

            <!-- Static user dropdown -->
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                  data-bs-toggle="dropdown" aria-expanded="false">
                  {{ Auth::user()->name }}
               </a>
               <ul class="dropdown-menu" aria-labelledby="userDropdown">
                  <li><a class="dropdown-item" href="{{ route('admin.change_password') }}"><i class="bi bi-key"></i> Change Password</a></li>
                  <li><a class="dropdown-item" href="{{ route('logout') }}"><i class="bi bi-box-arrow-left"></i>
                        Logout</a></li>
               </ul>
            </li>
         </ul>

      </div>
   </div>
</nav>
