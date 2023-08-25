<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Setting
 * @package App\Models
 * @version March 2, 2020, 9:08 pm UTC
 *
 * @property \App\Models\user user
 * @property integer user_id
 * @property string bwBaseUrl
 * @property string bwUserName
 * @property string bwPassword
 */
class Setting extends Model
{
    use SoftDeletes;

    public $table = 'settings';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'for_user_id',
        'value'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'for_user_id' => 'string',
        'value' => 'string'
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

    protected function getbwData(){
        $getbwData = Setting::get()->toArray();

        if(isset($getbwData) && !empty($getbwData)){
            return $getbwData;
        }else{
            echo "No data found";
        }
        
    }
}
