<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $fillable = array('product_id','name', 'email', 'website', 'message', 'rating');
    protected $casts = [
        'product_id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'website' => 'string',
        'message' => 'string',
        'rating' => 'integer'
    ];
}
