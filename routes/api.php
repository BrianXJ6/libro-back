<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EnrollmentController;

Route::get('/', fn () => 'Hello World');

// API resources...
Route::apiResource('/cursos', CourseController::class)->parameters(['' => 'course']);
Route::apiResource('/alunos', StudentController::class)->parameters(['' => 'student']);
Route::apiResource('matriculas', EnrollmentController::class)->parameters(['matriculas' => 'enrollment']);
