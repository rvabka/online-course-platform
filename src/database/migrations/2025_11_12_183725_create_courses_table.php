<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->foreignId('instructor_id')
                  ->constrained('users')
                  ->onDelete('cascade'); // Jeśli instruktor zostanie usunięty, usuń kursy
            $table->decimal('price', 8, 2)->default(0); // Cena kursu (max 999999.99)
            $table->integer('duration_hours')->default(1); // Czas trwania w godzinach
            $table->enum('level', ['beginner', 'intermediate', 'advanced'])
                  ->default('beginner');
            $table->boolean('is_published')->default(false); // Czy kurs jest opublikowany
            $table->string('thumbnail')->nullable(); // Ścieżka do miniaturki
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};