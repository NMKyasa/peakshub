<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

/**
 * |--------------------------------------------------------------------------
 * | Base Controller
 * |--------------------------------------------------------------------------
 * |
 * | Base controller for all application controllers.
 * |
 * | Responsibilities:
 * | - Provide common helper methods.
 * | - Standardize redirects and flash messages.
 * | - Serve as the foundation for future shared functionality.
 * |
 * | Future Enhancements:
 * | - Authorization helpers.
 * | - Audit logging.
 * | - Breadcrumb generation.
 * | - Activity tracking.
 * | - Standard API responses.
 * |
 * |--------------------------------------------------------------------------
 */
abstract class BaseController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Success Messages
    |--------------------------------------------------------------------------
    */

    /**
     * Redirect back with a standardized success message.
     *
     * @param string $message
     * @return RedirectResponse
     */
    protected function success(string $message): RedirectResponse
    {
        return redirect()->back()->with('success', $message);
    }

    /*
    |--------------------------------------------------------------------------
    | Error Messages
    |--------------------------------------------------------------------------
    */

    /**
     * Redirect back with a standardized error message.
     *
     * @param string $message
     * @return RedirectResponse
     */
    protected function error(string $message): RedirectResponse
    {
        return redirect()->back()->with('error', $message);
    }

    /*
    |--------------------------------------------------------------------------
    | Future Shared Helpers
    |--------------------------------------------------------------------------
    |
    | Add controller helper methods here as the application grows.
    |
    */
}
