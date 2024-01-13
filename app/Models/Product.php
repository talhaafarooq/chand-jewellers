<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Conner\Tagging\Taggable;

class Product extends Model
{
    use HasFactory, Taggable;
    protected $fillable = array(
        'code', 'name', 'slug', 'front_img', 'back_img', 'old_price', 'new_price', 'category_id', 'sub_category_id', 'highlights', 'description',
        'polish', 'weight', 'karat', 'qty', 'status', 'sku'
    );

    protected $casts = [
        'code' => 'string',
        'name' => 'string',
        'slug' => 'string',
        'front_img' => 'string',
        'back_img' => 'string',
        'old_price' => 'float',
        'new_price' => 'float',
        'category_id' => 'integer',
        'sub_category_id' => 'integer',
        'highlights' => 'string',
        'description' => 'string',
        'polish' => 'string',
        'weight' => 'string',
        'karat' => 'string',
        'qty' => 'integer',
        'status' => 'boolean',
        'sku' => 'string'
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

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }
}
