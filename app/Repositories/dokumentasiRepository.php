<?php

namespace App\Repositories;

use App\Models\dokumentasi;
use App\Repositories\BaseRepository;

/**
 * Class dokumentasiRepository
 * @package App\Repositories
 * @version October 21, 2020, 2:06 am UTC
*/

class dokumentasiRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'keg_id',
        'foto',
        'keterangan'
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
        return dokumentasi::class;
    }
}
