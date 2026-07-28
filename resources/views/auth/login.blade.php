@extends('layouts.auth')

@section('title', 'Login')

@section('page_title')
    Sign In
@endsection

@section('content')

{{-- Login Form --}}
<form action="{{ route('login') }}" method="POST">

    {{-- CSRF Token --}}
    @csrf

    {{-- Email Input --}}
    <div class="input-group mb-3">

        <input
            type="email"
            name="email"
            class="form-control @error('email') is-invalid @enderror"
            placeholder="Email Address"
            value="{{ old('email') }}"
            required
            autofocus
            autocomplete="username">

        <div class="input-group-append">

            <div class="input-group-text">

                <span class="fas fa-envelope"></span>

            </div>

        </div>

    </div>

    {{-- Email Error Message --}}
    @error('email')
        <small class="text-danger d-block mb-3">
            {{ $message }}
        </small>
    @enderror


    {{-- Password Input --}}
    <div class="input-group mb-3">

        <input
            type="password"
            name="password"
            class="form-control @error('password') is-invalid @enderror"
            placeholder="Password"
            required
            autocomplete="current-password">

        <div class="input-group-append">

            <div class="input-group-text">

                <span class="fas fa-lock"></span>

            </div>

        </div>

    </div>

    {{-- Password Error Message --}}
    @error('password')
        <small class="text-danger d-block mb-3">
            {{ $message }}
        </small>
    @enderror


    {{-- Remember Me --}}
    <div class="row">

        <div class="col-6">

            <div class="icheck-primary">

                <input
                    type="checkbox"
                    id="remember"
                    name="remember">

                <label for="remember">

                    Remember Me

                </label>

            </div>

        </div>

        {{-- Sign In Button --}}
        <div class="col-6">

            <button
                type="submit"
                class="btn btn-primary btn-block">

                Sign In

            </button>

        </div>

    </div>

</form>

{{-- Forgot Password Link --}}
@if(Route::has('password.request'))

    <p class="mt-3 mb-1">

        <a href="{{ route('password.request') }}">

            I forgot my password

        </a>

    </p>

@endif

{{-- Register Link --}}
@if(Route::has('register'))

    <p class="mb-0">

        <a href="{{ route('register') }}">

            Register a new account

        </a>

    </p>

@endif

@endsection
