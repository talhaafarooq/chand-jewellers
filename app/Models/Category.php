<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = array('name','slug', 'image');
    protected $timesptams = false;
    protected $casts = [
        'name' => 'string',
        'slug' => 'string',
        'image' => 'string'
    ];

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class,'category_id');
    }
}
