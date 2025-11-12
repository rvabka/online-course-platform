<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Course;
use App\Models\Lesson;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        // Znajdź użytkownika admin jako instruktora
        $instructor = User::where('email', 'admin@example.com')->first();

        if (!$instructor) {
            $this->command->error('Użytkownik admin@example.com nie istnieje. Uruchom TestUserSeeder.');
            return;
        }

        // Kurs 1: Laravel dla początkujących
        $course1 = Course::create([
            'title' => 'Laravel 11 od podstaw',
            'description' => 'Kompleksowy kurs Laravel dla początkujących. Nauczysz się budować aplikacje webowe od zera.',
            'instructor_id' => $instructor->id,
            'price' => 299.99,
            'duration_hours' => 20,
            'level' => 'beginner',
            'is_published' => true,
        ]);

        // Lekcje dla kursu 1
        Lesson::create([
            'course_id' => $course1->id,
            'title' => 'Wprowadzenie do Laravel',
            'content' => 'W tej lekcji poznasz podstawy frameworka Laravel i jego architekturę MVC.',
            'video_url' => 'https://www.youtube.com/watch?v=example1',
            'order' => 1,
            'duration_minutes' => 45,
        ]);

        Lesson::create([
            'course_id' => $course1->id,
            'title' => 'Routing i Controllers',
            'content' => 'Dowiedz się, jak tworzyć routy i kontrolery w Laravel.',
            'video_url' => 'https://www.youtube.com/watch?v=example2',
            'order' => 2,
            'duration_minutes' => 60,
        ]);

        Lesson::create([
            'course_id' => $course1->id,
            'title' => 'Eloquent ORM - praca z bazą danych',
            'content' => 'Poznaj potężny ORM Laravel do zarządzania bazą danych.',
            'video_url' => 'https://www.youtube.com/watch?v=example3',
            'order' => 3,
            'duration_minutes' => 75,
        ]);

        // Kurs 2: Vue.js dla zaawansowanych
        $course2 = Course::create([
            'title' => 'Vue 3 Composition API - Zaawansowane techniki',
            'description' => 'Poznaj zaawansowane wzorce i techniki w Vue 3 z wykorzystaniem Composition API.',
            'instructor_id' => $instructor->id,
            'price' => 399.99,
            'duration_hours' => 15,
            'level' => 'advanced',
            'is_published' => true,
        ]);

        Lesson::create([
            'course_id' => $course2->id,
            'title' => 'Composition API vs Options API',
            'content' => 'Porównanie obu podejść i kiedy używać Composition API.',
            'order' => 1,
            'duration_minutes' => 50,
        ]);

        Lesson::create([
            'course_id' => $course2->id,
            'title' => 'Custom Composables',
            'content' => 'Tworzenie reużywalnych funkcji kompozycyjnych.',
            'order' => 2,
            'duration_minutes' => 65,
        ]);

        // Kurs 3: Docker dla developerów
        $course3 = Course::create([
            'title' => 'Docker w praktyce',
            'description' => 'Naucz się konteneryzować swoje aplikacje i zarządzać środowiskami deweloperskimi.',
            'instructor_id' => $instructor->id,
            'price' => 249.99,
            'duration_hours' => 12,
            'level' => 'intermediate',
            'is_published' => true,
        ]);

        Lesson::create([
            'course_id' => $course3->id,
            'title' => 'Podstawy Docker',
            'content' => 'Czym są kontenery i jak działają?',
            'order' => 1,
            'duration_minutes' => 40,
        ]);

        Lesson::create([
            'course_id' => $course3->id,
            'title' => 'Docker Compose',
            'content' => 'Zarządzanie wielokontenerowymi aplikacjami.',
            'order' => 2,
            'duration_minutes' => 55,
        ]);

        $this->command->info('Utworzono 3 kursy z lekcjami!');
    }
}