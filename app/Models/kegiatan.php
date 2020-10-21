<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class kegiatan
 * @package App\Models
 * @version October 20, 2020, 4:39 am UTC
 *
 * @property \App\Models\rt $rt
 * @property \App\Models\jenKeg $jenKeg
 * @property string $nama_keg
 * @property integer $rt_id
 * @property string $tgl_mulai
 * @property string $tgl_selesai
 * @property For $approval
 * @property integer $jen_keg
 * @property string $pagu
 * @property string $volume
 */
class kegiatan extends Model
{
    use SoftDeletes;

    public $table = 'kegiatans';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nama_keg',
        'rt_id',
        'tgl_mulai',
        'tgl_selesai',
        'approval',
        'jen_keg',
        'pagu',
        'volume'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama_keg' => 'string',
        'rt_id' => 'integer',
        'tgl_mulai' => 'string',
        'tgl_selesai' => 'string',
        'jen_keg' => 'integer',
        'pagu' => 'string',
        'volume' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama_keg' => 'required|max:100',
        'rt_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function rt()
    {
        return $this->belongsTo(\App\Models\rt::class, 'rt_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function jenKeg()
    {
        return $this->belongsTo(\App\Models\jenKeg::class, 'jen_keg');
    }
}
