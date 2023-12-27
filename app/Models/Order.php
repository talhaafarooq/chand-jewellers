<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = array(
        'fname', 'lname', 'company', 'address1', 'address2', 'city', 'state', 'zipcode',
        'email', 'phone1', 'phone2', 'notes', 'user_id'
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
        'email' => 'string',
        'phone1' => 'string',
        'phone2' => 'string',
        'notes' => 'string',
        'user_id' => 'integer',
    ];


    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
