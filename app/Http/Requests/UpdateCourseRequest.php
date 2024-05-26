<?php

namespace App\Http\Requests;

use App\Models\Course;
use App\Dto\StoreCourseDto;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:100', Rule::unique(Course::class)->ignore($this->course->id)],
            'description' => ['sometimes', 'nullable', 'string'],
        ];
    }

    /**
     * Get DTO from request
     *
     * @return \App\Dto\StoreCourseDto
     */
    public function getData(): StoreCourseDto
    {
        return StoreCourseDto::from($this->validated());
    }
}
