<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;
    protected $fillable = array(
        'name', 'email', 'phone1', 'phone2', 'city', 'state', 'zipcode', 'address1', 'address2', 'about_us', 'facebook', 'instagram1',
        'instagram2', 'youtube', 'whatsapp', 'tiktok1', 'tiktok2', 'snack1', 'snack2', 'header_logo', 'footer_logo', 'map', 'currency', 'shipping','advance_charges', 'website'
    );

    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'phone1' => 'string',
        'phone2' => 'string',
        'city' => 'string',
        'state' => 'string',
        'zipcode' => 'string',
        'address1' => 'string',
        'address2' => 'string',
        'about_us' => 'string',
        'facebook' => 'string',
        'youtube' => 'string',
        'whatsapp' => 'string',
        'instagram1' => 'string',
        'instagram2' => 'string',
        'tiktok1' => 'string',
        'tiktok2' => 'string',
        'snack1' => 'string',
        'snack2' => 'string',
        'header_logo' => 'string',
        'footer_logo' => 'string',
        'map' => 'string',
        'currency' => 'string',
        'shipping' => 'float',
        'advance_charges' => 'float',
        'website' => 'string'
    ];
}
