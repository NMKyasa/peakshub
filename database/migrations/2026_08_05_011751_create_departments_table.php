<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * |--------------------------------------------------------------------------
 * | Create Departments Table
 * |--------------------------------------------------------------------------
 * |
 * | Creates the departments table used to manage organizational
 * | departments within PeaksHub.
 * |
 * |--------------------------------------------------------------------------
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('departments', function (Blueprint $table) {

            /*
            |--------------------------------------------------------------------------
            | Primary Key
            |--------------------------------------------------------------------------
            */

            $table->id();

            /*
            |--------------------------------------------------------------------------
            | Department Information
            |--------------------------------------------------------------------------
            */

            // Human-readable department name.
            $table->string('name', 150)->unique();

            // Short unique code used to identify the department.
            $table->string('code', 20)->unique();

            // Optional additional information about the department.
            $table->text('description')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Status
            |--------------------------------------------------------------------------
            */

            // Determines whether the department is currently available for use.
            $table->boolean('is_active')->default(true);

            /*
            |--------------------------------------------------------------------------
            | Timestamps
            |--------------------------------------------------------------------------
            */

            $table->timestamps();

            /*
            |--------------------------------------------------------------------------
            | Soft Deletes
            |--------------------------------------------------------------------------
            |
            | Departments are not permanently deleted. Laravel will populate
            | deleted_at when a department is removed and the record can
            | therefore be restored later.
            |
            */

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
};
