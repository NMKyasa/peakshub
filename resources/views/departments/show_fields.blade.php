{{-- ================================================================
| Department Details
================================================================
|
| Displays the individual attributes of a Department record.
|
================================================================ --}}

{{-- ================================================================
| Department Name
================================================================ --}}
<div class="col-md-6 mb-3">

    <strong>
        Name
    </strong>

    <p class="text-muted mb-0">
        {{ $department->name }}
    </p>

</div>


{{-- ================================================================
| Department Code
================================================================ --}}
<div class="col-md-6 mb-3">

    <strong>
        Code
    </strong>

    <p class="text-muted mb-0">
        {{ $department->code }}
    </p>

</div>


{{-- ================================================================
| Description
================================================================ --}}
<div class="col-md-12 mb-3">

    <strong>
        Description
    </strong>

    <p class="text-muted mb-0">
        {{ $department->description ?: 'No description provided.' }}
    </p>

</div>


{{-- ================================================================
| Status
================================================================ --}}
<div class="col-md-6 mb-3">

    <strong>
        Status
    </strong>

    <p class="mb-0">

        @if ($department->is_active)

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


{{-- ================================================================
| Created At
================================================================ --}}
<div class="col-md-6 mb-3">

    <strong>
        Created At
    </strong>

    <p class="text-muted mb-0">
        {{ $department->created_at?->format('d M Y, h:i A') }}
    </p>

</div>


{{-- ================================================================
| Updated At
================================================================ --}}
<div class="col-md-6 mb-3">

    <strong>
        Last Updated
    </strong>

    <p class="text-muted mb-0">
        {{ $department->updated_at?->format('d M Y, h:i A') }}
    </p>

</div>
