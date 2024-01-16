<?php

namespace App\Enums;

enum UserTypeEnum:string {
    case Admin = 'admin';
    case AdminUser = 'adminuser';
    case Customer = 'customer';

    public static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }
}
