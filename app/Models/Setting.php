<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * |--------------------------------------------------------------------------
 * | Setting Model
 * |--------------------------------------------------------------------------
 * |
 * | Represents a configurable application setting.
 * |
 * |--------------------------------------------------------------------------
 */
class Setting extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'group',
        'key',
        'value',
        'type',
        'description',
        'is_public',
        'autoload',
    ];

    /**
     * Attribute type casting.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_public' => 'boolean',
        'autoload' => 'boolean',
    ];
}
