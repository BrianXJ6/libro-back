<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Services\EnrollmentService;
use App\Http\Requests\StoreEnrollmentRequest;
use App\Http\Resources\SimpleEnrollmentResource;
use Illuminate\Http\Resources\Json\JsonResource;

class EnrollmentController extends Controller
{
    /**
     * Create a new EnrollmentController instance
     *
     * @param \App\Services\EnrollmentService $service
     */
    public function __construct(private EnrollmentService $service)
    {
        // ...
    }

    /**
     * Display a listing of the enrollment.
     *
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function index(): JsonResource
    {
        return SimpleEnrollmentResource::collection($this->service->entity->all());
    }

    /**
     * Store a newly created enrollment in storage.
     *
     * @param \App\Http\Requests\StoreEnrollmentRequest $request
     *
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function store(StoreEnrollmentRequest $request): JsonResource
    {
        $enrollment = $this->service->entity->create($request->getData()->toArray());

        return SimpleEnrollmentResource::make($enrollment);
    }

    /**
     * Display the specified enrollment.
     *
     * @param \App\Models\Enrollment $enrollment
     *
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function show(Enrollment $enrollment): JsonResource
    {
        return SimpleEnrollmentResource::make($enrollment);
    }

    /**
     * Update the specified enrollment in storage.
     *
     * @param \App\Http\Requests\StoreEnrollmentRequest $request
     * @param \App\Models\Enrollment $enrollment
     *
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function update(StoreEnrollmentRequest $request, Enrollment $enrollment): JsonResource
    {
        $enrollment->update($request->getData()->toArray());

        return SimpleEnrollmentResource::make($enrollment);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enrollment $enrollment)
    {
        //
    }
}
