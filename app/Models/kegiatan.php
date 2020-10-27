<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class kegiatan
 * @package App\Models
 * @version October 26, 2020, 6:12 am UTC
 *
 * @property \App\Models\JenKeg $jenKeg
 * @property \App\Models\Rt $rt
 * @property \Illuminate\Database\Eloquent\Collection $dokumentasis
 * @property \Illuminate\Database\Eloquent\Collection $partisipasis
 * @property string $nama_keg
 * @property integer $rt_id
 * @property string $tgl_mulai
 * @property string $tgl_selesai
 * @property string $approval
 * @property integer $jen_keg
 * @property string $pagu
 * @property string $target
 * @property string $volume
 */
class kegiatan extends Model
{
    use SoftDeletes;

    public $table = 'kegiatans';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nama_keg',
        'rt_id',
        'tgl_mulai',
        'tgl_selesai',
        'approval',
        'jen_keg',
        'pagu',
        'target',
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
        'tgl_mulai' => 'date',
        'tgl_selesai' => 'date',
        'approval' => 'string',
        'jen_keg' => 'integer',
        'pagu' => 'string',
        'target' => 'string',
        'volume' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama_keg' => 'required|string',
        'rt_id' => 'required|integer',
        'tgl_mulai' => 'required',
        'tgl_selesai' => 'required',
        'approval' => 'required|string',
        'jen_keg' => 'required|integer',
        'pagu' => 'required|string|max:255',
        'target' => 'required|string|max:255',
        'volume' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function jenKeg()
    {
        return $this->belongsTo(\App\Models\JenKeg::class, 'jen_keg');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function rt()
    {
        return $this->belongsTo(\App\Models\Rt::class, 'rt_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function dokumentasis()
    {
        return $this->hasMany(\App\Models\Dokumentasi::class, 'keg_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function partisipasi()
    {
        return $this->hasMany(\App\Models\Partisipasi::class, 'keg_id');
    }
}
