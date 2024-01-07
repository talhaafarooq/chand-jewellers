<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;
    protected $fillable = array('name', 'email', 'subject', 'message','complete');
    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'subject' => 'string',
        'message' => 'string',
        'complete' => 'boolean',
    ];
}
