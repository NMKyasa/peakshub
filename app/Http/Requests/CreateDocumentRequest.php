<?php

namespace App\Http\Requests;

use App\Models\Document;
use Illuminate\Foundation\Http\FormRequest;

class CreateDocumentRequest extends FormRequest
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
        return array_merge(
            Document::$rules,
            [
                'file' => [
                    'required',
                    'file',
                    'mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,csv,txt',
                    'max:10240',
                ],
            ]
        );
    }
}
