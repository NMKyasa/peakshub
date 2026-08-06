<?php

namespace App\DataTables;

use App\Models\Document;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;

class DocumentDataTable extends DataTable
{
    /**
     * Build the DataTable.
     *
     * @param mixed $query
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable
            ->editColumn('description', function (Document $document) {
                return $document->description
                    ? \Illuminate\Support\Str::limit($document->description, 60)
                    : '—';
            })
            ->editColumn('document_number', function (Document $document) {
                return $document->document_number ?: '—';
            })
            ->editColumn('original_name', function (Document $document) {
                return $document->original_name ?: '—';
            })
            ->editColumn('file_size', function (Document $document) {
                if (! $document->file_size) {
                    return '—';
                }

                $bytes = $document->file_size;

                if ($bytes >= 1048576) {
                    return number_format($bytes / 1048576, 2).' MB';
                }

                if ($bytes >= 1024) {
                    return number_format($bytes / 1024, 2).' KB';
                }

                return $bytes.' B';
            })
            ->editColumn('is_active', function (Document $document) {
                return $document->is_active
                    ? '<span class="badge badge-success">Active</span>'
                    : '<span class="badge badge-secondary">Inactive</span>';
            })
            ->addColumn('action', 'documents.datatables_actions')
            ->rawColumns(['is_active', 'action']);
    }

    /**
     * Get the query source.
     *
     * Soft-deleted documents are automatically excluded
     * because the Document model uses SoftDeletes.
     */
    public function query(Document $model)
    {
        return $model->newQuery()
            ->select([
                'id',
                'title',
                'document_number',
                'description',
                'original_name',
                'file_size',
                'is_active',
                'created_at',
            ]);
    }

    /**
     * Configure the DataTable HTML.
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction([
                'width' => '170px',
                'printable' => false,
                'exportable' => false,
            ])
            ->parameters([
                'dom' => 'Bfrtip',
                'stateSave' => true,
                'order' => [[0, 'desc']],
                'responsive' => true,
                'autoWidth' => false,
                'buttons' => [
                    // We can enable export/print buttons later if required.
                ],
            ]);
    }

    /**
     * Define visible columns.
     */
    protected function getColumns()
    {
        return [
            [
                'data' => 'title',
                'name' => 'title',
                'title' => 'Title',
            ],
            [
                'data' => 'document_number',
                'name' => 'document_number',
                'title' => 'Document Number',
            ],
            [
                'data' => 'description',
                'name' => 'description',
                'title' => 'Description',
                'orderable' => false,
            ],
            [
                'data' => 'original_name',
                'name' => 'original_name',
                'title' => 'File',
            ],
            [
                'data' => 'file_size',
                'name' => 'file_size',
                'title' => 'Size',
            ],
            [
                'data' => 'is_active',
                'name' => 'is_active',
                'title' => 'Status',
            ],
        ];
    }

    /**
     * Get export filename.
     */
    protected function filename(): string
    {
        return 'documents_datatable_' . time();
    }
}
