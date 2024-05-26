<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Services\CourseService;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Http\Resources\SimpleCourseResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseController extends Controller
{
    /**
     * Create a new CourseController instance
     *
     * @param \App\Services\CourseService $service
     */
    public function __construct(private CourseService $service)
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
     * Store a newly created course in storage.
     *
     * @param \App\Http\Requests\StoreCourseRequest $request
     *
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function store(StoreCourseRequest $request): JsonResource
    {
        $course = $this->service->entity->create($request->getData()->allExceptNulls());

        return SimpleCourseResource::make($course);
    }

    /**
     * Display the specified course.
     *
     * @param \App\Models\Course $course
     *
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function show(Course $course): JsonResource
    {
        return SimpleCourseResource::make($course);
    }

    /**
     * Update the specified course in storage.
     *
     * @param \App\Http\Requests\UpdateCourseRequest $request
     * @param \App\Models\Course $course
     *
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function update(UpdateCourseRequest $request, Course $course): JsonResource
    {
        $course->update($request->getData()->toArray());

        return SimpleCourseResource::make($course);
    }

    /**
     * Remove the specified course from storage.
     *
     * @param \App\Models\Course $course
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Course $course): JsonResponse
    {
        $course->delete();

        return new JsonResponse(status: JsonResponse::HTTP_NO_CONTENT);
    }
}
