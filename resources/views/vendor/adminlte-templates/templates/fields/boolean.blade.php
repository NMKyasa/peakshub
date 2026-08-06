<!-- {{ $fieldTitle }} Field -->
<div class="form-group col-sm-6">

    {{-- Ensure unchecked checkboxes submit 0 --}}
    <input type="hidden"
           name="{{ $fieldName }}"
           value="0">

    <div class="form-check">

        <input type="checkbox"
               name="{{ $fieldName }}"
               id="{{ $fieldName }}"
               value="1"
               class="form-check-input"
               @{{ old('{{ $fieldName }}', isset(${!! $config->modelNames->camel !!}) ? ${!! $config->modelNames->camel !!}->{!! $fieldName !!} : false) ? 'checked' : '' }}>

        <label class="form-check-label"
               for="{{ $fieldName }}">

@if($config->options->localized)
            @@lang('models/{{ $config->modelNames->camelPlural }}.fields.{{ $fieldName }}')
@else
            {{ $fieldTitle }}
@endif

        </label>

    </div>

</div>
