<?php

namespace App\Enums;

use App\Support\Traits\EnumTrait;

enum StudentSexEnum: string
{
    use EnumTrait;

    case M = 'm';
    case F = 'f';
}
