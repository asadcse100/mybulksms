<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class topup
 * @package App\Models
 * @version March 23, 2020, 6:17 pm UTC
 *
 * @property integer user_id
 * @property string exptime
 * @property number price
 * @property integer smslimit
 */
class Topup extends Model
{
    use SoftDeletes;

    public $table = 'topups';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'customer_id',
        'exptime',
        'price',
        'smslimit',
        'per_day_limit'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'customer_id' => 'integer',
        'exptime' => 'datetime',
        'price' => 'float',
        'smslimit' => 'integer',
        'per_day_limit' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    protected function getCustomerId($user_id)
    {
        $customerData = Topup::where('customer_id', $user_id)->get();
        return $customerData;
    }
    
}
