<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')
                  ->constrained()
                  ->onDelete('cascade'); // Jeśli kurs zostanie usunięty, usuń lekcje
            $table->string('title');
            $table->text('content')->nullable();
            $table->string('video_url')->nullable(); // URL do wideo (YouTube, Vimeo)
            $table->integer('order')->default(0); // Kolejność lekcji w kursie
            $table->integer('duration_minutes')->default(0); // Długość lekcji
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};