{{--|--------------------------------------------------------------------------
| Application Layout
|--------------------------------------------------------------------------
|
| Main layout for all authenticated pages within PeaksHub.
|
| Responsibilities:
| - Defines the overall HTML document structure.
| - Loads AdminLTE, Bootstrap, Font Awesome and project assets.
| - Provides the application wrapper.
| - partials the common navigation, sidebar and footer.
| - Defines the content area for child views.
|
| Child Views:
|     @extends('layouts.app')
|
| Example:
|     resources/views/dashboard/index.blade.php
|
|--------------------------------------------------------------------------}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    {{--==============================================================
    | Meta Information
    ==============================================================--}}
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

    {{--==============================================================
    | Stylesheets
    ==============================================================--}}

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">

    {{-- AdminLTE --}}
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">

    {{-- Google Font --}}
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">

    {{-- Project Assets --}}
    @vite([
        'resources/scss/app.scss',
        'resources/js/app.js'
    ])

    {{-- Additional Page Styles --}}
    @stack('styles')

</head>

<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

    {{--==============================================================
    | Top Navigation Bar
    ==============================================================--}}
    @include('partials.navbar')

    {{--==============================================================
    | Left Sidebar
    ==============================================================--}}
    @include('partials.sidebar')

    {{--==============================================================
    | Main Content Wrapper
    ==============================================================--}}
    <div class="content-wrapper">

        {{------------------------------------------------------------
        | Page Header
        -----------------------------------------------------------}}
        <section class="content-header">

            <div class="container-fluid">

                <div class="row mb-2">

                    <div class="col-sm-6">

                        <h1>
                            @yield('page_title', 'Dashboard')
                        </h1>

                    </div>

                    <div class="col-sm-6">

                        @yield('breadcrumbs')

                    </div>

                </div>

            </div>

        </section>

        {{------------------------------------------------------------
        | Main Page Content
        -----------------------------------------------------------}}
        <section class="content">

            <div class="container-fluid">

                {{-- Flash Messages --}}
                @include('partials.alerts')

                {{-- Child View Content --}}
                @yield('content')

            </div>

        </section>

    </div>

    {{--==============================================================
    | Footer
    ==============================================================--}}
    @include('partials.footer')

</div>

{{--==============================================================
| JavaScript
===============================================================--}}

{{-- jQuery --}}
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>

{{-- Bootstrap --}}
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

{{-- AdminLTE --}}
<script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>

{{-- Additional Page Scripts --}}
@stack('scripts')

</body>

</html>
