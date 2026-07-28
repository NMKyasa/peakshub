{{--|--------------------------------------------------------------------------
| Application Navbar
|--------------------------------------------------------------------------
|
| Displays the top navigation bar for authenticated users.
|
| Responsibilities:
| - Toggle the sidebar.
| - Display application branding.
| - Display the authenticated user's information.
| - Provide quick access to account actions.
|
| Future Enhancements:
| - Notifications
| - Messages
| - Search
| - Language Switcher{{ $user->name }}

| - Theme Switcher
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
    $user = auth()->user();
@endphp

{{--==============================================================
| Navigation Bar
|--------------------------------------------------------------------------
|
| The main navigation bar for the application.
|
==============================================================--}}

<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    {{--==============================================================
    | Left Navbar Links
    ==============================================================--}}

    <ul class="navbar-nav">

        {{-- Sidebar Toggle --}}
        <li class="nav-item">
            <a class="nav-link"
               data-widget="pushmenu"
               href="#"
               role="button"
               title="Toggle Sidebar">

                <i class="fas fa-bars"></i>

            </a>
        </li>

        {{-- Application Name --}}
        <li class="nav-item d-none d-sm-inline-block">

            <a href="{{ route('dashboard') }}"
               class="nav-link font-weight-bold">

                {{ config('app.name', 'PeaksHub') }}

            </a>

        </li>

    </ul>

    {{--==============================================================
    | Right Navbar Links
    ==============================================================--}}

    <ul class="navbar-nav ml-auto">

        {{------------------------------------------------------------
        | Fullscreen Toggle
        -------------------------------------------------------------}}
        <li class="nav-item">

            <a class="nav-link"
               data-widget="fullscreen"
               href="#"
               role="button"
               title="Fullscreen">

                <i class="fas fa-expand-arrows-alt"></i>

            </a>

        </li>

        {{------------------------------------------------------------
        | User Account Menu
        -------------------------------------------------------------}}
        <li class="nav-item dropdown user-menu">

            <a href="#"
               class="nav-link dropdown-toggle"
               data-toggle="dropdown">

                {{-- User Avatar --}}
                <img
                    src="{{ asset('vendor/adminlte/dist/img/user2-160x160.jpg') }}"
                    class="user-image img-circle elevation-2"
                    alt="User Image">

                {{-- User Name --}}
                <span class="d-none d-md-inline">

                    {{ $user->name }}

                </span>

            </a>

            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                {{--==================================================
                | User Header
                ===================================================--}}
                <div class="dropdown-item text-center bg-primary text-white py-3">

                    <img
                        src="{{ asset('vendor/adminlte/dist/img/user2-160x160.jpg') }}"
                        class="img-circle elevation-2 mb-2"
                        width="70"
                        alt="User Image">

                    <h6 class="mb-0">

                        {{ $user->name }}

                    </h6>

                    <small>

                        {{ $user->email }}

                    </small>

                </div>

                <div class="dropdown-divider"></div>

                {{--==================================================
                | Profile
                ===================================================--}}
                <a href="#"
                   class="dropdown-item">

                    <i class="fas fa-user mr-2"></i>

                    My Profile

                </a>

                {{--==================================================
                | Change Password
                ===================================================--}}
                <a href="#"
                   class="dropdown-item">

                    <i class="fas fa-key mr-2"></i>

                    Change Password

                </a>

                <div class="dropdown-divider"></div>

                {{--==================================================
                | Logout
                ===================================================--}}
                <a href="{{ route('logout') }}"
                   class="dropdown-item text-danger"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

                    <i class="fas fa-sign-out-alt mr-2"></i>

                    Logout

                </a>

                {{-- Hidden Logout Form --}}
                <form id="logout-form"
                      action="{{ route('logout') }}"
                      method="POST"
                      class="d-none">

                    @csrf

                </form>

            </div>

        </li>

    </ul>

</nav>
