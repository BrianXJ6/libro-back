<?php

namespace App\Dto;

use App\Support\Dto\BaseDto;
use App\Enums\StudentSexEnum;

class CrudStudentDto extends BaseDto
{
    /**
     * Create a new CrudStudentDto instance
     *
     * @param string $name
     * @param string $email
     * @param string $birth
     * @param StudentSexEnum|null $sex
     */
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $birth,
        public readonly ?StudentSexEnum $sex,
    ) {
        // ...
    }
}
