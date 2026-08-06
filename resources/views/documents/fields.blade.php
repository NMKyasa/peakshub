{{-- ================================================================
| Title
================================================================ --}}
<div class="form-group col-md-6">

    <label for="title">
        Title <span class="text-danger">*</span>
    </label>

    <input type="text"
           name="title"
           id="title"
           value="{{ old('title', $document->title ?? '') }}"
           class="form-control @error('title') is-invalid @enderror"
           maxlength="255"
           required>

    @error('title')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

</div>


{{-- ================================================================
| Document Number
================================================================ --}}
<div class="form-group col-md-6">

    <label for="document_number">
        Document Number
    </label>

    <input type="text"
           name="document_number"
           id="document_number"
           value="{{ old('document_number', $document->document_number ?? '') }}"
           class="form-control @error('document_number') is-invalid @enderror"
           maxlength="100">

    @error('document_number')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

</div>


{{-- ================================================================
| Description
================================================================ --}}
<div class="form-group col-12">

    <label for="description">
        Description
    </label>

    <textarea name="description"
              id="description"
              rows="4"
              class="form-control @error('description') is-invalid @enderror">{{ old('description', $document->description ?? '') }}</textarea>

    @error('description')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

</div>


{{-- ================================================================
| Document File
================================================================ --}}
<div class="form-group col-md-6">

    <label for="file">
        Document File
        @if(!isset($document))
            <span class="text-danger">*</span>
        @endif
    </label>

    <div class="custom-file">

        <input type="file"
               name="file"
               id="file"
               class="custom-file-input @error('file') is-invalid @enderror"
               accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.csv,.txt">

        <label class="custom-file-label" for="file">
            Choose file
        </label>

    </div>

    @error('file')
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

    @if(isset($document) && $document->original_name)
        <small class="form-text text-muted">
            Current file: <strong>{{ $document->original_name }}</strong>.
            Leave this field empty to keep the existing file.
        </small>
    @endif

</div>


{{-- ================================================================
| Active Status
================================================================ --}}
<div class="form-group col-md-6">

    <label class="d-block">
        Status
    </label>

    <input type="hidden"
           name="is_active"
           value="0">

    <div class="custom-control custom-switch">

        <input type="checkbox"
               name="is_active"
               id="is_active"
               value="1"
               class="custom-control-input"
               {{ old('is_active', $document->is_active ?? true) ? 'checked' : '' }}>

        <label class="custom-control-label" for="is_active">
            Active
        </label>

    </div>

</div>
