<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NumberList extends Model
{
    use SoftDeletes;

    public $table = 'number_list';    

    protected $dates = ['deleted_at'];

    public $fillable = [
        'number',
        'user_id',
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
        'number' => 'string',
        'status' => 'integer'
    ];
}
