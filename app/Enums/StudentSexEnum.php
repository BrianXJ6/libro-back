<?php

namespace App\Enums;

use App\Support\Traits\EnumTrait;

enum StudentSexEnum: string
{
    use EnumTrait;

    case M = 'm';
    case F = 'f';

    /**
     * Get label for option
     *
     * @return string
     */
    public function getLabels(): string
    {
        return match ($this) {
            $this::M => 'Masculino',
            $this::F => 'Feminino',
        };
    }
}
