<?php

namespace App\Http\Requests;

use App\Dto\ReportDto;
use App\Models\Course;
use App\Enums\ReportByAge;
use App\Enums\StudentSexEnum;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ReportRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'by_age' => ['required', Rule::enum(ReportByAge::class)],
            'course_id' => ['sometimes', 'integer', 'min:1', Rule::exists(Course::class, 'id')],
            'sex' => ['sometimes', Rule::enum(StudentSexEnum::class)],
        ];
    }

    /**
     * Get DTO from request
     *
     * @return \App\Dto\ReportDto
     */
    public function getData(): ReportDto
    {
        return ReportDto::from($this->validated());
    }
}
