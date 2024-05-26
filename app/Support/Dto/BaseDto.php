<?php

namespace App\Support\Dto;

use Spatie\LaravelData\Data;

abstract class BaseDto extends Data
{
    /**
     * Get attribute data except null values
     *
     * @return array
     */
    public function allExceptNulls(): array
    {
        return array_filter($this->toArray(), fn ($item) => !is_null($item));
    }
}
