{{--|--------------------------------------------------------------------------
| Application Sidebar
|--------------------------------------------------------------------------
|
| Displays the primary navigation menu for authenticated users.
|
| Responsibilities:
| - Display application branding.
| - Display the authenticated user.
| - Display the application's navigation menu.
| - Highlight the active page.
|
| Future Enhancements:
| - Role-based menu visibility.
| - Dynamic menu generation.
| - Notification badges.
|
|--------------------------------------------------------------------------}}

{{--==============================================================
| View Data
|--------------------------------------------------------------------------
|
| Variables used throughout this view.
|
==============================================================--}}
@php
    $user = auth()->user();
    $currentRoute = Route::currentRouteName();
@endphp

<aside class="main-sidebar sidebar-dark-primary elevation-4">

    {{--==========================================================
    | Brand Logo
    ==========================================================--}}
    <a href="{{ route('dashboard') }}" class="brand-link">

        <img
            src="{{ asset('vendor/adminlte/dist/img/AdminLTELogo.png') }}"
            alt="{{ config('app.name') }}"
            class="brand-image img-circle elevation-3"
            style="opacity: .8">

        <span class="brand-text font-weight-light">

            {{ config('app.name', 'PeaksHub') }}

        </span>

    </a>

    {{--==========================================================
    | Sidebar
    ==========================================================--}}
    <div class="sidebar">

        {{--======================================================
        | Logged-in User
        ======================================================--}}
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            <div class="image">

                <img
                    src="{{ asset('vendor/adminlte/dist/img/user2-160x160.jpg') }}"
                    class="img-circle elevation-2"
                    alt="User">

            </div>

            <div class="info">

                <a href="#" class="d-block">

                    {{ $user->name }}

                </a>

            </div>

        </div>

        {{--======================================================
        | Navigation Menu
        ======================================================--}}
        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column"
                data-widget="treeview"
                role="menu"
                data-accordion="false">

                {{-- Dashboard --}}
                <li class="nav-item">

                    <a href="{{ route('dashboard') }}"
                       class="nav-link {{ $currentRoute == 'dashboard' ? 'active' : '' }}">

                        <i class="nav-icon fas fa-tachometer-alt"></i>

                        <p>Dashboard</p>

                    </a>

                </li>

                {{--==================================================
                | Administration
                ==================================================--}}
                <li class="nav-header">

                    ADMINISTRATION

                </li>

                <li class="nav-item has-treeview">

                    <a href="#" class="nav-link">

                        <i class="nav-icon fas fa-users-cog"></i>

                        <p>

                            Administration

                            <i class="right fas fa-angle-left"></i>

                        </p>

                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item">

                            <a href="#" class="nav-link">

                                <i class="far fa-circle nav-icon"></i>

                                <p>Users</p>

                            </a>

                        </li>

                        <li class="nav-item">

                            <a href="#" class="nav-link">

                                <i class="far fa-circle nav-icon"></i>

                                <p>Roles</p>

                            </a>

                        </li>

                        <li class="nav-item">

                            <a href="#" class="nav-link">

                                <i class="far fa-circle nav-icon"></i>

                                <p>Permissions</p>

                            </a>

                        </li>

                        <li class="nav-item">

                            <a href="{{ route('departments.index') }}" class="nav-link">

                                <i class="far fa-circle nav-icon"></i>

                                <p>Departments</p>

                            </a>

                        </li>

                    </ul>

                </li>

                {{--==================================================
                | Document Management
                ==================================================--}}
                <li class="nav-header">

                    DOCUMENT MANAGEMENT

                </li>

                <li class="nav-item">

                    <a href="{{ route('documents.index') }}" class="nav-link">

                        <i class="nav-icon fas fa-folder-open"></i>

                        <p>Documents</p>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="#" class="nav-link">

                        <i class="nav-icon fas fa-tags"></i>

                        <p>Categories</p>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="#" class="nav-link">

                        <i class="nav-icon fas fa-tag"></i>

                        <p>Tags</p>

                    </a>

                </li>

                {{--==================================================
                | Reports
                ==================================================--}}
                <li class="nav-header">

                    REPORTING

                </li>

                <li class="nav-item">

                    <a href="#" class="nav-link">

                        <i class="nav-icon fas fa-chart-bar"></i>

                        <p>Reports</p>

                    </a>

                </li>

                {{--==================================================
                | Settings
                ==================================================--}}
                <li class="nav-item">

                    <a href="#" class="nav-link">

                        <i class="nav-icon fas fa-cogs"></i>

                        <p>Settings</p>

                    </a>

                </li>

            </ul>

        </nav>

    </div>

</aside>
