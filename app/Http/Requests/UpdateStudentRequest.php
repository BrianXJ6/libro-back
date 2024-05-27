<?php

namespace App\Http\Requests;

use App\Models\Student;
use App\Dto\CrudStudentDto;
use App\Enums\StudentSexEnum;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:100', Rule::unique(Student::class)->ignore($this->student->id)],
            'age' => ['required', 'integer', 'min:1'],
            'sex' => ['sometimes', 'nullable', Rule::enum(StudentSexEnum::class)],
        ];
    }

    /**
     * Get DTO from request
     *
     * @return \App\Dto\CrudStudentDto
     */
    public function getData(): CrudStudentDto
    {
        return CrudStudentDto::from($this->validated());
    }
}
