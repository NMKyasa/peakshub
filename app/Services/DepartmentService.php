<?php

namespace App\Services;

use App\Models\Department;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * |--------------------------------------------------------------------------
 * | Department Service
 * |--------------------------------------------------------------------------
 * |
 * | Provides the business operations required for managing departments.
 * |
 * | Controllers should communicate with departments through this service
 * | rather than containing persistence logic themselves.
 * |
 * |--------------------------------------------------------------------------
 */
class DepartmentService
{
    /*
    |--------------------------------------------------------------------------
    | Read Operations
    |--------------------------------------------------------------------------
    */

    /**
     * Retrieve a paginated list of departments.
     */
    public function paginate(int $perPage = 10): LengthAwarePaginator
    {
        return Department::query()
            ->orderBy('name')
            ->paginate($perPage);
    }

    /**
     * Find a department by its primary key.
     */
    public function find(int $id): ?Department
    {
        return Department::find($id);
    }

    /*
    |--------------------------------------------------------------------------
    | Write Operations
    |--------------------------------------------------------------------------
    */

    /**
     * Create a new department.
     *
     * @param array<string, mixed> $data
     */
    public function create(array $data): Department
    {
        return Department::create($data);
    }

    /**
     * Update an existing department.
     *
     * @param array<string, mixed> $data
     */
    public function update(Department $department, array $data): Department
    {
        $department->update($data);

        return $department->refresh();
    }

    /**
     * Soft delete a department.
     */
    public function delete(Department $department): bool
    {
        return (bool) $department->delete();
    }
}
