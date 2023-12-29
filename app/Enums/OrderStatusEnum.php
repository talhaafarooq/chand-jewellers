<?php

namespace App\Enums;

enum OrderStatusEnum: string
{
    case Received = 'received';
    case Dispatched = 'dispatched';
    case Cancelled = 'cancelled';
    case Delivered = 'delivered';

    public static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }
}
