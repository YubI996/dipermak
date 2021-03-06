<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class dokumentasi
 * @package App\Models
 * @version October 29, 2020, 1:45 am UTC
 *
 * @property \App\Models\Kegiatan $keg
 * @property \App\Models\Rt $rt
 * @property integer $keg_id
 * @property integer $rt_id
 * @property string $foto
 * @property string $keterangan
 */
class dokumentasi extends Model
{
    use SoftDeletes;

    public $table = 'dokumentasis';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'keg_id',
        'rt_id',
        'progres',
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
        'progres' => 'integer',
        'rt_id' => 'integer',
        'foto' => 'string',
        'keterangan' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'keg_id' => 'required|integer',
        'rt_id' => 'required|integer',
        'keterangan' => 'required|string',
        'progres' => 'nullable|integer',
        'foto' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];
    public static $messages = [
        'keg_id.required' => 'Anda harus memilih kegiatan',
        'rt_id.required' => 'Anda harus memilih RT',
        'keterangan.integer' => 'Anda harus mengisi keterangan',
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
    public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        $query->where(function ($query) use ($term) {
            $query->where('keterangan', 'like', $term)
                ->orWhere('progres', 'like', $term)
                ->orWhereHas('rt', function ($query) use ($term) {
                    $query->where('nama_rt', 'like', $term);
                })
                ->orWhereHas('kegiatan', function ($query) use ($term) {
                    $query->where('nama_keg', 'like', $term);
                });
        });
    }
}
