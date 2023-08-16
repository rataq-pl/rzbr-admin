<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    public $table = 'f_a_q_s';

    public $fillable = [
        'question',
        'answer'
    ];

    protected $casts = [
        'question' => 'string',
        'answer' => 'string'
    ];

    public static array $rules = [
        'question' => 'required',
        'answer' => 'required'
    ];

    
}
