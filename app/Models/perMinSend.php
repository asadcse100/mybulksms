<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class perMinSend
 * @package App\Models
 * @version March 5, 2020, 5:38 pm UTC
 *
 * @property \App\Models\user user
 * @property integer user_id
 * @property integer perminsend
 */
class perMinSend extends Model
{
    use SoftDeletes;

    public $table = 'per_min_sends';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'perminsend'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'perminsend' => 'integer'
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

}
