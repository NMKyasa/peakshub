@extends('layouts.app')

@section('content')


    <section class="content-header">
        <div class="container-fluid">

            <div class="row mb-2">


                <div class="col-sm-6">

                    <h1>Document Details</h1>

                </div>


                <div class="col-sm-6 text-right">

                                        <a href="{{ route('documents.download', $document->id) }}"
                    class="btn btn-success">

                        <i class="fas fa-download mr-1"></i>

                        Download

                    </a>

                    <a href="{{ route('documents.edit', $document->id) }}"
                       class="btn btn-primary">

                        <i class="far fa-edit mr-1"></i>

                        Edit

                    </a>


                    <a href="{{ route('documents.index') }}"
                       class="btn btn-default">

                        <i class="fas fa-arrow-left mr-1"></i>

                        Back

                    </a>

                </div>

            </div>

        </div>
    </section>



    <section class="content">
        <div class="container-fluid">


            @include('partials.alerts')

            <div class="card">

                <div class="card-header">

                    <h3 class="card-title">

                        Document Information

                    </h3>

                </div>

                <div class="card-body">

                    <div class="row">


                        @include('documents.show_fields')

                    </div>

                </div>

            </div>

        </div>
    </section>

@endsection
