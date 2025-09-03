<div class="d-flex">
    {{-- Sidebar --}}
    <div class="bg-dark text-white p-3 vh-100" style="width: 240px;">
       
        <ul class="nav flex-column">
            <li class="nav-item mb-2">
                <a href="{{ route('home') }}"
                   class="nav-link text-white {{ request()->is('home') ? 'fw-bold active' : '' }}">
                    <i class="fa fa-home me-2"></i> Home
                </a>
            </li>

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
                   class="nav-link text-white {{ request()->is('contracts*') ? 'fw-bold active' : '' }}">
                    <i class="fa fa-file-contract me-2"></i> Manage Contracts
                </a>
            </li>
        </ul>
    </div>

    {{-- Main Content --}}
    <div class="flex-grow-1 p-4" style="background-color: #f8f9fa;">
        @yield('content')
    </div>
</div>
