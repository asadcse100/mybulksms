<?php

namespace App\Repositories;

use App\Models\SMTP;
use App\Repositories\BaseRepository;

/**
 * Class SMTPRepository
 * @package App\Repositories
 * @version March 27, 2020, 12:53 pm UTC
*/

class SMTPRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'host_name',
        'smtp_username',
        'smtp_password',
        'smtp_port',
        'encryption_method',
        'defaut_from_email',
        'model_name',
        'message_limit',
        'smtprotation',
        'sms_hit'
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
        return SMTP::class;
    }
}
