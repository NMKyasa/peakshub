<!-- {{ $fieldTitle }} Field -->
<div class="form-group col-sm-12">

    <label for="{{ $fieldName }}">
@if($config->options->localized)
        @@lang('models/{{ $config->modelNames->camelPlural }}.fields.{{ $fieldName }}')
@else
        {{ $fieldTitle }}
@endif
    </label>

    <textarea
        name="{{ $fieldName }}"
        id="{{ $fieldName }}"
        class="form-control @@error('{{ $fieldName }}') is-invalid @@enderror"
        rows="4"
@php
if (isset($options)) {
    echo ' ' . trim(htmlspecialchars_decode($options), ", ");
}
@endphp
    >@{{ old('{{ $fieldName }}', ${!! $config->modelNames->camel !!}->{!! $fieldName !!} ?? '') }}</textarea>

    @@error('{{ $fieldName }}')
        <span class="invalid-feedback" role="alert">
            <strong>@{{ $message }}</strong>
        </span>
    @@enderror

</div>
