<?php

namespace App\Services;

use App\Models\Enrollment;

class EnrollmentService
{
    /**
     * Create a new EnrollmentService instance
     *
     * @param \App\Models\Enrollment $entity
     */
    public function __construct(public Enrollment $entity)
    {
        // ...
    }
}
