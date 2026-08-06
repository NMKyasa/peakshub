@@extends('layouts.app')

@@section('content')

    {{-- ================================================================
    | Page Header
    ================================================================ --}}
    <section class="content-header">
        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-12">

@if($config->options->localized)
                    <h1>
                        @@lang('crud.create')
                        @@lang('models/{!! $config->modelNames->camelPlural !!}.singular')
                    </h1>
@else
                    <h1>Create {{ $config->modelNames->human }}</h1>
@endif

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
            @@include('partials.alerts')

            {{-- ========================================================
            | Create Form
            ======================================================== --}}
            <div class="card">

                <div class="card-header">

                    <h3 class="card-title">

@if($config->options->localized)
                        @@lang('models/{!! $config->modelNames->camelPlural !!}.singular')
@else
                        {{ $config->modelNames->human }} Information
@endif

                    </h3>

                </div>

                <form action="@{{ route('{!! $config->prefixes->getRoutePrefixWith('.') !!}{!! $config->modelNames->camelPlural !!}.store') }}"
                    method="POST"
                    enctype="multipart/form-data">

                    {{-- CSRF Protection --}}
                    @@csrf

                    <div class="card-body">

                        <div class="row">

                            {{-- Shared Form Fields --}}
                            @@include('{{ $config->prefixes->getViewPrefixForInclude() }}{{ $config->modelNames->snakePlural }}.fields')

                        </div>

                    </div>

                    {{-- =================================================
                    | Form Actions
                    ================================================= --}}
                    <div class="card-footer">

                        <button type="submit"
                                class="btn btn-primary">

                            <i class="fas fa-save mr-1"></i>

@if($config->options->localized)
                            @@lang('crud.save')
@else
                            Save
@endif

                        </button>

                        <a href="@{{ route('{!! $config->prefixes->getRoutePrefixWith('.') !!}{!! $config->modelNames->camelPlural !!}.index') }}"
                           class="btn btn-default">

                            <i class="fas fa-times mr-1"></i>

@if($config->options->localized)
                            @@lang('crud.cancel')
@else
                            Cancel
@endif

                        </a>

                    </div>

                </form>

            </div>

        </div>
    </section>

@@endsection
