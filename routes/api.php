<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EnrollmentController;

Route::get('/', fn () => 'Hello World');

Route::prefix('cursos')->controller(CourseController::class)->group(function () {
    Route::apiResources(['/' => CourseController::class]);
    // ...
});

Route::prefix('alunos')->controller(StudentController::class)->group(function () {
    Route::apiResources(['/' => StudentController::class]);
    // ...
});

Route::apiResources(['matriculas' => EnrollmentController::class]);
