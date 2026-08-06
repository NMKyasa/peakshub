{{-- ================================================================
| Department Form Fields
================================================================
|
| Shared form fields used by both the Create Department and
| Edit Department pages.
|
| The $department variable may be null when creating a department.
|
================================================================ --}}

{{-- ================================================================
| Department Name
================================================================ --}}

@php
    /*
    |--------------------------------------------------------------------------
    | Department Form State
    |--------------------------------------------------------------------------
    |
    | The Department variable exists on the edit page but not necessarily
    | on the create page. Normalize it here so the shared fields can safely
    | support both operations.
    |
    */
    $department = $department ?? null;
@endphp

<div class="form-group col-sm-6">

    <label for="name">
        Name <span class="text-danger">*</span>
    </label>

    <input type="text"
           name="name"
           id="name"
           class="form-control @error('name') is-invalid @enderror"
           value="{{ old('name', $department->name ?? '') }}"
           maxlength="150"
           required
           autocomplete="off">

    @error('name')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror

</div>


{{-- ================================================================
| Department Code
================================================================ --}}
<div class="form-group col-sm-6">

    <label for="code">
        Code <span class="text-danger">*</span>
    </label>

    <input type="text"
           name="code"
           id="code"
           class="form-control @error('code') is-invalid @enderror"
           value="{{ old('code', $department->code ?? '') }}"
           maxlength="20"
           required
           autocomplete="off">

    @error('code')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror

</div>


{{-- ================================================================
| Description
================================================================ --}}
<div class="form-group col-sm-12">

    <label for="description">
        Description
    </label>

    <textarea name="description"
              id="description"
              class="form-control @error('description') is-invalid @enderror"
              rows="4">{{ old('description', $department->description ?? '') }}</textarea>

    @error('description')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror

</div>


{{-- ================================================================
| Department Status
================================================================ --}}
<div class="form-group col-sm-12">

    {{--
        The hidden field ensures that a value of 0 is submitted when
        the checkbox is not selected.
    --}}
    <input type="hidden"
           name="is_active"
           value="0">

    <div class="custom-control custom-switch">

        <input type="checkbox"
               name="is_active"
               id="is_active"
               value="1"
               class="custom-control-input @error('is_active') is-invalid @enderror"
               {{ old('is_active', $department->is_active ?? true) ? 'checked' : '' }}>

        <label class="custom-control-label"
               for="is_active">
            Active
        </label>

    </div>

    @error('is_active')
        <div class="text-danger small mt-1">
            {{ $message }}
        </div>
    @enderror

</div>
