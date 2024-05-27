<?php

namespace App\Http\Requests;

use App\Dto\IndexStudentDto;
use Illuminate\Foundation\Http\FormRequest;

class IndexStudentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'string'],
            'email' => ['sometimes', 'string'],
        ];
    }

    /**
     * Get DTO from request
     *
     * @return \App\Dto\IndexStudentDto
     */
    public function getData(): IndexStudentDto
    {
        return IndexStudentDto::from($this->validated());
    }
}
