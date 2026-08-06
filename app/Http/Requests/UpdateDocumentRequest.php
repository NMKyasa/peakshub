<?php

namespace App\Http\Requests;

use App\Models\Document;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDocumentRequest extends FormRequest
{
    /**
     * Determine whether the user is authorized
     * to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply
     * to the request.
     */
    public function rules(): array
    {
        return [
            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'document_number' => [
                'nullable',
                'string',
                'max:100',
                Rule::unique('documents', 'document_number')
                    ->ignore($this->route('document')),
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'file' => [
                'nullable',
                'file',
                'mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,csv,txt',
                'max:10240',
            ],

            'is_active' => [
                'required',
                'boolean',
            ],
        ];
    }
}
