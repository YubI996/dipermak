<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Passport\HasApiTokens;

/**
 * Class user
 * @package App\Models
 * @version November 3, 2020, 2:30 am UTC
 *
 * @property \App\Models\Role $role
 * @property \App\Models\Rt $rt
 * @property string $name
 * @property string $email
 * @property string $email_verified_at
 * @property string $password
 * @property integer $role_id
 * @property integer $rt_id
 * @property string $foto
 * @property string $remember_token
 */
class user extends Model
{
    use HasApiTokens, SoftDeletes;

    public $table = 'users';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'role_id',
        'rt_id',
        'foto',
        'remember_token'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'email_verified_at' => 'date',
        'password' => 'string',
        'role_id' => 'integer',
        'rt_id' => 'integer',
        'foto' => 'string',
        'remember_token' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'email_verified_at' => 'nullable',
        'password' => 'required|string|max:255',
        'role_id' => 'required|integer',
        'rt_id' => 'nullable|integer',
        'foto' => 'nullable|image',
        'remember_token' => 'nullable|string|max:100',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function role()
    {
        return $this->belongsTo(\App\Models\Role::class, 'role_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function rt()
    {
        return $this->belongsTo(\App\Models\Rt::class, 'rt_id');
    }
}
