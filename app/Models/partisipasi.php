<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class partisipasi
 * @package App\Models
 * @version October 21, 2020, 1:13 am UTC
 *
 * @property \App\Models\kegiatan $keg
 * @property integer $keg_id
 * @property string $deskripsi
 * @property string $jenis
 * @property string $nominal
 */
class partisipasi extends Model
{
    use SoftDeletes;

    public $table = 'partisipasis';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'keg_id',
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
        'keg_id' => 'required',
        'deskripsi' => 'required',
        'jenis' => 'required',
        'nominal' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function kegiatan()
    {
        return $this->belongsTo(\App\Models\kegiatan::class, 'keg_id');
    }
}
