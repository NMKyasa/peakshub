@extends('layouts.app')

@section('content')

    {{-- ================================================================
    | Page Header
    ================================================================ --}}
    <section class="content-header">
        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-12">
                    <h1>Edit Department</h1>
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
            | Edit Department Form
            ======================================================== --}}
            <div class="card">

                <div class="card-header">

                    <h3 class="card-title">
                        Department Information
                    </h3>

                </div>

                <form action="{{ route('departments.update', $department->id) }}"
                      method="POST">

                    {{-- CSRF Protection --}}
                    @csrf

                    {{--
                        HTML forms only support GET and POST.

                        Laravel uses method spoofing so this request is
                        handled as a PATCH request by the application.
                    --}}
                    @method('PATCH')

                    <div class="card-body">

                        <div class="row">

                            {{-- Shared Department Fields --}}
                            @include('departments.fields')

                        </div>

                    </div>

                    {{-- =================================================
                    | Form Actions
                    ================================================= --}}
                    <div class="card-footer">

                        <button type="submit"
                                class="btn btn-primary">

                            <i class="fas fa-save mr-1"></i>
                            Save Changes

                        </button>

                        <a href="{{ route('departments.index') }}"
                           class="btn btn-default">

                            <i class="fas fa-times mr-1"></i>
                            Cancel

                        </a>

                    </div>

                </form>

            </div>

        </div>
    </section>

@endsection
