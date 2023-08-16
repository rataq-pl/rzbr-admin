<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    public $table = 'testimonials';

    public $fillable = [
        'name',
        'starsCount',
        'realURL',
        'content'
    ];

    protected $casts = [
        'name' => 'string',
        'starsCount' => 'integer',
        'realURL' => 'string',
        'content' => 'string'
    ];

    public static array $rules = [
        'name' => 'required',
        'starsCount' => 'required',
        'realURL' => 'required',
        'content' => 'required'
    ];

    
}
