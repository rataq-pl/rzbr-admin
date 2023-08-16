<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactForm extends Model
{
    public $table = 'contact_forms';

    public $fillable = [
        'name',
        'email',
        'phone',
        'content'
    ];

    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'content' => 'string'
    ];

    public static array $rules = [
        'name' => 'required',
        'email' => 'required',
        'phone' => 'required',
        'content' => 'required'
    ];

    
}
