@extends('layouts.app')

@section('content')

    {{-- ================================================================
    | Page Header
    ================================================================ --}}
    <section class="content-header">
        <div class="container-fluid">

            <div class="row mb-2">

                {{-- Page Title --}}
                <div class="col-sm-6">
                    <h1>Departments</h1>
                </div>

                {{-- Page Actions --}}
                <div class="col-sm-6">
                    <a href="{{ route('departments.create') }}"
                       class="btn btn-primary float-right">

                        <i class="fas fa-plus mr-1"></i>
                        Add Department

                    </a>
                </div>

            </div>

        </div>
    </section>

    {{-- ================================================================
    | Main Content
    ================================================================ --}}
    <section class="content">
        <div class="container-fluid">

            {{-- Application Alerts --}}
            @include('partials.alerts')

            {{-- Department List --}}
            <div class="card">

                <div class="card-header">
                    <h3 class="card-title">
                        Department List
                    </h3>
                </div>

                <div class="card-body p-0">

                    @include('departments.table')

                </div>

            </div>

        </div>
    </section>

@endsection
