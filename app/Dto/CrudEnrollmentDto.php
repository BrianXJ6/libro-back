<?php

namespace App\Dto;

use App\Support\Dto\BaseDto;

class CrudEnrollmentDto extends BaseDto
{
    /**
     * Create a new CrudEnrollmentDto instance
     *
     * @param integer $studentId
     * @param integer $courseId
     */
    public function __construct(
        public readonly int $studentId,
        public readonly int $courseId,
    ) {
        // ...
    }
}
