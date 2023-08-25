<?php

namespace App\Models;

use Eloquent as Model;
use App\Models\topup;
/**
 * Class MessageInfo
 * @package App\Models
 * @version February 29, 2020, 9:21 pm UTC
 *
 * @property string to_number
 * @property integer status
 */
class MessageInfo extends Model
{

    public $table = 'message_infos';
    
    public $timestamps = false;


    public $fillable = [
        'user_id',
        'email',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'email' => 'string',
        'status' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
    
    protected function getSmsInfo($customer_id){
        //$getSmsInfo = "SELECT * FROM message_infos WHERE satus='0' ORDER BY id LIMIT 1";
        // $customers = topup::select('customer_id')->where('smslimit','>','0')->get()->toArray();
        // $customer_id = [];
        // foreach ($customers as $key => $id) {
        //     $customer_id[] = $id['customer_id'];

        // }


        $getSmsInfo = MessageInfo::where('user_id', $customer_id)->where('status', 0)->orderBy('id')->get()->toArray();
//dd($getSmsInfo);
        if(!empty($getSmsInfo)){
            return $getSmsInfo;
        }else{
            return 'No Email Leads Found!!';
        }
    }
    
}
