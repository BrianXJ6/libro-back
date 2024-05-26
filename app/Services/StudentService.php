<?php

namespace App\Services;

use App\Models\Student;

class StudentService
{
    /**
     * Create a new StudentService instance
     *
     * @param \App\Models\Student $entity
     */
    public function __construct(public Student $entity)
    {
        // ...
    }
}
