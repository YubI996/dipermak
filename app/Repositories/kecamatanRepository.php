<?php

namespace App\Repositories;

use App\Models\kecamatan;
use App\Repositories\BaseRepository;

/**
 * Class kecamatanRepository
 * @package App\Repositories
 * @version October 20, 2020, 2:11 am UTC
*/

class kecamatanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_kec',
        'kota_id'
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
        return kecamatan::class;
    }
}
