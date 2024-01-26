
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <img src="{{asset('/storage/images/Ronaldo da Fiano Romano.gif')}}" alt="logo" id="logo-sidebar">
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a class="d-block text-center text-decoration-none text-light my-4" href="{{url('/') }}">{{ __('Home') }}</a>
                </li>
                <li>
                    <a class="d-block text-decoration-none text-light" href="{{url('/admin/dashboard') }}">{{ __('Dashboard') }}</a>
                </li>
                <li>
                    <a class="nav-link" href="{{url('/admin/characters') }}">{{ __('Characters') }}
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="{{url('/admin/items') }}">{{ __('Items') }}</a>
                </li>
                <li>
                     <a class="nav-link" href="{{url('/admin/types') }}">{{ __('Types') }}</a>
                </li>

                <li>
                    <a class="nav-link" href="{{url('/admin/arenas') }}">{{ __('Arenas') }}</a>
               </li>
                
            </ul>
        </nav>