<?php

namespace App\Repositories;

use App\Models\kelurahan;
use App\Repositories\BaseRepository;

/**
 * Class kelurahanRepository
 * @package App\Repositories
 * @version October 20, 2020, 2:28 am UTC
*/

class kelurahanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_kel',
        'kec_id'
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
        return kelurahan::class;
    }
}
