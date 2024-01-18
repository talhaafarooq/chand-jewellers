<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $fillable = array('order_id', 'product_id', 'qty', 'price', 'total');

    protected $casts = [
        'order_id' => 'integer',
        'product_id' => 'integer',
        'qty' => 'float',
        'price' => 'float',
        'total' => 'float'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
