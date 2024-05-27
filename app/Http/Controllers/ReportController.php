<?php

namespace App\Http\Controllers;

use App\Dto\ReportDto;
use App\Models\Student;
use App\Enums\ReportByAge;
use App\Http\Requests\ReportRequest;
use App\Http\Resources\SimpleStudentResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;

class ReportController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \App\Http\Requests\ReportRequest $request
     *
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function __invoke(ReportRequest $request): JsonResource
    {
        $data = $request->getData();
        $query = Student::query();
        $this->prepareQueryForSex($query, $data);
        $this->prepareQueryForWhereHasCourse($query, $data);
        $this->prepareQueryByAGe($query, $data);

        return SimpleStudentResource::collection($query->get());
    }

    /**
     * Prepare query for check if where has relationship for course by ID
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param \App\Dto\ReportDto $data
     *
     * @return void
     */
    protected function prepareQueryForWhereHasCourse(EloquentBuilder $query, ReportDto $data): void
    {
        $query->when($data->courseId, fn ($query) => $query->whereHas(
            'courses',
            fn ($query) => $query->where('courses.id', $data->courseId)
        ));
    }

    /**
     * Prepare query for filter by sex
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param \App\Dto\ReportDto $data
     *
     * @return void
     */
    protected function prepareQueryForSex(EloquentBuilder $query, ReportDto $data): void
    {
        $query->when($data->sex, fn ($query) => $query->where('sex', $data->sex));
    }

    /**
     * Prepare query for filter by range of age
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param \App\Dto\ReportDto $data
     *
     * @return void
     */
    protected function prepareQueryByAGe(EloquentBuilder $query, ReportDto $data): void
    {
        switch ($data->byAge) {
            case ReportByAge::LESS_15:
                $query->where('age', '<', 15);
                break;
            case ReportByAge::BETWEEN_15_18:
                $query->whereBetween('age', [15, 18]);
                break;
            case ReportByAge::BETWEEN_19_24:
                $query->whereBetween('age', [19, 24]);
                break;
            case ReportByAge::BETWEEN_25_30:
                $query->whereBetween('age', [25, 30]);
                break;
            case ReportByAge::OVER_30:
                $query->where('age', '>', 30);
                break;
        }
    }
}
