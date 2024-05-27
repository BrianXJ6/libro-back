<?php

namespace App\Dto;

use App\Enums\ReportByAge;
use App\Enums\StudentSexEnum;
use App\Support\Dto\BaseDto;

class ReportDto extends BaseDto
{
    /**
     * Create a new ReportDto instance
     *
     * @param \App\Enums\ReportByAge $byAge
     * @param int|null $courseId
     * @param \App\Enums\StudentSexEnum|null $sex
     */
    public function __construct(
        public readonly ReportByAge $byAge,
        public readonly ?int $courseId,
        public readonly ?StudentSexEnum $sex,
    ) {
        // ...
    }
}
