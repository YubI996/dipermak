<?php

namespace App\Repositories;

use App\Models\rt;
use App\Repositories\BaseRepository;

/**
 * Class rtRepository
 * @package App\Repositories
 * @version October 20, 2020, 2:31 am UTC
*/

class rtRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_rt',
        'kel_id'
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
        return rt::class;
    }
}
