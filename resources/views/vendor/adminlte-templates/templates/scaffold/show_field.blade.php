{{-- ================================================================
| {{ $fieldTitle }}
================================================================ --}}
<div class="col-md-6 mb-3">

    <strong>

@if($config->options->localized)
        @@lang('models/{{ $config->modelNames->camelPlural }}.fields.{{ $fieldName }}')
@else
        {{ $fieldTitle }}
@endif

    </strong>

    <p class="text-muted mb-0">
        @{{ ${!! $config->modelNames->camel !!}->{!! $fieldName !!} }}
    </p>

</div>
