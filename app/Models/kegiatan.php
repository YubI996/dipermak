<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class kegiatan
 * @package App\Models
 * @version October 29, 2020, 1:29 am UTC
 *
 * @property \App\Models\JenKeg $jenKeg
 * @property \App\Models\RT $rt
 * @property \Illuminate\Database\Eloquent\Collection $dokumentasis
 * @property \Illuminate\Database\Eloquent\Collection $partisipasis
 * @property string $nama_keg
 * @property integer $rt_id
 * @property string $tgl_mulai
 * @property string $tgl_selesai
 * @property boolean $approval
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
        'sumber_dana',
        'tgl_mulai',
        'tgl_selesai',
        'approval',
        'jen_keg',
        'pagu',
        'target',
        'volume',
        'satuan'
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
        'approval' => 'boolean',
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
        'approval' => 'nullable',
        'jen_keg' => 'required|integer',
        'pagu' => 'required|integer',
        'target' => 'required|integer',
        'volume' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];
    public static $messages = [
        'nama_keg.required' => 'Nama kegiatan harus diisi',
        'rt_id.required' => 'RT harus diisi',
        'rt_id.integer' => 'RT harus dalam format bilangan bulat',
        'tgl_mulai.required' => 'tanggal Mulai harus diisi',
        'tgl_selesai.required' => 'Tanggal Selesai harus diisi',
        'jen_keg.required' => 'Jenis Kegiatan harus diisi',
        'jen_keg.integer' => 'Jenis Kegiatan harus diisi',
        'pagu.required' => 'Pagu harus diisi',
        'pagu.integer' => 'Pagu harus diisi',
        'target.required' => 'Target harus diisi',
        'target.integer' => 'Target harus diisi',
        'volume.required' => 'Volume harus diisi',
        'volume.integer' => 'Volume harus diisi',
    ];

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        $query->where(function ($query) use ($term) {
            $query->where('nama_keg', 'like', $term)
                ->orWhere('sumber_dana', 'like', $term)
                ->orWhere('volume', 'like', $term)
                ->orWhere('satuan', 'like', $term)
                ->orWhereHas('rt', function ($query) use ($term) {
                    $query->where('nama_rt', 'like', $term);
                })
                ->orWhereHas('jenkeg', function ($query) use ($term) {
                    $query->where('jenis_keg', 'like', $term);
                });
        });
    }
    


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
        return $this->belongsTo(\App\Models\RT::class, 'rt_id');
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
    public function partisipasis()
    {
        return $this->hasMany(\App\Models\Partisipasi::class, 'keg_id');
    }   
}
