<?php

namespace App\Http\Requests;

use App\Models\Course;
use App\Dto\StoreCourseDto;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:100', Rule::unique(Course::class)],
            'description' => ['sometimes', 'string'],
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
