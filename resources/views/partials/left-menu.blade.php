<div class="d-flex">
    <div class="bg-dark text-white p-3 vh-100" style="width: 240px;">
        
        <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('home') ? 'active fw-bold' : '' }}" href="{{ route('home') }}">
                        <i class="fa fa-home me-1"></i> Home
                    </a>
                </li>
            </ul>
        <ul class="nav flex-column">
            <li class="nav-item mb-2">
                <a href="{{ route('users.index') }}"
                   class="nav-link text-white {{ request()->is('users*') ? 'fw-bold active' : '' }}">
                    <i class="fa fa-users me-2"></i> Manage Users
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('roles.index') }}"
                   class="nav-link text-white {{ request()->is('roles*') ? 'fw-bold active' : '' }}">
                    <i class="fa fa-user-shield me-2"></i> Manage Roles
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('contracts.index') }}"
                   class="nav-link text-white {{ request()->is('products*') ? 'fw-bold active' : '' }}">
                    <i class="fa fa-box me-2"></i> Manage Products
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('contracts.index') }}"
                   class="nav-link text-white {{ request()->is('contracts*') ? 'fw-bold active' : '' }}">
                    <i class="fa fa-file-contract me-2"></i> Manage Contracts
                </a>
            </li>
        </ul>
    </div>

    {{-- Main content wrapper --}}
    <div class="flex-grow-1 p-4">
        @yield('content')
    </div>
</div>
