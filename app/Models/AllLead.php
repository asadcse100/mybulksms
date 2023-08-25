<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Country
 * @package App\Models
 * @version February 29, 2020, 10:29 am UTC
 *
 * @property integer name
 * @property integer status
 */
class AllLead extends Model
{
    use SoftDeletes;

    public $table = 'all_leads';

    
}
