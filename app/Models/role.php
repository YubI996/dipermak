<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class role
 * @package App\Models
 * @version October 20, 2020, 1:55 am UTC
 *
 * @property string $nama_role
 */
class role extends Model
{
    use SoftDeletes;

    public $table = 'roles';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nama_role'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama_role' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama_role' => 'required'
    ];

    
}
