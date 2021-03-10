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
    
    public static $messages = [
        'keg_id.required' => 'Anda harus memilih kegiatan, jika ',
        'rt_id.required' => 'Anda harus memilih RT',
        'jenis.required' => 'Anda harus memilih jenis partisipasi',
        'deskripsi.required' => 'Anda harus mengisi deskripsi',
        'nominal.required' => 'Anda harus mengisi nominal partisipasi',
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
            $query->where('deskripsi', 'like', $term)
                ->orWhere('jenis', 'like', $term)
                ->orWhere('nominal', 'like', $term)
                ->orWhereHas('rt', function ($query) use ($term) {
                    $query->where('nama_rt', 'like', $term);
                })
                ->orWhereHas('kegiatan', function ($query) use ($term) {
                    $query->where('nama_keg', 'like', $term);
                });
        });
    }
}
