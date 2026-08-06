<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * |--------------------------------------------------------------------------
 * | Update Department Request
 * |--------------------------------------------------------------------------
 * |
 * | Handles validation and authorization when updating an existing
 * | department.
 * |
 * |--------------------------------------------------------------------------
 */
class UpdateDepartmentRequest extends FormRequest
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
        /*
        |--------------------------------------------------------------------------
        | Current Department
        |--------------------------------------------------------------------------
        |
        | Retrieve the department identifier from the route. This allows
        | Laravel to ignore the current record when checking uniqueness.
        |
        */

        $departmentId = $this->route('department');

        return [
            'name' => [
                'required',
                'string',
                'max:150',
                Rule::unique('departments', 'name')
                    ->ignore($departmentId),
            ],

            'code' => [
                'required',
                'string',
                'max:20',
                Rule::unique('departments', 'code')
                    ->ignore($departmentId),
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'is_active' => [
                'required',
                'boolean',
            ],
        ];
    }
}
