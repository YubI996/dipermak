<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class jenKeg
 * @package App\Models
 * @version October 20, 2020, 2:36 am UTC
 *
 * @property string $jenis_keg
 */
class jenKeg extends Model
{
    use SoftDeletes;

    public $table = 'jen_kegs';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'jenis_keg'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'jenis_keg' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'jenis_keg' => 'required'
    ];

    public function kegiatan()
    {
        return $this->belongsTo(\App\Models\kegiatan::class, 'keg_id');
    }
}
