<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\Admin\CourseController as AdminCourseController;

// Strona główna
Route::get('/', function () {
    return Inertia::render('Welcome');
});

// Dashboard (chroniony przez middleware auth)
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Routy dla kursów (publiczne)
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/{course}', [CourseController::class, 'show'])->name('courses.show');

// Zapisywanie na kurs (wymaga autoryzacji)
Route::post('/courses/{course}/enroll', [CourseController::class, 'enroll'])
    ->middleware('auth')
    ->name('courses.enroll');

// Routy administratora (chronione przez auth)
Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {
    Route::resource('courses', AdminCourseController::class);
    Route::post('courses/{course}/toggle-publish', [AdminCourseController::class, 'togglePublish'])
        ->name('courses.toggle-publish');
});

// Routy autoryzacji (utworzone przez Breeze)
require __DIR__.'/auth.php';