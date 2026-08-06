{{-- ================================================================
| DataTable Styles
================================================================ --}}
@@push('styles')

    @@include('layouts.datatables_css')

@@endpush


{{-- ================================================================
| DataTable
================================================================ --}}
<div class="card-body">

    <div class="table-responsive">

        @{!! $dataTable->table([
            'width' => '100%',
            'class' => 'table table-striped table-hover'
        ]) !!}

    </div>

</div>


{{-- ================================================================
| DataTable Scripts
================================================================ --}}
@@push('scripts')

    @@include('layouts.datatables_js')

    @{!! $dataTable->scripts() !!}

@@endpush
