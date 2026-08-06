<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * |--------------------------------------------------------------------------
 * | Department Model
 * |--------------------------------------------------------------------------
 * |
 * | Represents an organizational department within PeaksHub.
 * |
 * | Departments use soft deletes so records are retained for historical
 * | purposes and may be restored when necessary.
 * |
 * |--------------------------------------------------------------------------
 */
class Department extends Model
{
    /*
    |--------------------------------------------------------------------------
    | Traits
    |--------------------------------------------------------------------------
    */

    use SoftDeletes;

    /*
    |--------------------------------------------------------------------------
    | Table
    |--------------------------------------------------------------------------
    */

    /**
     * The database table associated with the model.
     *
     * @var string
     */
    public $table = 'departments';

    /*
    |--------------------------------------------------------------------------
    | Mass Assignable Attributes
    |--------------------------------------------------------------------------
    */

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public $fillable = [
        'name',
        'code',
        'description',
        'is_active',
    ];

    /*
    |--------------------------------------------------------------------------
    | Attribute Casting
    |--------------------------------------------------------------------------
    */

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'name' => 'string',
        'code' => 'string',
        'description' => 'string',
        'is_active' => 'boolean',
    ];

    /*
    |--------------------------------------------------------------------------
    | Validation Rules
    |--------------------------------------------------------------------------
    */

    /**
     * Base validation rules generated for the Department model.
     *
     * Note:
     * Create and update uniqueness requirements will be handled carefully
     * in the corresponding Form Request classes.
     *
     * @var array<string, string>
     */
    public static array $rules = [
        'name' => 'required|string|max:150|unique:departments,name',
        'code' => 'required|string|max:20|unique:departments,code',
        'description' => 'nullable|string',
        'is_active' => 'required|boolean',
    ];
}
