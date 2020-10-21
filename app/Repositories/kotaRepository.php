<?php

namespace App\Repositories;

use App\Models\kota;
use App\Repositories\BaseRepository;

/**
 * Class kotaRepository
 * @package App\Repositories
 * @version October 20, 2020, 1:58 am UTC
*/

class kotaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_kota'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return kota::class;
    }
}
