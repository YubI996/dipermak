<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class rt
 * @package App\Models
 * @version October 20, 2020, 2:31 am UTC
 *
 * @property \App\Models\kelurahan $kel
 * @property string $nama_rt
 * @property integer $kel_id
 */
class rt extends Model
{
    use SoftDeletes;

    public $table = 'rts';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nama_rt',
        'kel_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama_rt' => 'string',
        'kel_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama_rt' => 'required|max:20',
        'kel_id' => 'required'
    ];
    // protected $appends = ['kelurahan'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function kelurahan()
    {
        return $this->belongsTo(\App\Models\kelurahan::class, 'kel_id');
    }
    public function kegiatans()
    {
        return $this->hasMany(\App\Models\kegiatan::class, 'rt_id','id');
    }
}
