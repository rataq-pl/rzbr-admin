<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public $table = 'blogs';

    public $fillable = [
        'title',
        'url',
        'image',
        'content'
    ];

    protected $casts = [
        'title' => 'string',
        'url' => 'string',
        'image' => 'string',
        'content' => 'string'
    ];

    public static array $rules = [
        'title' => 'required',
        'url' => 'required'
    ];

    
}
