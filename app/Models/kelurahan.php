<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class kelurahan
 * @package App\Models
 * @version October 20, 2020, 2:28 am UTC
 *
 * @property \App\Models\kecamatan $kec
 * @property string $nama_kel
 * @property integer $kec_id
 */
class kelurahan extends Model
{
    use SoftDeletes;

    public $table = 'kelurahans';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nama_kel',
        'kec_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama_kel' => 'string',
        'kec_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama_kel' => 'required',
        'kec_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function kec()
    {
        return $this->belongsTo(\App\Models\kecamatan::class, 'kec_id');
    }
}
