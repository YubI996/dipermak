<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class dokumentasi
 * @package App\Models
 * @version October 21, 2020, 2:06 am UTC
 *
 * @property \App\Models\kegiatan $keg
 * @property integer $keg_id
 * @property string $foto
 * @property string $keterangan
 */
class dokumentasi extends Model
{
    use SoftDeletes;

    public $table = 'dokumentasis';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'keg_id',
        'foto',
        'keterangan'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'keg_id' => 'integer',
        'foto' => 'string',
        'keterangan' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'keg_id' => 'required',
        'foto' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function keg()
    {
        return $this->belongsTo(\App\Models\kegiatan::class, 'keg_id');
    }
}
