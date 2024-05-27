<?php

namespace App\Http\Requests;

use App\Models\Course;
use App\Models\Student;
use App\Models\Enrollment;
use App\Dto\CrudEnrollmentDto;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class StoreEnrollmentRequest extends FormRequest
{
    private const COURSE_KEY = 'course_id';
    private const STUDENT_KEY = 'student_id';

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    #[\Override]
    protected function prepareForValidation(): void
    {
        if ($this->checkIfExist()) {
            throw ValidationException::withMessages([
                'messages' => __('validation.unique', ['attribute' => 'enrollment'])
            ]);
        }
    }

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

    /**
     * Checks if there is any value linked to the student and the course sent by request
     *
     * @return boolean
     */
    protected function checkIfExist(): bool
    {
        return DB::table((new Enrollment())->getTable())->where([
            [self::STUDENT_KEY, $this->{self::STUDENT_KEY}],
            [self::COURSE_KEY, $this->{self::COURSE_KEY}],
        ])->exists();
    }
}
