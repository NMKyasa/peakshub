<?php

namespace App\Http\Controllers;

use App\DataTables\DocumentDataTable;
use App\Http\Requests\CreateDocumentRequest;
use App\Http\Requests\UpdateDocumentRequest;
use App\Models\Document;
use Illuminate\Support\Facades\Storage;

class DocumentController extends AppBaseController
{
    /**
     * Display a listing of documents.
     */
    public function index(DocumentDataTable $documentDataTable)
    {
        return $documentDataTable->render('documents.index');
    }

    /**
     * Show the form for creating a new document.
     */
    public function create()
    {
        return view('documents.create');
    }

    /**
     * Store a newly created document.
     */
    public function store(CreateDocumentRequest $request)
    {
        $input = $request->validated();

        $file = $request->file('file');

        /*
         * Store the physical file.
         *
         * Example resulting path:
         * documents/abc123xyz.pdf
         */
        $path = $file->store('documents', 'public');

        /*
         * Store file metadata in the database.
         */
        $input['file_path'] = $path;
        $input['original_name'] = $file->getClientOriginalName();
        $input['mime_type'] = $file->getMimeType();
        $input['file_size'] = $file->getSize();

        /*
         * "file" is the uploaded HTTP file and is not
         * an actual column in the documents table.
         */
        unset($input['file']);

        Document::create($input);

        return redirect()
            ->route('documents.index')
            ->with('success', 'Document saved successfully.');
    }

    /**
     * Display the specified document.
     */
    public function show($id)
    {
        $document = Document::find($id);

        if (! $document) {
            return redirect()
                ->route('documents.index')
                ->with('error', 'Document not found.');
        }

        return view('documents.show', compact('document'));
    }

    /**
     * Show the form for editing the specified document.
     */
    public function edit($id)
    {
        $document = Document::find($id);

        if (! $document) {
            return redirect()
                ->route('documents.index')
                ->with('error', 'Document not found.');
        }

        return view('documents.edit', compact('document'));
    }

    /**
     * Update the specified document.
     */
    public function update($id, UpdateDocumentRequest $request)
    {
        $document = Document::find($id);

        if (! $document) {
            return redirect()
                ->route('documents.index')
                ->with('error', 'Document not found.');
        }

        $input = $request->validated();

        /*
         * A new file is optional during an update.
         */
        if ($request->hasFile('file')) {
            $file = $request->file('file');

            /*
             * Store the new file first.
             *
             * We deliberately don't delete the old file until
             * the replacement has successfully been stored.
             */
            $newPath = $file->store('documents', 'public');

            $oldPath = $document->file_path;

            $input['file_path'] = $newPath;
            $input['original_name'] = $file->getClientOriginalName();
            $input['mime_type'] = $file->getMimeType();
            $input['file_size'] = $file->getSize();

            /*
             * Remove the previous physical file after the
             * replacement has been successfully stored.
             */
            if ($oldPath && Storage::disk('public')->exists($oldPath)) {
                Storage::disk('public')->delete($oldPath);
            }
        }

        unset($input['file']);

        $document->fill($input);
        $document->save();

        return redirect()
            ->route('documents.index')
            ->with('success', 'Document updated successfully.');
    }

    /**
     * Download the specified document.
     */
    public function download($id)
    {
        $document = Document::find($id);

        if (! $document) {
            return redirect()
                ->route('documents.index')
                ->with('error', 'Document not found.');
        }

        if (
            ! $document->file_path ||
            ! Storage::disk('local')->exists($document->file_path)
        ) {
            return redirect()
                ->route('documents.index')
                ->with('error', 'Document file not found.');
        }

        $path = storage_path('app/' . $document->file_path);

        return response()->download(
            $path,
            $document->original_name
        );
    }

    /**
     * Soft delete the specified document.
     *
     * The physical file is deliberately retained because
     * the database record can potentially be restored later.
     */
    public function destroy($id)
    {
        $document = Document::find($id);

        if (! $document) {
            return redirect()
                ->route('documents.index')
                ->with('error', 'Document not found.');
        }

        $document->delete();

        return redirect()
            ->route('documents.index')
            ->with('success', 'Document deleted successfully.');
    }
}
