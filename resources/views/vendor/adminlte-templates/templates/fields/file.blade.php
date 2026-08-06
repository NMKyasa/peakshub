<!-- {{ $fieldTitle }} Field -->
<div class="form-group col-sm-6">

    <label for="{{ $fieldName }}">
@if($config->options->localized)
        @@lang('models/{{ $config->modelNames->camelPlural }}.fields.{{ $fieldName }}')
@else
        {{ $fieldTitle }}
@endif
    </label>

    <div class="custom-file">

        <input type="file"
               name="{{ $fieldName }}"
               id="{{ $fieldName }}"
               class="custom-file-input @@error('{{ $fieldName }}') is-invalid @@enderror">

        <label class="custom-file-label"
               for="{{ $fieldName }}">
            Choose file
        </label>

    </div>

    @@error('{{ $fieldName }}')
        <span class="invalid-feedback d-block" role="alert">
            <strong>@{{ $message }}</strong>
        </span>
    @@enderror

</div>
