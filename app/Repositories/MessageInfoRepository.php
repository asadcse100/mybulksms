<?php

namespace App\Repositories;

use App\Models\MessageInfo;
use App\Repositories\BaseRepository;

/**
 * Class MessageInfoRepository
 * @package App\Repositories
 * @version February 29, 2020, 9:21 pm UTC
*/

class MessageInfoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'to_number',
        'status'
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
        return MessageInfo::class;
    }
}
