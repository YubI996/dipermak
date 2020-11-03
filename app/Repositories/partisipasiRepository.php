<?php

namespace App\Repositories;

use App\Models\partisipasi;
use App\Repositories\BaseRepository;

/**
 * Class partisipasiRepository
 * @package App\Repositories
 * @version October 29, 2020, 1:42 am UTC
*/

class partisipasiRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'keg_id',
        'rt_id',
        'deskripsi',
        'jenis',
        'nominal'
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
        return partisipasi::class;
    }
}
