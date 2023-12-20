<?php

namespace App\Enums;

enum Status :string {

    case TODO       = 'todo';
    case INPROGRESS = 'inProgress';
    case BLOCKED    = 'blocked';
    case COMPLETED  = 'completed';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
