<?php

namespace App\Repositories;

use App\Models\perMinSend;
use App\Repositories\BaseRepository;

/**
 * Class perMinSendRepository
 * @package App\Repositories
 * @version March 5, 2020, 5:38 pm UTC
*/

class perMinSendRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'perminsend'
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
        return perMinSend::class;
    }
}
