<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class CourseController extends Controller
{
    // Lista wszystkich opublikowanych kursów
    public function index(): Response
    {
        $courses = Course::with('instructor')
            ->where('is_published', true)
            ->latest()
            ->paginate(9);

        return Inertia::render('Courses/Index', [
            'courses' => $courses,
        ]);
    }

    // Szczegóły pojedynczego kursu
    public function show(Course $course): Response
    {
        // Załaduj relacje
        $course->load(['instructor', 'lessons']);

        // Sprawdź, czy użytkownik jest zapisany
        $isEnrolled = Auth::check() && Auth::user()->isEnrolledIn($course);

        return Inertia::render('Courses/Show', [
            'course' => $course,
            'isEnrolled' => $isEnrolled,
        ]);
    }

    // Zapisz użytkownika na kurs
    public function enroll(Course $course)
    {
        $user = Auth::user();

        // Sprawdź, czy już zapisany
        if ($user->isEnrolledIn($course)) {
            return back()->with('error', 'Jesteś już zapisany na ten kurs.');
        }

        // Zapisz użytkownika
        $user->enrolledCourses()->attach($course->id, [
            'enrolled_at' => now(),
            'progress_percentage' => 0,
        ]);

        return back()->with('success', 'Pomyślnie zapisano na kurs!');
    }
}