@extends('layouts.app')

@section('content')

    
    <section class="content-header">
        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-12">

                    <h1>Edit Document</h1>

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

                <form action="{{ route('documents.update', $document->id) }}"
                    method="POST"
                    enctype="multipart/form-data">

                    
                    @csrf

                    
                    @method('PATCH')

                    <div class="card-body">

                        <div class="row">

                            
                            @include('documents.fields')

                        </div>

                    </div>

                    
                    <div class="card-footer">

                        <button type="submit"
                                class="btn btn-primary">

                            <i class="fas fa-save mr-1"></i>

                            Save Changes

                        </button>

                        <a href="{{ route('documents.index') }}"
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
