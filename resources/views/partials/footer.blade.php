{{--|--------------------------------------------------------------------------
| Application Footer
|--------------------------------------------------------------------------
|
| Displays the footer for all authenticated pages.
|
| Responsibilities:
| - Display copyright information.
| - Display the application version.
| - Display the company name.
|
| Future Enhancements:
| - Dynamic version from configuration.
| - Environment indicator.
| - Build information.
|
|----------------------------------------------------------------------------}}

{{--==============================================================
| View Data
|--------------------------------------------------------------------------
|
| Variables used throughout this view.
|
==============================================================--}}
@php
    $currentYear = now()->year;
    $appName = config('app.name', 'PeaksHub');
    $appVersion = config('app.version', '1.0.0');
@endphp

<footer class="main-footer">

    {{--==========================================================
    | Left Section
    ==========================================================--}}
    <strong>
        &copy; {{ $currentYear }}
        <a href="#">
            {{ config('app.company') }}
        </a>.
    </strong>

    All rights reserved.

    {{--==========================================================
    | Right Section
    ==========================================================--}}
    <div class="float-right d-none d-sm-inline-block">

        <strong>{{ $appName }}</strong>

        <span class="text-muted">
            v{{ config('app.version') }}
        </span>

    </div>

</footer>
