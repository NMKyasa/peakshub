<div class="btn-group"
     role="group"
     aria-label="Document actions">

    {{-- View --}}
    <a href="{{ route('documents.show', $id) }}"
       class="btn btn-default btn-sm"
       title="View">
        <i class="far fa-eye"></i>
    </a>

    {{-- Download --}}
    <a href="{{ route('documents.download', $id) }}"
       class="btn btn-default btn-sm"
       title="Download">
        <i class="fas fa-download"></i>
    </a>

    {{-- Edit --}}
    <a href="{{ route('documents.edit', $id) }}"
       class="btn btn-default btn-sm"
       title="Edit">
        <i class="far fa-edit"></i>
    </a>

    {{-- Soft Delete --}}
    <form action="{{ route('documents.destroy', $id) }}"
          method="POST"
          class="d-inline">

        @csrf
        @method('DELETE')

        <button type="submit"
                class="btn btn-danger btn-sm"
                title="Delete"
                onclick="return confirm('Are you sure you want to delete this document?')">

            <i class="far fa-trash-alt"></i>
        </button>

    </form>

</div>
