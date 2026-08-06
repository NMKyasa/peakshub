<!-- {{ $fieldTitle }} Field -->
<div class="form-group col-sm-6">

    <label for="{{ $fieldName }}">
@if($config->options->localized)
        @@lang('models/{{ $config->modelNames->camelPlural }}.fields.{{ $fieldName }}')
@else
        {{ $fieldTitle }}
@endif
    </label>

    <input
        type="text"
        name="{{ $fieldName }}"
        id="{{ $fieldName }}"
        value="@{{ old('{{ $fieldName }}', ${!! $config->modelNames->camel !!}->{!! $fieldName !!} ?? '') }}"
        class="form-control @@error('{{ $fieldName }}') is-invalid @@enderror"
@php
if (isset($options)) {
    echo ' ' . trim(htmlspecialchars_decode($options), ", ");
}
@endphp
    >

    @@error('{{ $fieldName }}')
        <span class="invalid-feedback" role="alert">
            <strong>@{{ $message }}</strong>
        </span>
    @@enderror

</div>
