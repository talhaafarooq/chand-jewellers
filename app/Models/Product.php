<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = array(
        'name', 'old_price', 'new_price', 'category_id', 'sub_category_id', 'description', 'details',
        'polish', 'weight', 'karat', 'alert_qty', 'status'
    );

    protected $casts = [
        'name' => 'string',
        'old_price' => 'float',
        'new_price' => 'float',
        'category_id' => 'integer',
        'sub_category_id' => 'integer',
        'description' => 'string',
        'details' => 'string',
        'polish' => 'string',
        'weight' => 'string',
        'karat' => 'string',
        'alert_qty' => 'integer',
        'status' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function productImages()
    {
        return $this->hasMany(ProductImage::class);
    }
}
