<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;
    protected $fillable = array('product_id', 'image');

    protected $casts = [
        'product_id' => 'integer',
        'image' => 'string'
    ];
}
