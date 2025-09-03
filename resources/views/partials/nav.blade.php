<nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm">
    <div class="container-fluid">
        {{-- Brand --}}
       <a class="navbar-brand fw-bold text-white" href="{{ url('/') }}">
    <i class="fa fa-code me-2"></i> {{ config('app.name', 'Laravel') }}
</a>


        {{-- Toggler for mobile --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarContent" aria-controls="navbarContent"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Collapsible content --}}
        <div class="collapse navbar-collapse" id="navbarContent">
            {{-- Centered Menu --}}
            <ul class="navbar-nav mx-auto text-center">
                <li class="nav-item">
                    <a href="{{ route('home') }}"
                       class="nav-link {{ request()->is('home') ? 'active fw-bold' : '' }}">
                        <i class="fa fa-home me-1"></i> Home
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('users.index') }}"
                       class="nav-link {{ request()->is('users*') ? 'active fw-bold' : '' }}">
                        <i class="fa fa-users me-1"></i> Users
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('roles.index') }}"
                       class="nav-link {{ request()->is('roles*') ? 'active fw-bold' : '' }}">
                        <i class="fa fa-user-shield me-1"></i> Roles
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('contracts.index') }}"
                       class="nav-link {{ request()->is('contracts*') ? 'active fw-bold' : '' }}">
                        <i class="fa fa-file-contract me-1"></i> Contracts
                    </a>
                </li>
            </ul>

            {{-- Right Side: User Dropdown --}}
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#"
                       role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="fa fa-user-circle me-1"></i> {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out-alt me-1"></i> {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
