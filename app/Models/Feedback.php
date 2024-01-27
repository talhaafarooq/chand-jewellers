<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feedback extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = array('product_id', 'name', 'email', 'website', 'message', 'rating');
    protected $casts = [
        'product_id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'website' => 'string',
        'message' => 'string',
        'rating' => 'integer'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
