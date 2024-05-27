<?php

namespace App\Http\Requests;

use App\Models\Course;
use App\Models\Student;
use App\Dto\CrudEnrollmentDto;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreEnrollmentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'student_id' => ['required', 'integer', 'min:1', Rule::exists(Student::class, 'id')],
            'course_id' => ['required', 'integer', 'min:1', Rule::exists(Course::class, 'id')],
        ];
    }

    /**
     * Get DTO from request
     *
     * @return \App\Dto\CrudEnrollmentDto
     */
    public function getData(): CrudEnrollmentDto
    {
        return CrudEnrollmentDto::from($this->validated());
    }
}
