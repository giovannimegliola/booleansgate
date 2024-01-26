<!-- Sidebar  -->
<nav id="sidebar">
    <div class="sidebar-header">
        <img src="{{ asset('/storage/images/Ronaldo da Fiano Romano.gif') }}" alt="logo" id="logo-sidebar">
    </div>

    <ul class="list-unstyled components">
        <li class="d-flex justify-content-center align-items-center border-bottom border-success {{ request()->is('/') ? 'my-active' : '' }}">
            <i class="fa-solid fa-house fs-3 px-2"></i>
            <a class="text-decoration-none text-light my-4" href="{{ url('/') }}">{{ __('Home') }}</a>
        </li>
        <li class="d-flex justify-content-center align-items-center mt-4 {{ request()->is('admin') ? 'my-active' : '' }}">
            <i class="fa-solid fs-4 fa-chart-pie text-danger px-2"></i>
            <a class="d-block text-decoration-none text-light" href="{{ url('/admin/dashboard') }}">{{ __('Dashboard') }}</a>
        </li>
        <li class="d-flex justify-content-center align-items-center {{ request()->is('admin/characters*') ? 'my-active' : '' }}">
            <i class="fa-solid fs-4 fa-chess-knight text-warning px-2"></i>
            <a class="nav-link" href="{{ url('/admin/characters') }}">{{ __('Characters') }}</a>
        </li>
        <li class="d-flex justify-content-center align-items-center {{ request()->is('admin/items*') ? 'my-active' : '' }}">
            <i class="fa-solid fs-4 fa-wand-sparkles text-info px-2"></i>
            <a class="nav-link" href="{{ url('/admin/items') }}">{{ __('Items') }}</a>
        </li>
        <li class="d-flex justify-content-center align-items-center {{ request()->is('admin/types*') ? 'my-active' : '' }}">
            <i class="fa-solid fs-4 fa-hat-wizard text-success px-2"></i>
            <a class="nav-link" href="{{ url('/admin/types') }}">{{ __('Types') }}</a>
        </li>
        <li class="d-flex justify-content-center align-items-center {{ request()->is('admin/arenas*') ? 'my-active' : '' }}">
            <i class="fa-solid fs-4 fa-dungeon text-primary px-2"></i>
            <a class="nav-link" href="{{ url('/admin/arenas') }}">{{ __('Arenas') }}</a>
        </li>
    </ul>
</nav>
