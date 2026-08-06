@extends('layouts.app')

@section('content')

    
    <section class="content-header">
        <div class="container-fluid">

            <div class="row mb-2">

                
                <div class="col-sm-6">

                    <h1>Documents</h1>

                </div>

                
                <div class="col-sm-6">

                    <a href="{{ route('documents.create') }}"
                       class="btn btn-primary float-right">

                        <i class="fas fa-plus mr-1"></i>

                        Add Document

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

                        Document List

                    </h3>

                </div>

                @include('documents.table')

            </div>

        </div>
    </section>

@endsection
