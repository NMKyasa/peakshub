<div class="btn-group"
     role="group"
     aria-label="Record actions">

    {{-- View Record --}}
    <a href="@{{ route('{!! $config->prefixes->getRoutePrefixWith('.') !!}{!! $config->modelNames->camelPlural !!}.show', ${!! $config->primaryName !!}) }}"
       class="btn btn-default btn-sm"
       title="View">

        <i class="far fa-eye"></i>

    </a>

    {{-- Edit Record --}}
    <a href="@{{ route('{!! $config->prefixes->getRoutePrefixWith('.') !!}{!! $config->modelNames->camelPlural !!}.edit', ${!! $config->primaryName !!}) }}"
       class="btn btn-default btn-sm"
       title="Edit">

        <i class="far fa-edit"></i>

    </a>

    {{-- Delete / Soft Delete Record --}}
    <form action="@{{ route('{!! $config->prefixes->getRoutePrefixWith('.') !!}{!! $config->modelNames->camelPlural !!}.destroy', ${!! $config->primaryName !!}) }}"
          method="POST"
          class="d-inline">

        @@csrf
        @@method('DELETE')

        <button type="submit"
                class="btn btn-danger btn-sm"
                title="Delete"
                onclick="return confirm('Are you sure you want to delete this record?')">

            <i class="far fa-trash-alt"></i>

        </button>

    </form>

</div>
