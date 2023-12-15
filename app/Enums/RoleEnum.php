<?php

namespace App\Enums;

enum RoleEnum: string
{
    case Admin = 'admin';
    case Customer = 'customer';

    public static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }
}
