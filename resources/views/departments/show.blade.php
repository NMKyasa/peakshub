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
                    <h1>Department Details</h1>
                </div>

                {{-- Page Actions --}}
                <div class="col-sm-6 text-right">

                    <a href="{{ route('departments.edit', $department->id) }}"
                       class="btn btn-primary">

                        <i class="far fa-edit mr-1"></i>
                        Edit

                    </a>

                    <a href="{{ route('departments.index') }}"
                       class="btn btn-default">

                        <i class="fas fa-arrow-left mr-1"></i>
                        Back

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

            {{-- ========================================================
            | Department Details
            ======================================================== --}}
            <div class="card">

                <div class="card-header">

                    <h3 class="card-title">
                        Department Information
                    </h3>

                </div>

                <div class="card-body">

                    <div class="row">

                        {{-- Department Detail Fields --}}
                        @include('departments.show_fields')

                    </div>

                </div>

            </div>

        </div>
    </section>

@endsection
