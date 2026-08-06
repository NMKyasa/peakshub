{{-- Title --}}
<div class="col-md-6 mb-3">
    <strong>Title</strong>

    <p class="text-muted mb-0">
        {{ $document->title }}
    </p>
</div>


{{-- Document Number --}}
<div class="col-md-6 mb-3">
    <strong>Document Number</strong>

    <p class="text-muted mb-0">
        {{ $document->document_number ?: '—' }}
    </p>
</div>


{{-- Description --}}
<div class="col-12 mb-3">
    <strong>Description</strong>

    <p class="text-muted mb-0">
        {{ $document->description ?: '—' }}
    </p>
</div>


{{-- File Name --}}
<div class="col-md-6 mb-3">
    <strong>File Name</strong>

    <p class="text-muted mb-0">
        {{ $document->original_name ?: '—' }}
    </p>
</div>


{{-- File Type --}}
<div class="col-md-6 mb-3">
    <strong>File Type</strong>

    <p class="text-muted mb-0">
        {{ $document->mime_type ?: '—' }}
    </p>
</div>


{{-- File Size --}}
<div class="col-md-6 mb-3">
    <strong>File Size</strong>

    <p class="text-muted mb-0">
        @if($document->file_size)
            @if($document->file_size >= 1048576)
                {{ number_format($document->file_size / 1048576, 2) }} MB
            @elseif($document->file_size >= 1024)
                {{ number_format($document->file_size / 1024, 2) }} KB
            @else
                {{ $document->file_size }} B
            @endif
        @else
            —
        @endif
    </p>
</div>


{{-- Status --}}
<div class="col-md-6 mb-3">
    <strong>Status</strong>

    <p class="mb-0">
        @if($document->is_active)
            <span class="badge badge-success">
                Active
            </span>
        @else
            <span class="badge badge-secondary">
                Inactive
            </span>
        @endif
    </p>
</div>


{{-- Created At --}}
<div class="col-md-6 mb-3">
    <strong>Created At</strong>

    <p class="text-muted mb-0">
        {{ $document->created_at?->format('d M Y, h:i A') ?? '—' }}
    </p>
</div>


{{-- Updated At --}}
<div class="col-md-6 mb-3">
    <strong>Updated At</strong>

    <p class="text-muted mb-0">
        {{ $document->updated_at?->format('d M Y, h:i A') ?? '—' }}
    </p>
</div>


{{-- Download --}}
<div class="col-12 mt-3">

    <hr>

    <a href="{{ route('documents.download', $document->id) }}"
       class="btn btn-success">

        <i class="fas fa-download mr-1"></i>

        Download Document

    </a>

</div>
