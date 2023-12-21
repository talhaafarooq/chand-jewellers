<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;
    protected $fillable = array(
        'name', 'email', 'phone1', 'phone2', 'address1','address2', 'about_us', 'facebook', 'instagram', 'twitter',
        'whatsapp', 'header_logo', 'footer_logo', 'map','youtube'
    );
}
