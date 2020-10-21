<?php

namespace App\Repositories;

use App\Models\jenKeg;
use App\Repositories\BaseRepository;

/**
 * Class jenKegRepository
 * @package App\Repositories
 * @version October 20, 2020, 2:36 am UTC
*/

class jenKegRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'jenis_keg'
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
        return jenKeg::class;
    }
}
