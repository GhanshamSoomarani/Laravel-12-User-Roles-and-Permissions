@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center justify-content-center vh-100 bg-light">
    <div class="card shadow-lg rounded-4 border-0" style="width: 420px;">
        {{-- Header --}}
        <div class="card-header text-center bg-primary text-white rounded-top-4">
            <h4 class="mb-0"><i class="fa fa-user-circle me-2"></i> {{ __('Welcome Back') }}</h4>
            <p class="mb-0 small text-light">Please login to continue</p>
        </div>

        {{-- Body --}}
        <div class="card-body p-4">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- Email --}}
                <div class="mb-3">
                    <label for="email" class="form-label fw-bold">{{ __('Email Address') }}</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                        <input id="email" type="email"
                               class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ old('email') }}"
                               placeholder="Enter your email"
                               required autocomplete="email" autofocus>
                    </div>
                    @error('email')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="mb-3">
                    <label for="password" class="form-label fw-bold">{{ __('Password') }}</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-lock"></i></span>
                        <input id="password" type="password"
                               class="form-control @error('password') is-invalid @enderror"
                               name="password"
                               placeholder="Enter your password"
                               required autocomplete="current-password">
                        <span class="input-group-text bg-white">
                            <i class="fa fa-eye" id="togglePassword" style="cursor: pointer"></i>
                        </span>
                    </div>
                    @error('password')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Remember Me --}}
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                           {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label small" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>

                {{-- Buttons --}}
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fa fa-sign-in-alt"></i> {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                        <a class="btn btn-link text-decoration-none small" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
            </form>
        </div>

        {{-- Footer --}}
        <div class="card-footer text-center bg-light rounded-bottom-4">
            <small>Don’t have an account?
                <a href="{{ route('register') }}" class="text-primary fw-bold text-decoration-none">Sign Up</a>
            </small>
        </div>
    </div>
</div>

{{-- ✅ Script for eye toggle --}}
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const togglePassword = document.getElementById("togglePassword");
        const passwordInput = document.getElementById("password");

        togglePassword.addEventListener("click", function () {
            const type = passwordInput.type === "password" ? "text" : "password";
            passwordInput.type = type;

            this.classList.toggle("fa-eye");
            this.classList.toggle("fa-eye-slash");
        });
    });
</script>
@endsection
