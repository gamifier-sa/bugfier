<?php

namespace App\Enums;

enum Status :string {
    
    case ACTIVE   = 'active';
    case PENDING  = 'pending';
    case BLOCK    = 'block';

    /**
     * @return string[]
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
