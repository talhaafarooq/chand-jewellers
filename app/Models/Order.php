<?php

namespace App\Models;

use App\Enums\OrderStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = array(
        'fname', 'lname', 'company', 'address1', 'address2', 'city', 'state', 'zipcode','country',
        'email', 'phone1', 'phone2', 'notes', 'user_id', 'status', 'order_no', 'tracking_no', 'tracking_company'
    );

    protected $casts = [
        'fname' => 'string',
        'lname' => 'string',
        'company' => 'string',
        'address1' => 'string',
        'address2' => 'string',
        'city' => 'string',
        'state' => 'string',
        'zipcode' => 'string',
        'country' => 'string',
        'email' => 'string',
        'phone1' => 'string',
        'phone2' => 'string',
        'notes' => 'string',
        'user_id' => 'integer',
        'status' => OrderStatusEnum::class,
        'order_no' => 'integer',
        'tracking_no' => 'string',
        'tracking_company' => 'string'
    ];


    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
