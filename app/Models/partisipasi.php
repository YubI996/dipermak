<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class partisipasi
 * @package App\Models
 * @version October 29, 2020, 1:42 am UTC
 *
 * @property \App\Models\Kegiatan $keg
 * @property \App\Models\Rt $rt
 * @property integer $keg_id
 * @property integer $rt_id
 * @property string $deskripsi
 * @property string $jenis
 * @property string $nominal
 */
class partisipasi extends Model
{
    use SoftDeletes;

    public $table = 'partisipasis';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'keg_id',
        'rt_id',
        'deskripsi',
        'jenis',
        'nominal'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'keg_id' => 'integer',
        'rt_id' => 'integer',
        'deskripsi' => 'string',
        'jenis' => 'string',
        'nominal' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'keg_id' => 'required|integer',
        'rt_id' => 'required|integer',
        'deskripsi' => 'required|string',
        'jenis' => 'required|string',
        'nominal' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function kegiatan()
    {
        return $this->belongsTo(\App\Models\Kegiatan::class, 'keg_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function rt()
    {
        return $this->belongsTo(\App\Models\Rt::class, 'rt_id');
    }
}
