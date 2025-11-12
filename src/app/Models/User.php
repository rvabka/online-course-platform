<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    // Relacja: Użytkownik ma wiele kursów jako instruktor
    public function instructorCourses(): HasMany
    {
        return $this->hasMany(Course::class, 'instructor_id');
    }

    // Relacja: Użytkownik jest zapisany na wiele kursów
    public function enrolledCourses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'course_enrollments')
                    ->withPivot('enrolled_at', 'completed_at', 'progress_percentage')
                    ->withTimestamps();
    }

    // Metoda pomocnicza: Czy użytkownik jest zapisany na kurs?
    public function isEnrolledIn(Course $course): bool
    {
        return $this->enrolledCourses()->where('course_id', $course->id)->exists();
    }
}
