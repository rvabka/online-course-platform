<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\RedirectResponse;

class CourseController extends Controller
{
    // Dashboard administratora - lista wszystkich kursów
    public function index(): Response
    {
        $courses = Course::with(['instructor', 'enrolledUsers'])
            ->withCount('lessons')
            ->latest()
            ->paginate(10);

        return Inertia::render('Admin/Courses/Index', [
            'courses' => $courses,
        ]);
    }

    // Formularz tworzenia kursu
    public function create(): Response
    {
        return Inertia::render('Admin/Courses/Create');
    }

    // Zapisanie nowego kursu
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'duration_hours' => 'required|integer|min:1',
            'level' => 'required|in:beginner,intermediate,advanced',
        ]);
        $course = Course::create([
            ...$validated,
            'instructor_id' => Auth::id(), // ID zalogowanego użytkownika
            'is_published' => false, // Domyślnie nieopublikowany
        ]);

        return redirect()
            ->route('admin.courses.index')
            ->with('success', 'Kurs został utworzony pomyślnie!');
    }

    // Formularz edycji kursu
    public function edit(Course $course): Response
    {
        $course->load('lessons');

        return Inertia::render('Admin/Courses/Edit', [
            'course' => $course,
        ]);
    }

    // Aktualizacja kursu
    public function update(Request $request, Course $course): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'duration_hours' => 'required|integer|min:1',
            'level' => 'required|in:beginner,intermediate,advanced',
            'is_published' => 'boolean',
        ]);

        $course->update($validated);

        return redirect()
            ->route('admin.courses.index')
            ->with('success', 'Kurs został zaktualizowany!');
    }

    // Usunięcie kursu
    public function destroy(Course $course): RedirectResponse
    {
        $course->delete();

        return redirect()
            ->route('admin.courses.index')
            ->with('success', 'Kurs został usunięty!');
    }

    // Publikacja/odpublikowanie kursu
    public function togglePublish(Course $course): RedirectResponse
    {
        $course->update([
            'is_published' => !$course->is_published,
        ]);

        $message = $course->is_published
            ? 'Kurs został opublikowany!'
            : 'Kurs został ukryty!';

        return back()->with('success', $message);
    }
}