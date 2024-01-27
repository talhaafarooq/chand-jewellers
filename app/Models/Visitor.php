<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Visitor extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = array(
        'country', 'country_code', 'region_name', 'city', 'zip', 'lat', 'lon', 'timezone', 'isp', 'ip_address', 'visit'
    );

    protected $casts = [
        'country' => 'string',
        'country_code' => 'string',
        'region_name' => 'string',
        'city' => 'string',
        'zip' => 'string',
        'lat' => 'string',
        'lon' => 'string',
        'timezone' => 'string',
        'isp' => 'string',
        'ip_address' => 'string',
        'visit' => 'integer',
    ];
}
