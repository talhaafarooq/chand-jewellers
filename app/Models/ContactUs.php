<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;
    protected $fillable = array('name', 'email', 'subject','cell_no', 'message','complete');
    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'subject' => 'string',
        'cell_no' => 'string',
        'message' => 'string',
        'complete' => 'boolean',
    ];
}
