<?php

namespace App\Enums;

enum PriorityEnum: int 
{
    case LOW = 1;
    case MEDIUM = 2;
    case HIGH = 3;

    public static function getRandom()
    {
        return rand(1, 3);
    }

    public static function getLabel(int $priority): string
    {
        return match ($priority) {
            self::LOW->value => 'Low',
            self::MEDIUM->value => 'Medium',
            self::HIGH->value => 'High',
        };
    }
}
