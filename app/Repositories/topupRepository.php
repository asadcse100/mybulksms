<?php

namespace App\Repositories;

use App\Models\Topup;
use App\Repositories\BaseRepository;

/**
 * Class topupRepository
 * @package App\Repositories
 * @version March 23, 2020, 6:17 pm UTC
*/

class topupRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'customer_id',
        'exptime',
        'price',
        'smslimit'
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
        return Topup::class;
    }
}
