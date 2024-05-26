<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Services\StudentService;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Http\Resources\SimpleStudentResource;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentController extends Controller
{
    /**
     * Create a new StudentController instance
     *
     * @param \App\Services\StudentService $service
     */
    public function __construct(private StudentService $service)
    {
        // ...
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created student in storage.
     *
     * @param \App\Http\Requests\StoreStudentRequest $request
     *
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function store(StoreStudentRequest $request): JsonResource
    {
        $student = $this->service->entity->create($request->getData()->allExceptNulls());

        return SimpleStudentResource::make($student);
    }

    /**
     * Display the specified resource.
     */
    public function show(student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateStudentRequest $request
     * @param \App\Models\Student $student
     *
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function update(UpdateStudentRequest $request, Student $student): JsonResource
    {
        $student->update($request->getData()->toArray());

        return SimpleStudentResource::make($student);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(student $student)
    {
        //
    }
}
