<?php

namespace App\Http\Requests;

use App\Models\Department;
use Illuminate\Foundation\Http\FormRequest;

/**
 * |--------------------------------------------------------------------------
 * | Create Department Request
 * |--------------------------------------------------------------------------
 * |
 * | Handles validation and authorization when creating a department.
 * |
 * |--------------------------------------------------------------------------
 */
class CreateDepartmentRequest extends FormRequest
{
    /**
     * Determine whether the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return Department::$rules;
    }
}
