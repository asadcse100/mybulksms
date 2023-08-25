<?php

namespace App\Repositories;

use App\Models\MasterNumber;
use App\Repositories\BaseRepository;

/**
 * Class MasterNumberRepository
 * @package App\Repositories
 * @version February 28, 2020, 8:50 pm UTC
*/

class MasterNumberRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'message_id',
        'country',
        'number',
        'messageLimit',
        'messageRotation'
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
        return MasterNumber::class;
    }
}
