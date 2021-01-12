<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class kecamatan
 * @package App\Models
 * @version October 20, 2020, 2:11 am UTC
 *
 * @property \App\Models\kota $kota
 * @property string $nama_kec
 * @property integer $kota_id
 */
class kecamatan extends Model
{
    use SoftDeletes;

    public $table = 'kecamatans';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nama_kec',
        'kota_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama_kec' => 'string',
        'kota_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama_kec' => 'required',
        'kota_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function kota()
    {
        return $this->belongsTo(\App\Models\kota::class, 'kota_id');
    }
    public function kelurahan()
    {
        return $this->hasMany(\App\Models\kelurahan::class,'kec_id');
    }
}
