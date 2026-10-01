<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return redirect()->route('students.index');
});

Route::get('/students', [StudentController::class, 'index'])
    ->name('students.index');

Route::get('/students/create', [StudentController::class, 'create'])
    ->name('students.create');

Route::post('/students', [StudentController::class, 'store'])
    ->name('students.store');

Route::get('/students/{id}', [StudentController::class, 'show'])
    ->whereNumber('id')
    ->name('students.show');

Route::middleware(['auth', 'admin'])->get('/admin', function () {
    return 'Admin Dashboard';
});