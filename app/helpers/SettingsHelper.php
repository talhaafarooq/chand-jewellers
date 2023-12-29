<?php

namespace App\helpers;

use App\Models\Settings;
use Illuminate\Support\Facades\Storage;

class SettingsHelper
{
    public static function info()
    {
        return Settings::first();
    }
}
