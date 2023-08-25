<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;
//use App\Models\Message;

/**
 * Class Message
 * @package App\Models
 * @version February 28, 2020, 9:32 pm UTC
 *
 * @property \App\Models\User user
 * @property \App\Models\MasterNumber number
 * @property integer user_id
 * @property integer number_id
 * @property integer messagesequence
 * @property integer messagerotation
 * @property integer messagebody
 */
class Message extends Model
{
    use SoftDeletes;

    public $table = 'messages';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'number_id',
        'messagerotation',
        'messagebody',
        'messageheader',
        'attachment'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'number_id' => 'integer',
        'messagerotation' => 'integer',
        'messagebody' => 'string',
        'messageheader' => 'string',
        'attachment' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function number()
    {
        return $this->belongsTo(\App\Models\MasterNumber::class, 'number_id', 'id');
    }

    public function attachment()
    {
        return $this->hasMany(Attachment::class, 'message_id');
    }

    protected function getMessage($customer_id){

        //$getServerSmsRotation = Message::get()->toArray();
        $getServerSmsRotation = Message::where('user_id', $customer_id)->whereColumn('messagerotation','>','sms_hit')
         ->orderBy('id')->limit(1)->get()->toArray();

         if(isset($getServerSmsRotation) && !empty($getServerSmsRotation)){
            //dd($getServerSmsRotation);
            return $getServerSmsRotation;
         }else{
            Message::where('user_id', $customer_id)->update(['sms_hit' => 0]);
            $getServerSmsRotation = Message::where('user_id', $customer_id)->whereColumn('messagerotation','>','sms_hit')
         ->orderBy('id')->limit(1)->get()->toArray();
            return $getServerSmsRotation;
         }
        
    }
}
