<?php

namespace App\Repositories;

use App\Models\kegiatan;
use App\Repositories\BaseRepository;

/**
 * Class kegiatanRepository
 * @package App\Repositories
 * @version October 20, 2020, 4:39 am UTC
*/

class kegiatanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_keg',
        'rt_id',
        'tgl_mulai',
        'tgl_selesai',
        'approval',
        'jen_keg',
        'pagu',
        'volume'
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
        return kegiatan::class;
    }
}
