@@extends('layouts.app')

@@section('content')

    {{-- ================================================================
    | Page Header
    ================================================================ --}}
    <section class="content-header">
        <div class="container-fluid">

            <div class="row mb-2">

                {{-- Page Title --}}
                <div class="col-sm-6">

@if($config->options->localized)
                    <h1>
                        @@lang('models/{{ $config->modelNames->camelPlural }}.plural')
                    </h1>
@else
                    <h1>{{ $config->modelNames->humanPlural }}</h1>
@endif

                </div>

                {{-- Page Actions --}}
                <div class="col-sm-6">

                    <a href="@{{ route('{!! $config->prefixes->getRoutePrefixWith('.') !!}{!! $config->modelNames->camelPlural !!}.create') }}"
                       class="btn btn-primary float-right">

                        <i class="fas fa-plus mr-1"></i>

@if($config->options->localized)
                        @@lang('crud.add_new')
@else
                        Add {{ $config->modelNames->human }}
@endif

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
            @@include('partials.alerts')

            {{-- ========================================================
            | Records
            ======================================================== --}}
            <div class="card">

                <div class="card-header">

                    <h3 class="card-title">

@if($config->options->localized)
                        @@lang('models/{{ $config->modelNames->camelPlural }}.plural')
@else
                        {{ $config->modelNames->human }} List
@endif

                    </h3>

                </div>

                {!! $table !!}

            </div>

        </div>
    </section>

@@endsection
