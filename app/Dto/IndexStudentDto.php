<?php

namespace App\Dto;

use App\Support\Dto\BaseDto;

class IndexStudentDto extends BaseDto
{
    /**
     * Create a new IndexStudentDto instance
     *
     * @param string|null $name
     * @param string|null $email
     */
    public function __construct(
        public readonly ?string $name,
        public readonly ?string $email,
    ) {
        // ...
    }
}
