<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * |--------------------------------------------------------------------------
 * | Create Settings Table
 * |--------------------------------------------------------------------------
 * |
 * | Stores configurable application settings using a key-value structure.
 * | This table serves as the Single Source of Truth (SSOT) for all
 * | application configuration that can be managed through the UI.
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
        Schema::create('settings', function (Blueprint $table) {

            $table->id();

            /*
            |--------------------------------------------------------------------------
            | Setting Identification
            |--------------------------------------------------------------------------
            */

            $table->string('group', 100);
            $table->string('key', 100);

            /*
            |--------------------------------------------------------------------------
            | Setting Value
            |--------------------------------------------------------------------------
            */

            $table->longText('value')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Metadata
            |--------------------------------------------------------------------------
            */

            $table->string('type', 50)->default('string');
            $table->text('description')->nullable();

            /**
             * Indicates whether this setting can be safely exposed
             * publicly (e.g. branding assets, company name, theme colors).
             */
            $table->boolean('is_public')->default(false);

            /**
             * Indicates whether this setting should be loaded into
             * the application's settings cache during bootstrap.
             */
            $table->boolean('autoload')->default(true);

            $table->timestamps();

            /*
            |--------------------------------------------------------------------------
            | Indexes
            |--------------------------------------------------------------------------
            */

            $table->unique(['group', 'key']);

            $table->index('group');
            $table->index('key');
            $table->index('is_public');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
