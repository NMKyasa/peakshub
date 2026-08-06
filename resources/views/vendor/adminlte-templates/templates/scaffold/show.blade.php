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
                        @@lang('models/{!! $config->modelNames->camelPlural !!}.singular')
                        @@lang('crud.detail')
                    </h1>
@else
                    <h1>{{ $config->modelNames->human }} Details</h1>
@endif

                </div>

                {{-- Page Actions --}}
                <div class="col-sm-6 text-right">

                    {{-- Edit --}}
                    <a href="@{{ route('{!! $config->prefixes->getRoutePrefixWith('.') !!}{!! $config->modelNames->camelPlural !!}.edit', ${!! $config->modelNames->camel !!}->{!! $config->primaryName !!}) }}"
                       class="btn btn-primary">

                        <i class="far fa-edit mr-1"></i>

@if($config->options->localized)
                        @@lang('crud.edit')
@else
                        Edit
@endif

                    </a>

                    {{-- Back --}}
                    <a href="@{{ route('{!! $config->prefixes->getRoutePrefixWith('.') !!}{!! $config->modelNames->camelPlural !!}.index') }}"
                       class="btn btn-default">

                        <i class="fas fa-arrow-left mr-1"></i>

@if($config->options->localized)
                        @@lang('crud.back')
@else
                        Back
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

                <div class="card-body">

                    <div class="row">

                        {{-- Record Details --}}
                        @@include('{{ $config->prefixes->getViewPrefixForInclude() }}{{ $config->modelNames->snakePlural }}.show_fields')

                    </div>

                </div>

            </div>

        </div>
    </section>

@@endsection
