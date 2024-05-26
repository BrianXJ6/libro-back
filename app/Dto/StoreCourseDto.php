<?php

namespace App\Dto;

use App\Support\Dto\BaseDto;

class StoreCourseDto extends BaseDto
{
    /**
     * Create a new StoreCourseDto instance
     *
     * @param string $title
     * @param string|null $description
     */
    public function __construct(
        public readonly string $title,
        public readonly ?string $description,
    ) {
        // ...
    }
}
