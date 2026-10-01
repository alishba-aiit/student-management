<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\EnrollmentController;
use App\Http\Controllers\Api\TeacherCourseController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me/{id}', [AuthController::class, 'me']);

Route::get('/courses', [CourseController::class, 'index']);
Route::get('/courses/{course}', [CourseController::class, 'show']);

Route::middleware('role:admin')->group(function () {
        Route::post('/courses', [CourseController::class, 'store']);
        Route::put('/courses/{course}', [CourseController::class, 'update']);
        Route::delete('/courses/{course}', [CourseController::class, 'destroy']);
        Route::get('/students', [StudentController::class, 'index']);
        Route::get('/students/{student}', [StudentController::class, 'show']);
        Route::post('/students', [StudentController::class, 'store']);
        Route::put('/students/{student}', [StudentController::class, 'update']);
        Route::delete('/students/{student}', [StudentController::class, 'destroy']);
    });

Route::middleware('role:student')->group(function () {
        Route::post('/students/{student}/courses',[EnrollmentController::class, 'store']);
        Route::delete('/students/{student}/courses/{course}',[EnrollmentController::class, 'destroy']);    
    });

Route::middleware('role:teacher')->group(function () {
        Route::delete('/students/{student}/courses/{course}',[EnrollmentController::class, 'destroy']);        
        Route::delete('/teachers/{teacher}/courses/{course}',[TeacherCourseController::class, 'destroy']);
    });
});