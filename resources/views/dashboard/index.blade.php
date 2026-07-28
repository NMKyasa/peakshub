{{--|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
|
| Displays the application's main dashboard after a successful login.
|
| Responsibilities:
| - Welcome the authenticated user.
| - Display key application statistics.
| - Provide quick access to frequently used modules.
| - Display recent system activity (future enhancement).
|
| Route:
|     /dashboard
|
| Layout:
|     layouts.app
|
|--------------------------------------------------------------------------}}

@extends('layouts.app')

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
| Page Title
==============================================================--}}
@section('title', 'Dashboard')

@section('page_title', 'Dashboard')

{{--==============================================================
| Breadcrumb
==============================================================--}}
@section('breadcrumbs')

<ol class="breadcrumb float-sm-right">

    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Home</a>
    </li>

    <li class="breadcrumb-item active">
        Dashboard
    </li>

</ol>

@endsection

{{--==============================================================
| Page Content
==============================================================--}}
@section('content')

{{--==============================================================
| Welcome Message
==============================================================--}}
<div class="row">

    <div class="col-12">

        <div class="card">

            <div class="card-body">

                <h4 class="mb-2">

                    Welcome back,
                    <strong>{{ $user->name }}</strong>

                </h4>

                <p class="text-muted mb-0">

                    You're successfully signed in to
                    <strong>{{ config('app.name') }}</strong>.

                </p>

            </div>

        </div>

    </div>

</div>

{{--==============================================================
| Statistics Cards
==============================================================--}}
<div class="row">

    <div class="col-lg-3 col-6">

        <div class="small-box bg-info">

            <div class="inner">

                <h3>0</h3>

                <p>Users</p>

            </div>

            <div class="icon">

                <i class="fas fa-users"></i>

            </div>

        </div>

    </div>

    <div class="col-lg-3 col-6">

        <div class="small-box bg-success">

            <div class="inner">

                <h3>0</h3>

                <p>Departments</p>

            </div>

            <div class="icon">

                <i class="fas fa-building"></i>

            </div>

        </div>

    </div>

    <div class="col-lg-3 col-6">

        <div class="small-box bg-warning">

            <div class="inner">

                <h3>0</h3>

                <p>Documents</p>

            </div>

            <div class="icon">

                <i class="fas fa-folder-open"></i>

            </div>

        </div>

    </div>

    <div class="col-lg-3 col-6">

        <div class="small-box bg-danger">

            <div class="inner">

                <h3>0</h3>

                <p>Reports</p>

            </div>

            <div class="icon">

                <i class="fas fa-chart-bar"></i>

            </div>

        </div>

    </div>

</div>

{{--==============================================================
| Dashboard Widgets
==============================================================--}}
<div class="row">

    {{--==========================================================
    | Quick Actions
    ==========================================================--}}
    <div class="col-md-6">

        <div class="card card-primary">

            <div class="card-header">

                <h3 class="card-title">

                    Quick Actions

                </h3>

            </div>

            <div class="card-body">

                <div class="list-group">

                    <a href="#"
                       class="list-group-item list-group-item-action">

                        <i class="fas fa-user-plus mr-2"></i>

                        Create User

                    </a>

                    <a href="#"
                       class="list-group-item list-group-item-action">

                        <i class="fas fa-folder-plus mr-2"></i>

                        Upload Document

                    </a>

                    <a href="#"
                       class="list-group-item list-group-item-action">

                        <i class="fas fa-building mr-2"></i>

                        Add Department

                    </a>

                </div>

            </div>

        </div>

    </div>

    {{--==========================================================
    | Recent Activity
    ==========================================================--}}
    <div class="col-md-6">

        <div class="card">

            <div class="card-header">

                <h3 class="card-title">

                    Recent Activity

                </h3>

            </div>

            <div class="card-body">

                <div class="text-center text-muted py-5">

                    <i class="fas fa-history fa-3x mb-3"></i>

                    <p>

                        Recent activity will appear here.

                    </p>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
