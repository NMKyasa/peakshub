<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use App\Services\DepartmentService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * |--------------------------------------------------------------------------
 * | Department Controller
 * |--------------------------------------------------------------------------
 * |
 * | Handles HTTP requests for department management.
 * |
 * | Department business and persistence operations are delegated to the
 * | DepartmentService so that this controller remains focused on handling
 * | requests, responses, redirects, and views.
 * |
 * |--------------------------------------------------------------------------
 */
class DepartmentController extends AppBaseController
{
    /**
     * Department service instance.
     */
    private DepartmentService $departmentService;

    /**
     * Create a new controller instance.
     */
    public function __construct(DepartmentService $departmentService)
    {
        $this->departmentService = $departmentService;
    }

    /*
    |--------------------------------------------------------------------------
    | Department Listing
    |--------------------------------------------------------------------------
    */

    /**
     * Display a listing of departments.
     */
    public function index(Request $request): View
    {
        $departments = $this->departmentService->paginate(10);

        return view('departments.index', compact('departments'));
    }

    /*
    |--------------------------------------------------------------------------
    | Create Department
    |--------------------------------------------------------------------------
    */

    /**
     * Show the form for creating a new department.
     */
    public function create(): View
    {
        return view('departments.create');
    }

    /**
     * Store a newly created department.
     */
    public function store(CreateDepartmentRequest $request): RedirectResponse
    {
        /*
         * Only validated data is passed to the service.
         */
        $this->departmentService->create(
            $request->validated()
        );

    return redirect()
        ->route('departments.index')
        ->with('success', 'Department saved successfully.');
    }

    /*
    |--------------------------------------------------------------------------
    | View Department
    |--------------------------------------------------------------------------
    */

    /**
     * Display the specified department.
     */
    public function show(int $id): View|RedirectResponse
    {
        $department = $this->departmentService->find($id);

        if (! $department) {
            return redirect()->route('departments.index')
                ->with('error', 'Department not found.');
        }

        return view(
            'departments.show',
            compact('department')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Edit Department
    |--------------------------------------------------------------------------
    */

    /**
     * Show the form for editing the specified department.
     */
    public function edit(int $id): View|RedirectResponse
    {
        $department = $this->departmentService->find($id);

        if (! $department) {
            return redirect()->route('departments.index')
                ->with('error', 'Department not found.');
        }

        return view(
            'departments.edit',
            compact('department')
        );
    }

    /**
     * Update the specified department.
     */
    public function update(
        int $id,
        UpdateDepartmentRequest $request
    ): RedirectResponse {

        $department = $this->departmentService->find($id);

        if (! $department) {
            return redirect()->route('departments.index')
                ->with('error', 'Department not found.');
        }

        $this->departmentService->update(
            $department,
            $request->validated()
        );

        return redirect()->route('departments.index')
            ->with('success', 'Department updated successfully.');
    }

    /*
    |--------------------------------------------------------------------------
    | Delete Department
    |--------------------------------------------------------------------------
    */

    /**
     * Soft delete the specified department.
     */
    public function destroy(int $id): RedirectResponse
    {
        $department = $this->departmentService->find($id);

        if (! $department) {
            return redirect()->route('departments.index')
                ->with('error', 'Department not found.');
        }

        $this->departmentService->delete($department);

        return redirect()->route('departments.index')
            ->with('success', 'Department deleted successfully.');
    }
}
