<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        @hasSection('title')
            @yield('title') |
        @endif
        {{ config('app.name', 'PeaksHub') }}
    </title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">

    {{-- AdminLTE CSS --}}
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">

    {{-- Google Font --}}
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">

    {{-- Project SCSS --}}
    @vite([
        'resources/scss/app.scss',
        'resources/js/app.js'
    ])

    @stack('styles')

</head>

<body class="hold-transition login-page">

<div class="login-box">

    {{-- Branding --}}
    <div class="login-logo">

        <a href="{{ url('/') }}">

            <strong>Peaks</strong>Hub

        </a>

    </div>

    <div class="card shadow">

        <div class="card-body login-card-body">

            @hasSection('page_title')

                <h4 class="text-center mb-4">
                    @yield('page_title')
                </h4>

            @endif

            @if(session('status'))

                <div class="alert alert-success">
                    {{ session('status') }}
                </div>

            @endif

            @if(session('success'))

                <div class="alert alert-success">
                    {{ session('success') }}
                </div>

            @endif

            @if(session('error'))

                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>

            @endif

            @if($errors->any())

                <div class="alert alert-danger">

                    <ul class="mb-0">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif

            @yield('content')

        </div>

    </div>

    <div class="text-center mt-3 text-muted small">

        © {{ date('Y') }}

        MRT IT Peaks Limited

    </div>

</div>

{{-- jQuery --}}
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>

{{-- Bootstrap Bundle --}}
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

{{-- AdminLTE --}}
<script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>

@stack('scripts')

</body>

</html>
