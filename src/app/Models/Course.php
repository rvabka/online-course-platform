<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'instructor_id',
        'price',
        'duration_hours',
        'level',
        'is_published',
        'thumbnail',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'price' => 'decimal:2',
    ];

    // Relacja: Kurs należy do instruktora (User)
    public function instructor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    // Relacja: Kurs ma wiele lekcji
    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class)->orderBy('order');
    }

    // Relacja: Kurs ma wielu zapisanych użytkowników (przez tabelę pośredniczącą)
    public function enrolledUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'course_enrollments')
                    ->withPivot('enrolled_at', 'completed_at', 'progress_percentage')
                    ->withTimestamps();
    }
}