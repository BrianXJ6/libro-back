<?php

namespace App\Services;

use App\Models\Course;

class CourseService
{
    /**
     * Create a new CourseService instance
     *
     * @param \App\Models\Course $entity
     */
    public function __construct(public Course $entity)
    {
        // ...
    }
}
