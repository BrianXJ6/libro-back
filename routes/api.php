<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EnrollmentController;

Route::get('/', fn () => 'Hello World');

Route::prefix('cursos')->controller(CourseController::class)->group(function () {
    Route::apiResource('/', CourseController::class)->parameters(['' => 'course']);
    // ...
});

Route::prefix('alunos')->controller(StudentController::class)->group(function () {
    Route::apiResource('/', StudentController::class)->parameters(['' => 'student']);
    // ...
});

Route::apiResource('matriculas', EnrollmentController::class)->parameters(['matriculas' => 'enrollment']);
