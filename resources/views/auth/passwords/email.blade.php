@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center justify-content-center vh-100 bg-light">
    <div class="card shadow-lg rounded-4 border-0" style="width: 420px;">
        {{-- Header --}}
        <div class="card-header text-center bg-primary text-white rounded-top-4">
            <h4 class="mb-0"><i class="fa fa-key me-2"></i> {{ __('Reset Password') }}</h4>
            <p class="mb-0 small text-light">Enter your email to receive a password reset link</p>
        </div>

        {{-- Body --}}
        <div class="card-body p-4">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
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

                {{-- Submit Button --}}
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fa fa-paper-plane me-1"></i> {{ __('Send Password Reset Link') }}
                    </button>

                    <a href="{{ route('login') }}" class="btn btn-link text-decoration-none small text-center">
                        {{ __('Back to Login') }}
                    </a>
                </div>
            </form>
        </div>

        {{-- Footer --}}
        <div class="card-footer text-center bg-light rounded-bottom-4">
            <small>Need help? Contact
                <a href="#" class="text-primary fw-bold text-decoration-none">Support</a>
            </small>
        </div>
    </div>
</div>
@endsection
