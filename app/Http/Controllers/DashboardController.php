<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Document;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Display the application dashboard.
     */
    public function index()
    {
        $statistics = [
            'users' => User::count(),
            'departments' => Department::count(),
            'documents' => Document::count(),
            'reports' => 0,
        ];

        return view('dashboard.index', compact('statistics'));
    }
}
