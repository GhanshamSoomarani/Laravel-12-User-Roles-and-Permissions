@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center justify-content-center vh-100 bg-light">
    <div class="card shadow-lg rounded-4 border-0" style="width: 420px;">
        {{-- Header --}}
        <div class="card-header text-center bg-primary text-white rounded-top-4">
            <h4 class="mb-0"><i class="fa fa-user-plus me-2"></i> {{ __('Register') }}</h4>
            <p class="mb-0 small text-light">Create your account to get started</p>
        </div>

        {{-- Body --}}
        <div class="card-body p-4">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                {{-- Name --}}
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">{{ __('Name') }}</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                        <input id="name" type="text"
                               class="form-control @error('name') is-invalid @enderror"
                               name="name" value="{{ old('name') }}"
                               placeholder="Enter your name"
                               required autocomplete="name" autofocus>
                    </div>
                    @error('name')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Email --}}
                <div class="mb-3">
                    <label for="email" class="form-label fw-bold">{{ __('Email Address') }}</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                        <input id="email" type="email"
                               class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ old('email') }}"
                               placeholder="Enter your email"
                               required autocomplete="email">
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
                               required autocomplete="new-password">
                        <span class="input-group-text bg-white">
                            <i class="fa fa-eye" id="togglePassword" style="cursor: pointer"></i>
                        </span>
                    </div>
                    @error('password')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Confirm Password --}}
                <div class="mb-3">
                    <label for="password-confirm" class="form-label fw-bold">{{ __('Confirm Password') }}</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-lock"></i></span>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                               placeholder="Confirm your password" required autocomplete="new-password">
                        <span class="input-group-text bg-white">
                            <i class="fa fa-eye" id="togglePasswordConfirm" style="cursor: pointer"></i>
                        </span>
                    </div>
                </div>

                {{-- Buttons --}}
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fa fa-user-plus me-1"></i> {{ __('Register') }}
                    </button>

                    <a href="{{ route('login') }}" class="btn btn-link text-decoration-none small text-center">
                        {{ __('Already have an account? Login') }}
                    </a>
                </div>
            </form>
        </div>

        {{-- Footer --}}
        <div class="card-footer text-center bg-light rounded-bottom-4">
            <small>By registering, you agree to our
                <a href="#" class="text-primary fw-bold text-decoration-none">Terms & Conditions</a>
            </small>
        </div>
    </div>
</div>

{{-- ✅ Script for eye toggle --}}
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const togglePassword = document.getElementById("togglePassword");
        const passwordInput = document.getElementById("password");

        const togglePasswordConfirm = document.getElementById("togglePasswordConfirm");
        const passwordConfirmInput = document.getElementById("password-confirm");

        togglePassword.addEventListener("click", function () {
            const type = passwordInput.type === "password" ? "text" : "password";
            passwordInput.type = type;
            this.classList.toggle("fa-eye");
            this.classList.toggle("fa-eye-slash");
        });

        togglePasswordConfirm.addEventListener("click", function () {
            const type = passwordConfirmInput.type === "password" ? "text" : "password";
            passwordConfirmInput.type = type;
            this.classList.toggle("fa-eye");
            this.classList.toggle("fa-eye-slash");
        });
    });
</script>
@endsection
