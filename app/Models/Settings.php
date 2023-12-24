<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;
    protected $fillable = array(
        'name', 'email', 'phone1', 'phone2', 'address1','address2', 'about_us', 'facebook', 'instagram', 'twitter','youtube',
        'whatsapp', 'header_logo', 'footer_logo', 'map','currency'
    );

    protected $casts = [
        'name'=>'string',
        'email'=>'string',
        'phone1'=>'string',
        'phone2'=>'string',
        'address1'=>'string',
        'address2'=>'string',
        'about_us'=>'string',
        'facebook'=>'string',
        'instagram'=>'string',
        'twitter'=>'string',
        'youtube'=>'string',
        'whatsapp'=>'string',
        'header_logo'=>'string',
        'footer_logo'=>'string',
        'map'=>'string',
        'currency'=>'string'
    ];
}
