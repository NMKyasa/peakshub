{{-- ================================================================
| Departments Table
================================================================
|
| Displays the paginated list of departments and the available
| CRUD actions for each department.
|
================================================================ --}}

<div class="table-responsive">

    <table class="table table-hover table-striped mb-0"
           id="departments-table">

        {{-- ============================================================
        | Table Header
        ============================================================ --}}
        <thead>
            <tr>
                <th>Name</th>
                <th>Code</th>
                <th>Description</th>
                <th>Status</th>
                <th class="text-center" style="width: 140px;">
                    Actions
                </th>
            </tr>
        </thead>

        {{-- ============================================================
        | Table Body
        ============================================================ --}}
        <tbody>

            @forelse ($departments as $department)

                <tr>

                    {{-- Department Name --}}
                    <td>
                        {{ $department->name }}
                    </td>

                    {{-- Department Code --}}
                    <td>
                        {{ $department->code }}
                    </td>

                    {{-- Description --}}
                    <td>
                        {{ $department->description ?? '—' }}
                    </td>

                    {{-- Department Status --}}
                    <td>
                        @if ($department->is_active)
                            <span class="badge badge-success">
                                Active
                            </span>
                        @else
                            <span class="badge badge-secondary">
                                Inactive
                            </span>
                        @endif
                    </td>

                    {{-- Actions --}}
                    <td class="text-center">

                        <div class="btn-group"
                             role="group"
                             aria-label="Department actions">

                            {{-- View --}}
                            <a href="{{ route('departments.show', $department->id) }}"
                               class="btn btn-default btn-sm"
                               title="View Department">

                                <i class="far fa-eye"></i>

                            </a>

                            {{-- Edit --}}
                            <a href="{{ route('departments.edit', $department->id) }}"
                               class="btn btn-default btn-sm"
                               title="Edit Department">

                                <i class="far fa-edit"></i>

                            </a>

                            {{-- Delete / Soft Delete --}}
                            <form action="{{ route('departments.destroy', $department->id) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        title="Delete Department"
                                        onclick="return confirm('Are you sure you want to delete this department?')">

                                    <i class="far fa-trash-alt"></i>

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

            @empty

                {{-- No Records --}}
                <tr>
                    <td colspan="5"
                        class="text-center text-muted py-4">

                        No departments found.

                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

</div>

{{-- ================================================================
| Pagination
================================================================ --}}
@if ($departments->hasPages())

    <div class="card-footer clearfix">

        <div class="float-right">

            {{ $departments->links() }}

        </div>

    </div>

@endif
