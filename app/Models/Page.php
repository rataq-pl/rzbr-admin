<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public $table = 'pages';

    public $fillable = [
        'title',
        'url',
        'image',
        'content'
    ];

    protected $casts = [
        'title' => 'string',
        'url' => 'string',
        'image' => 'string'
    ];

    public static array $rules = [
        'title' => 'required',
        'url' => 'required'
    ];

    
}
