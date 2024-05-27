<?php

namespace App\Services;

use App\Models\Student;
use App\Dto\IndexStudentDto;
use Illuminate\Support\Collection;

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

    /**
     * Display a listing of the students.
     *
     * @param \App\Dto\IndexStudentDto $data
     *
     * @return \Illuminate\Support\Collection
     */
    public function index(IndexStudentDto $data): Collection
    {
        $query = $this->entity->newQuery();
        $query->when($data->name, fn ($query) => $query->where('name', 'LIKE', "%$data->name%"));
        $query->when($data->email, fn ($query) => $query->where('email', 'LIKE', "%$data->email%"));
        $query->latest();

        return $query->get();
    }
}
