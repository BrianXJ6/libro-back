<?php

namespace App\Support\Dto;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
#[MapInputName(SnakeCaseMapper::class)]
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
