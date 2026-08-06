<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use SoftDeletes;

    public $table = 'documents';

    public $fillable = [
        'title',
        'document_number',
        'description',
        'file_path',
        'original_name',
        'mime_type',
        'file_size',
        'is_active'
    ];

    protected $casts = [
        'title' => 'string',
        'document_number' => 'string',
        'description' => 'string',
        'file_path' => 'string',
        'original_name' => 'string',
        'mime_type' => 'string',
        'file_size' => 'integer',
        'is_active' => 'boolean'
    ];

    public static array $rules = [
        'title' => 'required|string|max:255',
        'document_number' => 'nullable|string|max:100|unique:documents,document_number',
        'description' => 'nullable|string',
        'is_active' => 'required|boolean',
    ];


}
