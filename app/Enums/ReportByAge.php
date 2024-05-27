<?php

namespace App\Enums;

use App\Support\Traits\EnumTrait;

enum ReportByAge: string
{
    use EnumTrait;

    case LESS_15 = 'less_15';
    case BETWEEN_15_18 = 'between_15_18';
    case BETWEEN_19_24 = 'between_19_24';
    case BETWEEN_25_30 = 'between_25_30';
    case OVER_30 = 'over_30';

    /**
     * Get label for option
     *
     * @return string
     */
    public function getLabels(): string
    {
        return match ($this) {
            $this::LESS_15 => 'Less than 15 years old',
            $this::BETWEEN_15_18 => 'Between 15 and 18 years old',
            $this::BETWEEN_19_24 => 'Between 19 and 24 years old',
            $this::BETWEEN_25_30 => 'Between 25 and 30 years old',
            $this::OVER_30 => 'Over 30 years old',
        };
    }
}
