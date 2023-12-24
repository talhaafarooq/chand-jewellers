<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable = array('name','slug', 'image', 'category_id');
    protected $casts = [
        'name' => 'string',
        'slug' => 'string',
        'image' => 'string',
        'category_id' => 'integer'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
