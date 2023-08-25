<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

/**
 * Class MasterNumber
 * @package App\Models
 * @version February 28, 2020, 8:50 pm UTC
 *
 * @property \App\Models\user user
 * @property \App\Models\message message
 * @property \Illuminate\Database\Eloquent\Collection message1s
 * @property integer user_id
 * @property integer message_id
 * @property integer country
 * @property string number
 * @property integer messageLimit
 * @property integer messageRotation
 */
class MasterNumber extends Model
{
    use SoftDeletes;

    public $table = 'master_numbers';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'message_id',
        'country',
        'number',
        'messageLimit',
        'messageRotation'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'message_id' => 'integer',
        'country' => 'integer',
        'number' => 'string',
        'messageLimit' => 'integer',
        'messageRotation' => 'integer'
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
        return $this->belongsTo(\App\Models\user::class, 'user_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function message()
    {
        return $this->belongsTo(\App\Models\message::class, 'message_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function message1s()
    {
        return $this->hasMany(\App\Models\message::class, 'message_id', 'id');
    }

    protected function getServerNumberRotation(){
        $getServerNumber = MasterNumber::where('user_id', 1)->whereColumn('messageRotation','>','sms_hit')
        ->orderBy('id')->limit(1)->get()->toArray();
        //dd($getServerNumber);
        if(isset($getServerNumber) && !empty($getServerNumber)){
            return $getServerNumber;
        }else{
            echo "No Data Found";
        }  
        
    }

}
