<?php
declare(strict_types=1);

namespace App\Enums\Tasks;

enum Importance: string
{
    case HIGH = "high";
    case MIDDLE = "middle";
    case LOW = "low";
}
