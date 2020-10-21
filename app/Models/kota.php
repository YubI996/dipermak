<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class kota
 * @package App\Models
 * @version October 20, 2020, 1:58 am UTC
 *
 * @property string $nama_kota
 */
class kota extends Model
{
    use SoftDeletes;

    public $table = 'kotas';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nama_kota'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama_kota' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama_kota' => 'required'
    ];

    
}
