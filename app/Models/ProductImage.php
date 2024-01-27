<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductImage extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = array('product_id', 'image');

    protected $casts = [
        'product_id' => 'integer',
        'image' => 'string'
    ];
}
