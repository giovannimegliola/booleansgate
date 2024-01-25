
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Hi,<br>
                  {{ auth()->user()->name }}
                </h3>
            </div>

            <ul class="list-unstyled components">
                <a class="d-block text-center text-decoration-none text-light my-4" href="{{url('/') }}">{{ __('Home') }}</a>
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
                
            </ul>
        </nav>